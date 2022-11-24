<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Entidade;
use Petshop\Core\Attribute\Campo;
use Petshop\Core\DAO;
use Petshop\Core\Exception;

//dicas
#[Entidade(name: 'cidades')]
class Cidade extends DAO
{
 #[Campo(label:'Cód. Cidade', nn:true, pk:true, auto:true)]
protected $idCidade;

#[Campo(label:'UF', nn:true)]
protected $uf;

#[Campo(label:'IBGE', nn:true)]
protected $ibge;

#[Campo(label:'IBGE7', nn:true)]
protected $ibge7;

#[Campo(label:'Município', nn:true, order:true)]
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
 * Get the value of idCidade
 */ 
public function getIdCidade()
{
return $this->idCidade;
}

/**
 * Get the value of uf
 */ 
public function getUf()
{
return $this->uf;
}

/**
 * Get the value of ibge
 */ 
public function getIbge()
{
return $this->ibge;
}

/**
 * Get the value of ibge7
 */ 
public function getIbge7()
{
return $this->ibge7;
}

/**
 * Get the value of municipio
 */ 
public function getMunicipio()
{
return $this->municipio;
}

/**
 * Get the value of regiao
 */ 
public function getRegiao()
{
return $this->regiao;
}

/**
 * Get the value of populacao
 */ 
public function getPopulacao()
{
return $this->populacao;
}

/**
 * Get the value of porte
 */ 
public function getPorte()
{
return $this->porte;
}

/**
 * Get the value of capital
 */ 
public function getCapital()
{
return $this->capital;
}
}

