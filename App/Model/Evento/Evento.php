<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Evento;
use App\Base;
class Evento extends Base
{
    const FIELD_ID = "id";
    const FIELD_NOME = "nome";
    const FIELD_DESCRICAO = "descricao";
    const FIELD_LOCAL = "local";
    const FIELD_CEP = "cep";
    const FIELD_LOGRADOURO = "logradouro";
    const FIELD_NUMERO = "numero";
    const FIELD_BAIRRO = "bairro";
    const FIELD_FONE = "fone";
    const FIELD_EMAIL = "email";
    const FIELD_PRECO_MEIA = "preco_meia";
    const FIELD_PRECO_GERAL = "preco_geral";
    const FIELD_VAGAS_MEIA = "vagas_meia";
    const FIELD_VAGAS_GERAL = "vagas_geral";
    const FIELD_DATA_EVENTO = "data_evento";
    const FIELD_HORARIO = "horario";
    const FIELD_DURACAO = "duracao";
    const FIELD_IMG_EVENTO = "img_evento";
    const FIELD_BANNER = "banner";
    const FIELD_QTD_OCUP = "qtd_ocup";
    const FIELD_ATIVIDADE_ID = "atividade_id";
    const FIELD_INSTITUICAO_ID = "instituicao_id";
    const FIELD_CIDADE_ID = "cidade_id";
    const FIELD_URL = "url";
    const FIELD_STATUS_EVENTO = "status_evento";

    /**
     * @return int
     */
    public function getId() : int
    {
        return (int)$this->data[self::FIELD_ID];
    }

    /**
     * @param int $id
     */
    public function setId(int $id) : void
    {
        $this->data[self::FIELD_ID] = $id;
    }

    /**
     * @return string
     */
    public function getNome() : string
    {
        return (string)$this->data[self::FIELD_NOME];
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome) : void
    {
        $this->data[self::FIELD_NOME] = $nome;
    }

    /**
     * @return string
     */
    public function getDescricao() : string
    {
        return (string)$this->data[self::FIELD_DESCRICAO];
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao) : void
    {
        $this->data[self::FIELD_DESCRICAO] = $descricao;
    }

    /**
     * @return string
     */
    public function getLocal() : string
    {
        return (string)$this->data[self::FIELD_LOCAL];
    }

    /**
     * @param string $local
     */
    public function setLocal(string $local) : void
    {
        $this->data[self::FIELD_LOCAL] = $local;
    }

    /**
     * @return string
     */
    public function getCep() : string
    {
        return (string)$this->data[self::FIELD_CEP];
    }

    /**
     * @param string $cep
     */
    public function setCep(string $cep) : void
    {
        $this->data[self::FIELD_CEP] = $cep;
    }

    /**
     * @return string
     */
    public function getLogradouro() : string
    {
        return (string)$this->data[self::FIELD_LOGRADOURO];
    }

    /**
     * @param string $logradouro
     */
    public function setLogradouro(string $logradouro) : void
    {
        $this->data[self::FIELD_LOGRADOURO] = $logradouro;
    }

    /**
     * @return int
     */
    public function getNumero() : int
    {
        return (int)$this->data[self::FIELD_NUMERO];
    }

    /**
     * @param int $numero
     */
    public function setNumero(int $numero) : void
    {
        $this->data[self::FIELD_NUMERO] = $numero;
    }

    /**
     * @return string
     */
    public function getBairro() : string
    {
        return (string)$this->data[self::FIELD_BAIRRO];
    }

    /**
     * @param string $bairro
     */
    public function setBairro(string $bairro) : void
    {
        $this->data[self::FIELD_BAIRRO] = $bairro;
    }

    /**
     * @return string
     */
    public function getFone() : string
    {
        return (string)$this->data[self::FIELD_FONE];
    }

    /**
     * @param string $fone
     */
    public function setFone(string $fone) : void
    {
        $this->data[self::FIELD_FONE] = $fone;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return (string)$this->data[self::FIELD_EMAIL];
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email) : void
    {
        $this->data[self::FIELD_EMAIL] = $email;
    }

    /**
     * @return float
     */
    public function getPrecoMeia() : float
    {
        return (float)$this->data[self::FIELD_PRECO_MEIA];
    }

    /**
     * @param float $precoMeia
     */
    public function setPrecoMeia(float $precoMeia) : void
    {
        $this->data[self::FIELD_PRECO_MEIA] = $precoMeia;
    }

    /**
     * @return float
     */
    public function getPrecoGeral() : float
    {
        return (float)$this->data[self::FIELD_PRECO_GERAL];
    }

    /**
     * @param float $precoGeral
     */
    public function setPrecoGeral(float $precoGeral) : void
    {
        $this->data[self::FIELD_PRECO_GERAL] = $precoGeral;
    }

    /**
     * @return int
     */
    public function getVagasGeral() : int
    {
        return (int)$this->data[self::FIELD_VAGAS_GERAL];
    }

    /**
     * @param int $vagasGeral
     */
    public function setVagasGeral(int $vagasGeral) : void
    {
        $this->data[self::FIELD_VAGAS_GERAL] = $vagasGeral;
    }

    /**
     * @return int
     */
    public function getVagasMeia() : int
    {
        return (int)$this->data[self::FIELD_VAGAS_MEIA];
    }

    /**
     * @param int $vagasMeia
     */
    public function setVagasMeia(int $vagasMeia) : void
    {
        $this->data[self::FIELD_VAGAS_MEIA] = $vagasMeia;
    }

    /**
     * @return string
     */
    public function getDataEvento() : string
    {
        return (string)$this->data[self::FIELD_DATA_EVENTO];
    }

    /**
     * @param string $dataEvento
     */
    public function setDataEvento(string $dataEvento) : void
    {
        $this->data[self::FIELD_DATA_EVENTO] = $dataEvento;
    }

    /**
     * @return string
     */
    public function getHorario() : string
    {
        return (string)$this->data[self::FIELD_HORARIO];
    }

    /**
     * @param string $Horario
     */
    public function setHorario(string $Horario) : void
    {
        $this->data[self::FIELD_HORARIO] = $Horario;
    }

    /**
     * @return int
     */
    public function getDuracao() : int
    {
        return (int)$this->data[self::FIELD_DURACAO];
    }

    /**
     * @param int $duracao
     */
    public function setDuracao(int $duracao) : void
    {
        $this->data[self::FIELD_DURACAO] = $duracao;
    }

    /**
     * @return string
     */
    public function getImgEvento() : string
    {
        return (string)$this->data[self::FIELD_IMG_EVENTO];
    }

    /**
     * @param string $imgEvento
     */
    public function setImgEvento(string $imgEvento) : void
    {
        $this->data[self::FIELD_IMG_EVENTO] = $imgEvento;
    }

    /**
     * @return string
     */
    public function getBanner() : string
    {
        return (string)$this->data[self::FIELD_BANNER];
    }

    /**
     * @param string $banner
     */
    public function setBanner(string $banner) : void
    {
        $this->data[self::FIELD_BANNER] = $banner;
    }

    /**
     * @return int
     */
    public function getQtdOcup() : int
    {
        return (int)$this->data[self::FIELD_QTD_OCUP];
    }

    /**
     * @param int $qtdOcup
     */
    public function setQtdOcup(int $qtdOcup) : void
    {
        $this->data[self::FIELD_QTD_OCUP] = $qtdOcup;
    }

    /**
     * @return int
     */
    public function getAtividadeId() : int
    {
        return (int)$this->data[self::FIELD_ATIVIDADE_ID];
    }

    /**
     * @param int $atividadeId
     */
    public function setAtividadeId(int $atividadeId) : void
    {
        $this->data[self::FIELD_ATIVIDADE_ID] = $atividadeId;
    }

    /**
     * @return int
     */
    public function getInstituicaoId() : int
    {
        return (int)$this->data[self::FIELD_INSTITUICAO_ID];
    }

    /**
     * @param int $instituicaoId
     */
    public function setInstituicaoId(int $instituicaoId) : void
    {
        $this->data[self::FIELD_INSTITUICAO_ID] = $instituicaoId;
    }

    /**
     * @return int
     */
    public function getCidadeId() : int
    {
        return (int)$this->data[self::FIELD_CIDADE_ID];
    }

    /**
     * @param int $cidadeId
     */
    public function setCidadeId(int $cidadeId) : void
    {
        $this->data[self::FIELD_CIDADE_ID] = $cidadeId;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return (string)$this->data[self::FIELD_URL];
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) : void
    {
        $this->data[self::FIELD_URL] = $url;
    }

    /**
     * @return string
     */
    public function getStatusEvento() : string
    {
        return (string)$this->data[self::FIELD_STATUS_EVENTO];
    }

    /**
     * @param string $statusEvento
     */
    public function setStatusEvento(string $statusEvento) : void
    {
        $this->data[self::FIELD_STATUS_EVENTO] = $statusEvento;
    }
}