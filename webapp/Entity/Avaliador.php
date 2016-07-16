<?php
namespace EtecAB\Entity;
{
    class Avaliador
    {
	    private $login;
	    private $nome;
	    private $status;

	    function __construct(array $avaliador = array())
	    {
		    $login = null;
		    $nome = null;
		    $status = null;

		    extract($avaliador);

		    $this->setLogin($login);
		    $this->setNome($nome);
		    $this->setStatus($status);
	    }

	    public function setLogin($login)
	    {
		    $this->login = $login;
	    }

	    public function setNome($nome)
	    {
		    $this->nome = $nome;
	    }

	    public function setStatus($status)
	    {
		    $this->status = $status;
	    }

	    public function getLogin()
	    {
		    return $this->login;
	    }

        public function getNome()
	    {
		    return $this->nome;
	    }

	    public function getStatus()
	    {
		    return $this->status;
	    }
    }
}
