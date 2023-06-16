<?php

require_once 'Database.php';

class Medico{

    private $setConn;

    public $id;

    public $medico_nome;

    public $medico_email;

    public $medico_senha;

    public $medico_tel;

    public $medico_especialidade;

    public function __construct(){
        $this->setConn = new Database('Medico');
    }

    public function Cadastrar() {
        $this->id = $this->setConn->insert([
                                            'medico_email'          => $this->medico_email,
                                            'medico_senha'          => $this->medico_senha,
                                            'medico_nome'           => $this->medico_nome,
                                            'medico_tel'            => $this->medico_tel,
                                            'medico_especialidade_fk'  => $this->medico_especialidade
                                            ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('medico_id = '.$this->id,[
                                                                'medico_email'          => $this->medico_email,
                                                                'medico_senha'          => $this->medico_senha,
                                                                'medico_nome'           => $this->medico_nome,
                                                                'medico_tel'            => $this->medico_tel,
                                                                'medico_especialidade_fk'  => $this->medico_especialidade
                                                                ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('medico_id = '.$this->id);
    }
        
    public static function getMedicos($where = null, $order = null, $limit = null){
      return (new Database('Medico'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getMedico($id){
      return (new Database('Medico'))->select('id = '.$id)
                                    ->fetchObject(self::class);
    }
        
    public static function medicoLogin($medico_email, $medico_senha){
        return (new Database('Medico'))->select("medico_email = '$medico_email' and medico_senha = '$medico_senha'")
                                        ->fetchObject(self::class);
    }

}    