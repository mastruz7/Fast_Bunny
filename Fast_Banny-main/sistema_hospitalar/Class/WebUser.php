<?php

require_once('Database.php');

class WebUser{

    private $setConn;

    public $id;

    public $login_email;
    
    public $login_tipo;

    public $data_cadastro;

    public function __construct(){
        $this->setConn = new Database('WebLogin');
    }

    public function Cadastrar() {
        $this->data_cadastro = date('Y-m-d H:i:s');
        $this->id = $this->setConn->insert([
                                            'login_email' => $this->login_email,
                                            'login_tipo'  => $this->login_tipo
                                            ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('login_id = '.$this->id,[
                                                                'login_email'         => $this->login_email,
                                                                'login_tipo'  => $this->login_tipo
                                                                ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('login_id = '.$this->id);
    }
        
    public static function getWebUsers($where = null, $order = null, $limit = null){
       return (new Database('WebLogin'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getWebUser($email){
        return (new Database('WebLogin'))->select("login_email ='$email'")
                                      ->fetchObject(self::class);
      }
        

}