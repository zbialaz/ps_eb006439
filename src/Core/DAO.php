<?php

namespace Petshop\Core;

use Exception;
use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;

class DAO 
{

    /**
     * Função ue objetiva retornas as metainformações
     * da classe, baseando-se para isso na leitura dos Attributes
     *
     * @return array Propriedades da Entidade (tabela e campos)
     */
    public function getTableInfo() : array
    {
        //vetor que armazenará as informações da classe
        //referente ás tabelas e campo do banco de dados
        $info = [];


        //pegando as metainformações a classe referente
        //ao objeto atual instanciado
        $ref = new \ReflectionClass($this::class);
        foreach($ref->getAttributes(Entidade::class) as $attrTable) {
            $info['tabela'] = $attrTable->getArguments();

            //procurando as metainformações das propriedades a classe
            foreach($ref->getProperties() as $propriedade) {
            //pra cada campo/prop localizada, procura seus atributos
            foreach($propriedade->getAttributes(Campo::class) as $attrCampo) {
                $info['campos'][$propriedade->getName()] = $attrCampo->getArguments();
                }
            } 
        }

        if (!isset($info['tabela']) || !isset($info['campos'])) {
            throw new Exception('Os atributos a classe/propriedades não foram preenchidos');
        }

        return $info;

    }
    /**
     * Método GET para acesso direto via nomes de
     * propriedades da classe 
     *
     * @param string $name
     * @return mixed 
     */
    public function __get(string $name)
    {
        $metodoProcurado = 'get' . $name;
        if ( method_exists($this, $metodoProcurado) ) {
            return $this->$metodoProcurado();
        } else {
            throw new Exception("O atributo {$name} não tem método 'get' asssociado");
            }
        }

        /**
         * Método SET para gravação direta via nomes de
         * propriedades da classe
         *
         * @param string $name Nome da propriedade
         * @param mixed $value Valor a ser inserido 
         * @return mixed 
         */
        public function __set(string $name, $value)
        {
            $metodoProcurado = 'set' . $name;
            if ( method_exists($this, $metodoProcurado) ) {
                 $this->$metodoProcurado($value);
            } else {
                throw new Exception("O atributo {$name} não tem método 'set' asssociado");
                } 
        }
    }
