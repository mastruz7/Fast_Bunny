<?php

require_once 'Database/Database.php';

class Medico{

    /**
     * Identificador único do médico
     * @var integer
     */
    public $id;

    /**
     * Nome do médico
     * @var string
     */
    public $nome_completo;

    /**
     * Especialiade do médico
     * @var string
     */
    public $especialidade;

    /**
     * E-mail do médico
     * @var string
     */
    public $email;

    /**
     * Telefone do médico
     * @var int
     */
    public $telefone;

    /**
     * CRM de registro médico
     * @var string
     */
    public $crm;

    /**
     * Data de criaçao do registro
     * @var string
     */
    public $data_cadastro;

    /**
     * Método utilizado para cadastrar um médico no banco
     * @var boolean
     */
    public function Cadastrar() {
        $this->data_cadastro = date('Y-m-d H:i:s');
        $obDatabase = new Database('medico');
        $this->id = $obDatabase->insert([
                                        'nome_medico'           => $this->nome_completo,
                                        'especialidade_medico'  => $this->especialidade,
                                        'email_medico'          => $this->email,
                                        'telefone_medico'       => $this->telefone,
                                        'crm_medico'            => $this->crm,
                                        'data_cadastro'         => $this->data_cadastro
                                        ]);
        return true;
    }
        
    /**
     * Método responsável por atualizar o médico do banco
     * @return boolean
     */
    public function Atualizar(){
        return (new Database('medico'))->update('id = '.$this->id,[
                                                                    'nome_medico'           => $this->nome_completo,
                                                                    'especialidade_medico'  => $this->especialidade,
                                                                    'email_medico'          => $this->email,
                                                                    'telefone_medico'       => $this->telefone,
                                                                    'crm_medico'            => $this->crm
                                                                  ]);
    }
        
    /**
     * Método responsável por excluir o médico do banco
     * @return boolean
     */
    public function Excluir(){
        return (new Database('medico'))->delete('id = '.$this->id);
    }
        
    /**
     * Método responsável por obter todos os médicos do banco de dados
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @return array
     */
    public static function getMedicos($where = null, $order = null, $limit = null){
      return (new Database('medico'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    /**
     * Método responsável por buscar uma médico com base em seu ID
     * @param  integer $id
     * @return Medico
     */
    public static function getMedico($id){
      return (new Database('medico'))->select('id = '.$id)
                                    ->fetchObject(self::class);
    }
        

}    