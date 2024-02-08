<?php
require 'conexaobanco.class.php';
class usuarioDAO{//data access object

  private $conexao=null;

  public function __construct(){
    $this->conexao=ConexaoBanco::getInstance();
  }

  public function cadastrarUsuario($p){
    try{
      $stat=$this->conexao->prepare("insert into usuario
      (idUsuario,nome,cpf,telefone,email,senha) VALUES (null,?,?,?,?,?)");

      $stat->bindValue(1,$p->nome);
      $stat->bindValue(2,$p->cpf);
      $stat->bindValue(3,$p->telefone);
      $stat->bindValue(4,$p->email);
      $stat->bindValue(5,$p->senha);

      $stat-> execute();
    }catch(PDOException $e){
      echo "Erro a cadastrar!".$e;
    }//fecha catch
  }//fecha metodo
  public function buscarUsuario(){
    try{
      $stat = $this->conexao->query("select * from usuario");
      $array = $stat->fetchAll(PDO::FETCH_CLASS,'usuario');
      return $array;
    }catch(PDOException $e){
      echo "Erro ao buscar usuarios! ".$e;
    }//fecha catch
  }//fecha buscarusuario

  
  public function filtrar($query){
    try {
      $stat=$this->conexao->query("select * from usuario ".$query);
      $array=$stat->fetchALL(PDO::FETCH_CLASS,'usuario');
      return $array;
    } catch (PDOException $e) {
      echo "Erro ao filtrar usuarios!".$e;
    }
  }
    public function alterarUsuario($p) {
     try {
       $stat = $this->conexao->prepare("update usuario set nome=?, cpf=?, telefone=?, email=?, senha=? where idusuario=?");

        $stat->bindValue(1,$p->nome);
        $stat->bindValue(2,$p->cpf);
        $stat->bindValue(3,$p->telefone);
        $stat->bindValue(4,$p->email);
        $stat->bindValue(5,$p->senha);
        $stat->bindValue(6, $p->idUsuario);


       $stat->execute();

     } catch(PDOException $e) {
       echo "Erro ao alterar livro! ".$e;
     }//fecha catch
   }//fecha método


}//fecha classe
