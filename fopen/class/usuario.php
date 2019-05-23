<?php

class Usuario   {
    private $idusuario;
    private $deslogin;
    private $desenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($value){
        $this->idusuario = $value;
    }

    
    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    
    public function getDesenha(){
        return $this->desenha;
    }

    public function setDesenha($value){
        $this->desenha = $value;
    }

    
    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    public function loadById($id){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
            ":ID"=>$id
        ));

        if(count($result)>0){

          $this->setData($result[0]);
        }
    }

    public static function getList(){
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }

    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function login($login,$pass){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :DESLOGIN AND desenha = :PASS",array(
            ":DESLOGIN"=>$login,
            ":PASS"=>$pass
        ));

        if(count($result)>0){

           // $linha = $result[0];
            $this->setData($result[0]);
            
    }else{
        throw new Exception("login e ou senha invalidos", 1);
        
    }
    }

    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDesenha($data['desenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }

    public function insert(){
        $sql = new Sql();

        $result = $sql->select("CALL sp_usuarios_insert(:DESLOGIN,:PASSWORD)",array(
            ':DESLOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDesenha()
        ));

            if(count($result)>0){
                $this->setData($result[0]);
            }
    }

    public function update($login,$password){
        $this->setDeslogin($login);
        $this->setDesenha($password);

        $sql = new Sql();

        $sql->query("UPDATE tb_usuarios SET deslogin=:DESLOGIN, desenha=:PASS WHERE idusuario=:ID",array(
            ':DESLOGIN'=>$this->getDeslogin(),
            ':PASS'=>$this->getDesenha(),
            ':ID'=>$this->getIdusuario()
        ));
    }

    public function delete(){
        $sql =new Sql();

        $sql->query("DELETE FROM tb_usuario WHERE idusuario = :ID",array(
            ':ID'=>$this->getIdusuario()
        ));

        $this->setIdusuario(0);
        $this->setDeslogin("");
        $this->setDesenha("");
        $this->setDtcadastro(new DateTime());
    

    }



    public function __construct($login ="",$pass ="")
    {
        $this->setDeslogin($login);
        $this->setDesenha($pass);
    }
    
    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "desenha"=>$this->getDesenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }

  




}

?>