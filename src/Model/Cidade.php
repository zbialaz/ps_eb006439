<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'cidades')]

class Cidade extends DAO
{
    #[Campo(label:'Cód. Cidade', nn:true, pk:true, auto:true)]
    protected $idcidade;

    #[Campo(label:'UF', nn:true)]
    protected $uf;

    #[Campo(label:'Dados IBGE', nn:true)]
    protected $ibge;

    #[Campo(label:'Dados IBGE7', nn:true)]
    protected $ibge7;

    #[Campo(label:'Município', nn:true)]
    protected $municipio;

    #[Campo(label:'Região', nn:true)]
    protected $regiao;

    #[Campo(label:'População', nn:true)]
    protected $populacao;

    #[Campo(label:'Porte', nn:true)]
    protected $porte;

    #[Campo(label:'Capital', nn:true)]
    protected $capital;

    /**
     * Get the value of idcidade
     */
    public function getIdcidade()
    {
        return $this->idcidade;
    }

    /**
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     */
    public function setUf($uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of ibge
     */
    public function getIbge()
    {
        return $this->ibge;
    }

    /**
     * Set the value of ibge
     */
    public function setIbge($ibge): self
    {
        $this->ibge = $ibge;

        return $this;
    }

    /**
     * Get the value of ibge7
     */
    public function getIbge7()
    {
        return $this->ibge7;
    }

    /**
     * Set the value of ibge7
     */
    public function setIbge7($ibge7): self
    {
        $this->ibge7 = $ibge7;

        return $this;
    }

    /**
     * Get the value of municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set the value of municipio
     */
    public function setMunicipio($municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get the value of regiao
     */
    public function getRegiao()
    {
        return $this->regiao;
    }

    /**
     * Set the value of regiao
     */
    public function setRegiao($regiao): self
    {
        $this->regiao = $regiao;

        return $this;
    }

    /**
     * Get the value of populacao
     */
    public function getPopulacao()
    {
        return $this->populacao;
    }

    /**
     * Set the value of populacao
     */
    public function setPopulacao($populacao): self
    {
        $this->populacao = $populacao;

        return $this;
    }

    /**
     * Get the value of porte
     */
    public function getPorte()
    {
        return $this->porte;
    }

    /**
     * Set the value of porte
     */
    public function setPorte($porte): self
    {
        $this->porte = $porte;

        return $this;
    }

    /**
     * Get the value of capital
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set the value of capital
     */
    public function setCapital($capital): self
    {
        $this->capital = $capital;

        return $this;
    }
}