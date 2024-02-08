<?php
class ImovelResidencial{

  private $idImovel;
  private $idImovelResidencial;
  private $tipo;
  private $dormitorios;
  private $suites;
  private $vagas;
  private $situacao;
  private $ocupacao;
  private $areaTotal;
  private $areaPrivativa;
  private $face;
  private $andar;
  private $quantidadeAndares;
  private $anoConstrucao;
  private $iptu;
  private $condominio;
  private $complementares;
  private $condominioInfo;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){ return $this->$a; }
  public function __set($a,$v){ $this->$a = $v; }

  public function __toString(){
    return nl2br("Nome: $this->nome
                  cpf: $this->cpf
                  telefone: $this->telefone
                  email: $this->email
                  senha: $this->senha");
  }
}