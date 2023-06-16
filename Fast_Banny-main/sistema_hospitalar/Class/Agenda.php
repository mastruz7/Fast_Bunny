<?php

require_once('Database.php');

class Agenda{

    private $setConn;

    public $id;

    public $medico_id;

    public $agenda_titulo;

    public $agenda_data;

    public $agenda_hora;

    public function __construct(){
        $this->setConn = new Database('Agenda');
    }

    public function Cadastrar() {
        $this->id = $this->setConn->insert([
                                            'medico_id_fk' => $this->medico_id,
                                            'agenda_titulo'=> $this->agenda_titulo,
                                            'agenda_data'  => $this->agenda_data,
                                            'agenda_hora'  => $this->agenda_hora
                                            ]);
        return true;
    }
        
    public function Atualizar(){
        return $this->setConn->update('agenda_id = '.$this->id,[
                                                                'medico_id_fk' => $this->medico_id,
                                                                'agenda_titulo'=> $this->agenda_titulo,
                                                                'agenda_data'  => $this->agenda_data,
                                                                'agenda_hora'  => $this->agenda_hora
                                                                ]);
    }
        
    public function Excluir(){
        return $this->setConn->delete('agenda_id = '.$this->id);
    }
        
    public static function getAgendas($where = null, $order = null, $limit = null){
       return (new Database('Agenda'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    public static function getAgenda($id){
        return (new Database('Agenda'))->select('agenda_id = '.$id)
                                      ->fetchObject(self::class);
      }
        

}