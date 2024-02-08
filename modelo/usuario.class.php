<?php
class Usuario{

  private $idUsuario;
  private $nome;
  private $cpf;
  private $telefone;
  private $email;
  private $senha;

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