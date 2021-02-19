<?php


namespace Source\Classes;


class Produto
{
protected $id_produto;
protected $quantidade;
protected $message;

    /**
     * Produto constructor.
     * @param $id_produto
     * @param $quantidade
     */
    public function __construct($id_produto,$quantidade)
    {
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
    }


    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->id_produto;
    }

/**
     * @return mixed
     */
    public function getquantidade()
    {
        return $this->quantidade;
    }


 /**
     * @return mixed
     */
    public function getmessage()
    {
        return $this->message;
    }


}