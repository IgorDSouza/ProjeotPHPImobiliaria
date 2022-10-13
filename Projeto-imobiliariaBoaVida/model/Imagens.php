<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Imagens extends Banco{

    private $id;
    private $idImovel;
    private $foto;
    private $fotoTipo;
    private $pathadd;

    //métodos de acesso

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getIdImovel(){
        return $this->idImovel;
    }

    public function setIdImovel($idImovel){
        $this->idImovel = $idImovel;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getFotoTipo(){
        return $this->fotoTipo;
    }
    public function setFotoTipo($fotoTipo){
        $this->fotoTipo = $fotoTipo;
    }
    public function getPathadd(){
        return $this->pathadd;
    }
    public function setPathadd($pathadd){
        $this->pathadd = $pathadd;
    }

    public function save() {
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
                //cria query de inserção passando os atributos que serão armazenados
                $query = "insert into imagens (id, idImovel, foto, fotoTipo, pathadd) 
                values (null,:idImovel,:foto,:fotoTipo,:pathadd)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':idImovel'=> $this->idImovel,':foto' => $this->foto,':fotoTipo' => $this->fotoTipo, ':pathadd'=> $this->pathadd))) {
                    $result = $stmt->rowCount();
                
            }
        }
        return $result;
    }

    public function find($id) {

    }

    public function remove($id) {

        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dadosgi
        $conn = $conexao->getConection();
        //cria query de remoção
        $query = "DELETE FROM imagens where id = :id";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //executa a query
        if ($stmt->execute(array(':id'=> $id))) {
            $result = true;
        }
        return $result;
    }

    public function count() {

    }

    public function listAllImg($idImovel) {

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM imagens where idImovel = :idImovel" ;
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if ($stmt->execute(array(':idImovel'=>$idImovel))) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Imagens::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    public function listAll() {}

  
}

?>