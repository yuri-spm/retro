<?php

namespace Source\CRUD\Models;
use Source\Database\Connect;


class  UserAddress extends Model{

    /** @var array safe no update or create */
    /* Esta é a propriedade que não deixará que estas colunas da tabela "clie_endereco" sejam manupuladas. */

    public static $safe = ["endereco_id"];


///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

    /** @var string $entity database table*/
    protected static $entity ="clie_endereco";

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

    public function bootstrap($clie_id, string $rua, string $numero, string $complemento = null, string $bairro, string $cidade, string $cep, string $referencia = null, string $telefone):?UserAddress
    {
        $this->clie_id = $clie_id;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->cep = $cep;
        $this->referencia = $referencia;
        $this->telefone = $telefone;
        return $this;
    }

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @param int $id
     * @param string $columns
     * @return mixed|null
     */

// esse $clie_id é a chave primária da tabela 'cliente' e é "FK" na tabela 'clie_endereco'
    public  function  loadEndereco(int $clie_id, string $columns = "*"): ?UserAddress
    {

        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE clie_id = :clie_id", "clie_id={$clie_id}");

        if($this->fail() || !$load->rowCount()){
            $this->message["Erro do loadEndereco"] = "Endereço não encontrado";
            return null;
        }
        return $load->fetchObject(__CLASS__);
    }

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////\

    public function findTelefone($telefone, $columns = "*"): ?UserAddress
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE telefone = :telefone ", "telefone={$telefone}");
        if($this->fail() || !$find->rowCount()){
            $this->message = "Telefone não encontrado para o id informado.";
            return null;
        }
        return $find->fetchObject(__CLASS__);

    }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

    public function all(int $limit = 30, int $offset = 0, string $columns = "*"){
    $all = $this->read ("SELECT {$columns} FROM " .self::$clie_endereco. " LIMIT :l  OFFSET :o", "l={$limit}&o={$offset}");

    if ($this->fail() || !$all->rowCount()){
       $this->message["Erro no all"] = "Sua consulta não retornou nenhum endereço.";
       return null;
    }    
    return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
}

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

    public function save(): ?UserAddress
    {

        if (!$this->required()){
            return null;
        }



        /** User Update */
        if (!empty($this->endereco_id)) {
            $endereco_id = $this->endereco_id;
            $telefone = $this->read("SELECT clie_id FROM clie_endereco WHERE endereco_id  = :endereco_id AND clie_id != :clie_id",
                "clie_id={$this->clie_id}&endereco_id={$endereco_id}");

            if ($telefone->rowCount()) {
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "endereco_id = :endereco_id", "endereco_id={$endereco_id}");
            if ($this->fail()) {
                $this->message = "Erro ao atualizar, verifique os dados";
            }
            $this->message = "Dados atualizados com sucesso";
        }


        /** User Create */
        if (empty($this->endereco_id)){
            if ($this->findTelefone($this->telefone)){
                $this->message = "O Telefone informado já está cadastrado";
                return null;
            }
            $endereco_id = $this->create(self::$entity, $this->safe());
            if ($this->fail()){
                $this->message = "Erro ao cadastrar, verifique os dados";
            }
            $this->message = "Endereço incluído com sucesso!";
        }

        $this->data = $this->read("SELECT * FROM clie_endereco WHERE endereco_id = :endereco_id", "endereco_id={$endereco_id}")->fetch();
        return $this;

    }

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

    public function destroy()
    {

    }

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

    private function required()
    {
        if (empty($this->telefone) || empty($this->rua) || empty($this->numero) || empty($this->bairro) || empty($this->cidade) || empty($this->cep)){
            $this->message = "Dados incompletos.";
        }
        return true;

    }

}
/**
 * fazer o update - save - required (verificar o ultimo id cadastrado na tabela cliente)
 */


