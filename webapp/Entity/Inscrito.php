<?php
namespace EtecAB\Entity;

class Inscrito
{
	private $rg;
	private $ra;
	private $nome;
	private $turma;
	private $dtnasc;
	private $email;
	private $fone;

	function __construct(array $inscrito = array())
	{
		$rg = null;
		$ra = null;
		$nome = null;
		$turma = null;
		$dtnasc = null;
		$email = null;
		$fone = null;
		extract($inscrito);

		$this->setRg($rg);
		$this->setRa($ra);
		$this->setNome($nome);
		$this->setTurma($turma);
		$this->setDtnasc($dtnasc);
		$this->setEmail($email);
		$this->setFone($fone);
	}

	public function setRg($rg)
	{
		$this->rg = $rg;
	}

	public function setRa($ra)
	{
		$this->ra = $ra;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function setTurma($turma)
	{
		$this->turma = $turma;
	}

	public function setDtnasc($dtnasc)
	{
		$this->dtnasc = $dtnasc;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setFone($fone)
	{
		$this->fone = $fone;
	}

	public function getRg()
	{
		return $this->rg;
	}

	public function getRa()
	{
		return $this->ra;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getTurma()
	{
		return $this->turma;
	}

	public function getDtnasc()
	{
		return $this->dtnasc;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getFone()
	{
		return $this->fone;
	}
}