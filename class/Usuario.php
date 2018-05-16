<?php
/**
 * Created by PhpStorm.
 * User: BrGomes
 * Date: 15/05/2018
 * Time: 21:16
 */

class Usuario
{
        private $id;
        private $login;
        private $senha;
        private $dtCadastro;

        //gets e sets

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * @param mixed $dtCadastro
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }


    public function loadByID($id){
        $con = new Sql();
        $id = array('ID'=>1);
       $result =  $con->SELECT("SELECT * FROM tb_user where id= :ID",$id);

       if(count($result)>0 ){
           $row = $result[0];

           $this->setId($row['id']);
           $this->setLogin($row['login']);
           $this->setSenha($row['senha']);
           $this->setDtCadastro(new DateTime($row['dtCadastro']));

       }
    }

    public function __toString()
    {
        return json_encode(array(
            'id'=>$this->getId(),
            'login'=>$this->getLogin(),
            'senha'=>$this->getSenha(),
            'dtCadastro'=>$this->getDtCadastro()->format('d/m/Y H:i:s')
        ));
    }


}