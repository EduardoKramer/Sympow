<?php
require 'conexaobanco.class.php';
class imovelResidencialDAO{//data access object

    private $conexao = null;
    public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }

  public function cadastrarImovelResidencial($p){
    try{
      $stat=$this->conexao->prepare("insert into imovel_residencial
      (idImovel,idImovelResidencial,tipo,dormitorios,suites,vagas,situacao,ocupacao,areaTotal,areaPrivativa,face,andar,quantidadeAndares,anoConstrucao,iptu,condominio,complementares,condominioInfo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

      $stat->bindValue(1,$p->idImovel);
      $stat->bindValue(2,$p->idImovelResidencial);
      $stat->bindValue(3,$p->tipo);
      $stat->bindValue(4,$p->dormitorios);
      $stat->bindValue(5,$p->suites);
      $stat->bindValue(6,$p->vagas);
      $stat->bindValue(7,$p->situacao);
      $stat->bindValue(8,$p->ocupacao);
      $stat->bindValue(9,$p->areaTotal);
      $stat->bindValue(10,$p->areaPrivativa);
      $stat->bindValue(11,$p->face);
      $stat->bindValue(12,$p->andar);
      $stat->bindValue(13,$p->quantidadeAndares);
      $stat->bindValue(14,$p->anoConstrucao);
      $stat->bindValue(15,$p->iptu);
      $stat->bindValue(16,$p->condominio);
      $stat->bindValue(17,$p->complementares);
      $stat->bindValue(18,$p->condominioInfo);

      $stat-> execute();
    }catch(PDOException $e){
      echo "Erro a cadastrar!".$e;
    }//fecha catch
  }//fecha metodo
  
  public function filtrar($query){
    try {
      $stat=$this->conexao->query("select * from usuario ".$query);
      $array=$stat->fetchALL(PDO::FETCH_CLASS,'usuario');
      return $array;
    } catch (PDOException $e) {
      echo "Erro ao filtrar usuarios!".$e;
    }
  }
    public function alterarImovelResidencial($p) {
     try {
       $stat = $this->conexao->prepare("update imovel_residencial set tipo=?, dormitorios=?, suites=?, vagas=?, situacao=?, ocupacao=?, areaTotal=?, areaPrivativa=?, face=?, andar=?, quantidadeAndares=?, anoConstrucao=?, iptu=?, condominio=?, complementares=?, condominioInfo=? where idImovel=?");

      $stat->bindValue(1,$p->tipo);
      $stat->bindValue(2,$p->dormitorios);
      $stat->bindValue(3,$p->suites);
      $stat->bindValue(4,$p->vagas);
      $stat->bindValue(5,$p->situacao);
      $stat->bindValue(6,$p->ocupacao);
      $stat->bindValue(7,$p->areaTotal);
      $stat->bindValue(8,$p->areaPrivativa);
      $stat->bindValue(9,$p->face);
      $stat->bindValue(10,$p->andar);
      $stat->bindValue(11,$p->quantidadeAndares);
      $stat->bindValue(12,$p->anoConstrucao);
      $stat->bindValue(13,$p->iptu);
      $stat->bindValue(14,$p->condominio);
      $stat->bindValue(15,$p->complementares);
      $stat->bindValue(16,$p->condominioInfo);
      $stat->bindValue(17,$p->idImovel);



       $stat->execute();

     } catch(PDOException $e) {
       echo "Erro ao alterar livro! ".$e;
     }//fecha catch
   }//fecha método


}//fecha classe
