<?php 

namespace Petshop\Model;

use Petshop\Core\Attribute\Entidade;
use Petshop\Core\Attribute\Campo;
use Petshop\Core\DAO;

//dicas
#[Entidade(name: 'estados')]
class Estado extends DAO
{

    #[Campo(label:'UF', nn:true, pk:true, auto:true)]
    protected $uf;

    #[Campo(label:'IBGE', nn:true)]
    protected $ibge;

    #[Campo(label:'Estado', nn:true, order:true )]
    protected $estado;

    #[Campo(label:'Região', nn:true)]
    protected $regiao;

    public function getUf()
    {
        return $this->uf;
    }

    public function getIbge()
    {
        return $this->ibge;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getRegiao()
    {
        return $this->regiao;
    } 
}