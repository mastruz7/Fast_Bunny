<?php

require_once 'Database.php';

class Especialidade{

    private $setConn;

    public $id;

    public $especialidade_nome;

  
    public function __construct(){
        $this->setConn = new Database('Especialidade');
    }


    public function Cadastrar() {
        $this->id = $this->setConn->insert([
                                            'especialidade_nome'=> $this->especialidade_nome
                                            ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('especialidade_id = '.$this->id,[
                                                                        'especialidade_nome' => $this->especialidade_nome,
                                                                        ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('especialidade_id = '.$this->id);
    }
        
    public static function getEspecialidades($where = null, $order = null, $limit = null){
      return (new Database('Especialidade'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getEspecialidade($id){
      return (new Database('Especialidade'))->select('especialidade_id = '.$id)
                                    ->fetchObject(self::class);
    }
        

}