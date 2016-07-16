<?php
namespace EtecAB\Entity;

class Evento
{
	private $id;
	private $nome;
	private $descricao;
	private $inicio;
	private $fim;
	private $vagas;
	private $condicoes;
	private $avaliacao;
	private $avaliador;
	private $permite_menor;
	private $solicita_autorizacao;

	function __construct(array $evento = array())
	{
        $id = null;
        $nome = null;
        $descricao = null;
        $inicio = null;
        $fim = null;
        $vagas = null;
        $condicoes = null;
        $avaliacao = null;
        $avaliador = null;
        $permite_menor = null;
        $solicita_autorizacao = null;
		extract($evento);

        $this->setId($id);
        $this->setNome($nome);
        $this->setDescricao($descricao);
        $this->setInicio($inicio);
        $this->setFim($fim);
        $this->setVagas($vagas);
        $this->setCondicoes($condicoes);
        $this->setAvaliacao($avaliacao);
        $this->setAvaliador($avaliador);
        $this->setPermiteMenor($permite_menor);
        $this->setSolicitaAutorizacao($solicita_autorizacao);
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

    public function setInicio($inicio)
	{
		$this->inicio = $inicio;
	}

    public function setFim($fim)
	{
		$this->fim = $fim;
	}

    public function setVagas($vagas)
	{
		$this->vagas = $vagas;
	}

    public function setCondicoes($condicoes)
	{
		$this->condicoes = $condicoes;
	}

    public function setAvaliacao($avaliacao)
	{
		$this->avaliacao = $avaliacao;
	}

	public function setAvaliador($avaliador)
	{
		$this->avaliador = $avaliador;
	}

    public function setPermiteMenor($permite_menor)
	{
		$this->permite_menor = $permite_menor;
	}

    public function setSolicitaAutorizacao($solicita_autorizacao)
	{
		$this->solicita_autorizacao = $solicita_autorizacao;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getNome()
	{
		return $this->nome;
	}

    public function getDescricao()
	{
		return $this->descricao;
	}

    public function getInicio()
	{
		return $this->inicio;
	}

    public function getFim()
	{
		return $this->fim;
	}

    public function getVagas()
	{
		return $this->vagas;
	}

    public function getCondicoes()
	{
		return $this->condicoes;
	}

    public function getAvaliacao()
	{
		return $this->avaliacao;
	}

    public function getAvaliador()
	{
		return $this->avaliador;
	}

    public function getPermiteMenor()
	{
		return $this->permite_menor;
	}

    public function getSolicitaAutorizacao()
	{
		return $this->solicita_autorizacao;
	}
}