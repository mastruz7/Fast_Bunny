<?php

require_once 'Database.php';

class Consulta{

    private $setConn;

    public $id;

    public $paciente_id;

    public $agenda_id;

    public $consulta_data;
    
    public function __construct(){
        $this->setConn = new Database('Consulta');
    }

    public function Cadastrar() {
        $this->id = $this->setConn->insert([
                                            'paciente_id_fk' => $this->paciente_id,
                                            'agenda_id_fk'   => $this->agenda_id,
                                            'data_consulta'  => $this->data_consulta
                                            ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('consulta_id = '.$this->id,[
                                                                    'paciente_id_fk' => $this->paciente_id,
                                                                    'agenda_id_fk'   => $this->agenda_id,
                                                                    'data_consulta'  => $this->data_consulta
                                                                ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('consulta_id = '.$this->id);
    }
        
    public static function getConsultas($where = null, $order = null, $limit = null){
      return (new Database('Consulta'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getConsulta($id){
      return (new Database('Consulta'))->select('consulta_id = '.$id)
                                    ->fetchObject(self::class);
    }
        

}