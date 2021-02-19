<<<<<<< HEAD
<?php
class Pessoa
{
    protected $cpf;
    protected $nome;                 
    protected $email;
    protected $telefone;            

    
    /**
     * Pessoa constructor.
     * @param $cpf
     * @param $nome
     * @param $telefone
     * @param $email
     
          */
    public function __construct($cpf,$nome,$telefone,$email)
    {
        $this->cpf = filter_var($cpf, FILTER_SANITIZE_STRIPPED);
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRIPPED);
        $this->telefone = filter_var($telefone, FILTER_SANITIZE_STRIPPED);
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        }

    
    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

/**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    
    


}



=======
<?php
class Pessoa
{
    protected $cpf;
    protected $nome;                 
    protected $email;
    protected $telefone;            

    
    /**
     * Pessoa constructor.
     * @param $cpf
     * @param $nome
     * @param $telefone
     * @param $email
     
          */
    public function __construct($cpf,$nome,$telefone,$email)
    {
        $this->cpf = filter_var($cpf, FILTER_SANITIZE_STRIPPED);
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRIPPED);
        $this->telefone = filter_var($telefone, FILTER_SANITIZE_STRIPPED);
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        }

    
    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

/**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    
    


}



>>>>>>> a769a0648624c4b9a315bd7c3a8329d48aa56a85
