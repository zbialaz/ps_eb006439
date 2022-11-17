<?php 

namespace Petshop\Core;

use Petshop\Core\Attribute\Entidade;
use Petshop\Core\Attribute\Campo;

//dicas
#[Entidade(name: 'dicas')]
class Dica extends DAO
{
    #[Campo(label:'Cód. Dica', nn:true, pk:true, auto:true)]
    protected $iddica;

    #[Campo(label:'Título', nn:true)]
    protected $titulo;

    #[Campo(label:'Descrição', nn:true)]
    protected $descricao;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdDica()
    {
        return $this->idDica;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getCreated_At()
    {
        return $this->created_at;
    }

    public function getUpdated_At()
    {
        return $this->updated_at;
    }

}