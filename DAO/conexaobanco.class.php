<?php

class ConexaoBanco extends PDO{
  private static $instance=null;

  public function __construct($dsn,$user,$pass){
    parent::__construct($dsn,$user,$pass);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      try{
        //cria e retorna conexao
        self::$instance=new ConexaoBanco("mysql:dbname=imobiliaria;host=localhost","root","");
      }catch(PDOException $e){
        echo "Erro ao conectar!".$e;
      }//fecha catch
    }//fecha if
    return self::$instance;
  }//fecha metodo
  public function __destruct(){}

}//fecha classe
