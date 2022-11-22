<?php

namespace Petshop\Core;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;

class DAO
{

    /** @var array Informações da tabela/campos carregados*/
    private $tableinfo = [];

    public function __construct()
    {
        $this->tableinfo = $this->getTableInfo();;
    }

    /**
     * Metodo GET para acesso direto via nomes de propriedades
     * de classe
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $metodoProcurado = 'get' . $name;
        if (method_exists($this, $metodoProcurado)) {
            return $this->$metodoProcurado();
        } else {
            throw new Exception("O atributo {$name} não tem 
            método 'get' associado");
        }
    }

    /**
     * Método SET para gravação direta via nomes de propriedades 
     * da classe
     *
     * @param string $name Nome da propriedade
     * @param [type] $value Valor a ser inserido
     */
    public function __set(string $name, $value)
    {
        $metodoProcurado = 'set' . $name;
        if (method_exists($this, $metodoProcurado)) {
            return $this->$metodoProcurado($value);
        } else {
            throw new Exception("O atributo {$name} não tem 
            método 'set' associado");
        }
    }
    /**
     * Função que objetiva retornar as metainformações da classe, baseando-se
     * para isso na leitura dos Attributes
     *
     * @return array Propriedades da entidade (tabela e campos)
     */
    public function getTableInfo() : array
    {
        /*vetor que armazenara as informações da classe 
        referente as tabelas e campos do banco de dados
         */
        $info = [];

        /*pegando as metainformações da classe referente ao
        objeto atual instanciado
         */
        $ref = new \ReflectionClass($this::class);
        foreach($ref->getAttributes(Entidade::class) as $attrTable) {
            $info['tabela'] = $attrTable->getArguments();

            //procurando as metainformações das propriedades da classe
            foreach($ref->getProperties() as $propriedade) {
                // para cada campo/prop localizada, procura seus atributos
                foreach($propriedade->getAttributes(Campo::class) as $attrCampo) {
                    $info['campos'][$propriedade->getName()] = $attrCampo->getArguments();
                }
            }
        }

        if(!isset($info['tabela']) || !isset($info['campos'])) {
            throw new Exception('Os atributos da classe/propriedades não foram preenchidos');
        }
        
        return $info;
    }    

    /**
     * Retirna o nome da tabela da classe instanciada
     *
     * @return string
     */
    public function getTableName() : string
    {
        return $this->tableinfo['tabela']['name'];
    }

    /**
     * Retorna informações dos campos/propriedades da classe associada
     *
     * @return array
     */
    public function getFields() : array
    {
        return $this->tableinfo['campos'];
    }

    /**
     * Retorna o nome do campo chave da tabela associada a classe atual
     *
     * @return string
     */
    public function getPkName() : string
    {
        foreach($this->tableinfo['campos'] as $cname => $cprops) {
            if(array_key_exists('pk', $cprops)) {
                return strtolower($cname);
            }
        }
        return '';
    }

    /**
     * Retorna o nome do campo de ordenação padrão
     * 
     * @return string
     */
    public function getOrderByField() : string
    {
        foreach($this->tableinfo['campos'] as $cname => $cprops) {
            if(array_key_exists('order', $cprops)) {
                return strtolower($cname);
            }
        }
        return '';
    }

    /**
     * Função genérica que busca dados do banco de dados para a entidade
     * relacionada ao objeto instanciado
     *
     * @param array $params Os parâmetros de condição de busca, ex: ['titulo ='=>'Teste']
     * @param array $order Os campos de ordenação, ex ['titulo desc', 'dtcad']
     * @param string $columns As colunas do SELECT (separadas por vírgula)
     * @return array
     */
    public function find(array $params=[], array $order=[], string $columns='*') : array
    {
        $where = '';
        if(count($params)) {
            $where = 'WHERE ' . implode(' ? and ' , array_keys($params)) . ' ? ';
        }

        $orderBy = '';
        if(count($order)) {
            $orderBy = 'ORDER BY ' . implode(', ', $order);
        } elseif($this->getOrderByField()) {
            $orderBy = 'ORDER BY ' . $this->getOrderByField();
        }

        $sql = sprintf(
            'SELECT %s FROM %s %s %s',
            $columns,
            $this->getTableName(),
            $where,
            $orderBy
        );

        return DB::select($sql, $params);
    }

    /**
     * Carrega as informações da tabela para o objeto instanciado
     *
     * @param integer|string $id Chave primaria procurada
     * @return boolean
     */
    public function loadById(int|string $id) : bool
    {
        if(!$this->getPkName()) {
            return false;
        }

        $registro = $this->find([
            $this->getPkName() . '=' => $id
        ]);

        if(!isset($registro[0])) {
            return false;
        }

        //THIS->FIND RETORNA UMA COLEÇÃO(VETOR), TEMOS QUE, PORTANTO
        //ALIMENTAR O OBJETO, PROPRIEDADE POR PROPRIEDADE A PARTIR DESTE
        //VETOR RETORNADO
        $atributos = array_keys($this->getFields());
        foreach($atributos as $atributo) {
            $this->$atributo = $registro[0][strtolower($atributo)];
        }

        return true;
    }

    /**
     * Método que, com todos os atributos obrigatórios alimentados
     * salva os dados no banco de dados, se houver ID informado, então
     * atualiza um registro, senão, cria
     *
     * @return void
     */
    public function save() : bool
    {
        $nomeDaTabela = $this->getTableName();
        $nomeCampoChave = $this->getPkName();
        $valorCampoChave = $this->$nomeCampoChave;

        $campos =[];
        foreach($this->getFields() as $atributo => $parametros) {
            if(array_key_exists('auto', $parametros)) {
                continue;
            }

            // verificar se o campo atual está nulo e é um not null(nn)
            if(is_null($this->$atributo) && array_key_exists('nn', $parametros)) {
                $label = $parametros['label'];
                throw new Exception("O campo {$label} deve ser preenchido");                
            }

            $campos[strtolower($atributo)] = $this->$atributo;
        }
        
        // se não tiver valor no atributo do campo chave
        // será feito um insert, pois não é um registro conhecido
        if(empty($valorCampoChave)) {
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $nomeDaTabela,
                implode(', ', array_keys($campos)),
                trim(str_repeat('?,', count($campos)), ',')
            );

            DB::query($sql, $campos);

            $this->loadById(DB::getInstance()->lastInsertId());

            return true;
        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = %s',
            $nomeDaTabela,
            implode('=?, ', array_keys($campos)) . '=?' ,
            $nomeCampoChave,
            $valorCampoChave
        );

        DB::query($sql, $campos);

        $this->loadById($valorCampoChave);

        return true;
    }
}