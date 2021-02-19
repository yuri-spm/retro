<?php

namespace Source\CRUD\Models;
use Source\Database\Connect;

class UserModel extends Model
{
    /**
     * @var array $safe no create or update
     */

    protected static $safe = ["clie_id"];

    /**
     * @var string $cliente database table
     */
    protected  static  $entity = "cliente";



    public  function  bootstrap(string $nome, string $email, string $cpf )
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;

       return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     * @return mixed|null
     */
    public function loadCliente(int $clie_id, string $columns = "*")
    {
        //select * from cliente where clie_id = 1
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE clie_id = :clie_id", "clie_id={$clie_id}");
        //var_dump($load->fetch());
        
        if($this->fail() || !$load->rowCount()){
            $this->message = "Usuário não encontrado para o id informado.";
            return null;
        }
        return $load->fetchObject(__CLASS__);

    }

    /**
     * @param $email
     * @param string $columns
     * @return mixed|null
     */
    public  function find($email, $columns = "*")
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email ", "email={$email}");
        if($this->fail() || !$find->rowCount()){
            $this->message = "Usuário não encontrado para email informado.";
            return null;
        }
        return $find->fetchObject(__CLASS__);

    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     * @return array|null
     */
    public  function all(int $limit = 30, int $offset = 0, string $columns= "*")
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :l OFFSET :o  ", "l={$limit}&o={$offset}");
        if($this->fail() || !$all->rowCount()){
            $this->message = "Sua consulta não retornou nenhum usuário.";
            return null;
        }
        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);

    }

    /**
     * @return $this|null
     */
    public function save(): ?UserModel
    {
        if (!$this->required()) {
            return null;
        }

        /** User Update */
        if (!empty($this->clie_id)) {
            $userId = $this->clie_id;
            $email = $this->read("SELECT clie_id FROM cliente WHERE email = :email AND clie_id != :clie_id",
                "email={$this->email}&clie_id={$userId}");

            if ($email->rowCount()) {
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "clie_id = :clie_id", "clie_id={$userId}");
            if ($this->fail()) {
                $this->message = "Erro ao atualizar, verifique os dados";
            }
            $this->message = "Dados atualizados com sucesso";
        }

        /** User Create */
        if (empty($this->clie_id)) {
            if ($this->find($this->email)) {
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());
            if ($this->fail()) {
                $this->message = "Erro ao cadastrar, verifique os dados";
            }
            $this->message = "Cadastro realizado com sucesso";
        }

        $this->data = $this->read("SELECT * FROM cliente WHERE clie_id = :clie_id", "clie_id={$userId}")->fetch();
        return $this;
    }
    public function destroy(): ?UserModel
    {
        if (!empty($this->clie_id)) {
            $this->delete(self::$entity, "clie_id = :clie_id", "clie_id={$this->clie_id}");
        }

        if ($this->fail()) {
            $this->message = "Não foi possível remover o usuário";
            return null;
        }

        $this->message = "Usuário removido com sucesso";
        $this->data = null;
        return $this;
    }

    protected function required()
    {
        if(empty($this->nome) || empty($this->email)){
            $this->message = "Nome e email são obrigatorios";
            return false;

        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "O e-mail informado não parece válido";
            return false;
        }
        return true;
    }



}
