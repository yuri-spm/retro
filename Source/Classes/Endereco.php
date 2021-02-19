<?php





class Endereco
{
    protected $rua; /*BD -> endereço*/
    protected $bairro;
    protected $cidade;
    protected $complemento;
    protected $cep;
    protected $pontoReferencia;

    /**
     * Endereco constructor.
     * @param $rua
     * @param $complemento
     * @param $bairro
     * @param $cidade
     * @param $cep
     * @param $pontoReferencia
     */
    public function __construct($rua, $complemento, $bairro, $cidade, $cep, $pontoReferencia = null)
    {
        $this->rua = $rua;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->cep = $cep;
        $this->pontoReferencia = $pontoReferencia;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @return mixed
     */
    public function getPontoReferencia()
    {
        return $this->pontoReferencia;
    }


}