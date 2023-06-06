<?php

require_once 'Database/Database.php';

class Paciente{

    /**
     * Identificador único do paciente
     * @var integer
     */
    public $id;

    /**
     * Nome do paciente
     * @var string
     */
    public $nome_completo;

    /**
     * Data de Nascimento do paciente
     * @var string
     */
    public $data_nascimento;

    /**
     * CPF do paciente
     * @var int
     */
    public $cpf;
    
    /**
     * RG do paciente
     * @var int
     */
    public $rg;

    /**
     * E-mail do paciente
     * @var string
     */
    public $email;

    /**
     * Endereço do paciente
     * @var string
     */
    public $endereco;

    /**
     * Telefone do paciente
     * @var int
     */
    public $telefone;

    /**
     * Outro telefone para contato
     * @var int
     */
    public $telefone_adicional;

    /**
     * Data de criaçao do registro
     * @var string
     */
    public $data_cadastro;

    /**
     * Método utilizado para cadastrar um paciente no banco
     * @var boolean
     */
    public function Cadastrar() {
        $this->data_cadastro = date('Y-m-d H:i:s');
        $obDatabase = new Database('paciente');
        $this->id = $obDatabase->insert([
                                        'nome_paciente'                 => $this->nome_completo,
                                        'data_nascimento_paciente'      => $this->data_nascimento,
                                        'cpf_paciente'                  => $this->cpf,
                                        'rg_paciente'                   => $this->rg,
                                        'email_paciente'                => $this->email,
                                        'endereco_paciente'             => $this->endereco,
                                        'telefone_paciente'             => $this->telefone,
                                        'telefone_adicional_paciente'   => $this->telefone_adicional,
                                        'data_cadastro'                 => $this->data_cadastro
                                        ]);
        return true;
    }
        
    /**
     * Método responsável por atualizar o paciente do banco
     * @return boolean
     */
    public function Atualizar(){
        return (new Database('paciente'))->update('id = '.$this->id,[
                                                                    'nome_paciente'                 => $this->nome_completo,
                                                                    'data_nascimento_paciente'      => $this->data_nascimento,
                                                                    'cpf_paciente'                  => $this->cpf,
                                                                    'rg_paciente'                   => $this->rg,
                                                                    'email_paciente'                => $this->email,
                                                                    'endereco_paciente'             => $this->endereco,
                                                                    'telefone_paciente'             => $this->telefone,
                                                                    'telefone_adicional_paciente'   => $this->telefone_adicional
                                                                  ]);
    }
        
    /**
     * Método responsável por excluir o paciente do banco
     * @return boolean
     */
    public function Excluir(){
        return (new Database('paciente'))->delete('id = '.$this->id);
    }
        
    /**
     * Método responsável por obter todos os pacientes do banco de dados
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @return array
     */
    public static function getpacientes($where = null, $order = null, $limit = null){
      return (new Database('paciente'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
        
    /**
     * Método responsável por buscar uma paciente com base em seu ID
     * @param  integer $id
     * @return paciente
     */
    public static function getpaciente($id){
      return (new Database('paciente'))->select('id = '.$id)
                                    ->fetchObject(self::class);
    }
        

}    