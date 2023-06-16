<?php

require_once 'Database.php';

class Admin{

    private $setConn;

    public $id;

    public $admin_email;

    public $admin_senha;

    public function __construct(){
        $this->setConn = new Database('Admin');
    }

    public function Cadastrar() {
        $this->id = $this->setConn->insert([
                                        'admin_email'   => $this->admin_email,
                                        'admin_senha'   => $this->admin_senha
                                        ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('admin_id = '.$this->id,[
                                                        'admin_email'   => $this->admin_email,
                                                        'admin_senha'   => $this->admin_senha
                                                        ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('admin_id = '.$this->id);
    }
        
    public static function getAdmins($where = null, $order = null, $limit = null){
      return (new Database('Admin'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getAdmin($id){
      return (new Database('Admin'))->select('id = '.$id)
                                    ->fetchObject(self::class);
    }
        
    public static function adminLogin($admin_email, $admin_senha){
        return (new Database('Admin'))->select("admin_email = '$admin_email' and admin_senha = '$admin_senha'")
                                        ->fetchObject(self::class);
    }    

}