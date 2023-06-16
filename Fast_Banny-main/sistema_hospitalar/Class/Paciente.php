<?php

require_once 'Database.php';

class Paciente{

    private $setConn;

    public $id;

    public $paciente_nome;

    public $paciente_email;

    public $paciente_senha;
    
    public $paciente_endereco;

    public $paciente_tel;

    public function __construct(){
        $this->setConn = new Database('Paciente');
    }

    public function Cadastrar() {
        $this->data_cadastro = date('Y-m-d H:i:s');
        $this->id = $this->setConn->insert([
                                            'paciente_email'    => $this->paciente_email,
                                            'paciente_senha'    => $this->paciente_senha,
                                            'paciente_nome'     => $this->paciente_nome,
                                            'paciente_endereco' => $this->paciente_endereco,
                                            'paciente_tel'      => $this->paciente_tel
                                            ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('paciente_id = '.$this->id,[
                                                        'paciente_email'    => $this->paciente_email,
                                                        'paciente_senha'    => $this->paciente_senha,
                                                        'paciente_nome'     => $this->paciente_nome,
                                                        'paciente_endereco' => $this->paciente_endereco,
                                                        'paciente_tel'      => $this->paciente_tel
                                                        ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('paciente_id = '.$this->id);
    }
        
    public static function getpacientes($where = null, $order = null, $limit = null){
      return (new Database('Paciente'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getpaciente($id){
      return (new Database('Paciente'))->select('paciente_id = '.$id)
                                    ->fetchObject(self::class);
    }

    public static function pacienteLogin($paciente_email, $paciente_senha){
        return (new Database('Paciente'))->select("paciente_email = '$paciente_email'  and paciente_senha =  '$paciente_senha'")
                                        ->fetchObject(self::class);
    }
        

}    