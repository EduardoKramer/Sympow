<?php
  require_once 'conexaoBanco.class.php';
  class ImovelBasicoDAO{ //DATA ACCESS OBJECT
    private $conexao = null;
    public function __construct(){
      $this->conexao = ConexaoBanco::getInstance();
    }
	
   
	/*public function buscarImovelBasico($query){
      try {
        $stat = $this->conexao->query("select * from imovel_basico ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'ImovelBasico');
        return $array;
      }catch (PDOException $e) {
        echo "Erro ao filtrar consultoria".$e;
      }//fecha catch
    }//fecha metodo*/
	public function buscarImovelBasicoId($id){
      try {
        $stat = $this->conexao->prepare("select * from imovel_basico where idImovel=:id");
		$stat->bindValue(":id",$id->idImovel);
        $stat->execute();

        $array = $stat->fetchAll(PDO::FETCH_CLASS, 'ImovelBasico');
        return $array;
      }catch (PDOException $e) {
        echo "Erro ao filtrar consultoria".$e;
      }//fecha catch
    }//fecha metodo
    public function cadastrarImovelBasico($cad){
      try {
        $stat = $this->conexao->prepare("insert into imovel_basico(idImovel,idProprietario,idIndicacao,CEP,cidade,estado,logradouro,numero,complemento,bloco,bairro,idRepresentante) values(null,?,?,?,?,?,?,?,?,?,?,?)");
        $stat->bindValue(1,$cad->idProprietario);
        $stat->bindValue(2,$cad->idIndicacao);
        $stat->bindValue(3,$cad->CEP);
        $stat->bindValue(4,$cad->cidade);
        $stat->bindValue(5,$cad->estado);
        $stat->bindValue(6,$cad->logradouro);
        $stat->bindValue(7,$cad->numero);
        $stat->bindValue(8,$cad->complemento);
        $stat->bindValue(9,$cad->bloco);
        $stat->bindValue(10,$cad->bairro);
        $stat->bindValue(11,$cad->idRepresentante);

        $stat->execute();
        
      } catch (PDOException $e) {
        echo "Erro ao cadastrar! ".$e;
      }//fecha catch
    }//fecha metodo
  }
