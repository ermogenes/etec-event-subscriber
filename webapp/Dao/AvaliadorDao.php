<?php

namespace EtecAB\Dao;
use EtecAB\Entity\Avaliador as AvaliadorEntity;
{
    class AvaliadorDao
    {

	    private $dbh;

	    function __construct(\PDO $dbh)
	    {
		    $this->dbh = $dbh;
	    }

	    public function fetchAll()
	    {
		    $query = $this->dbh->prepare("SELECT tx_login AS login,nm_avaliador AS nome,st_avaliador AS status FROM avaliador");
		    $query->execute();

		    $entities = array();
		    while($row = $query->fetch()) {
			    $entities[] = new AvaliadorEntity($row);
		    }
		    return $entities;
	    }

       	public function fetchOneByLogin($login)
	    {
		    $query = $this->dbh->prepare("SELECT tx_login AS login,nm_avaliador AS nome,st_avaliador AS status FROM avaliador WHERE tx_login = ?");
		    $query->execute([$login]);

		    $row = $query->fetch();
		    return $row ? new AvaliadorEntity($row) : null;
	    }

        public function save(AvaliadorEntity $entity, $senha = null)
	    {
            if($this->fetchOneByLogin($entity->getLogin())){
	 		    $this->update($entity, $senha);
	 	    }
	 	    $this->insert($entity, $senha);
	    }

       	public function insert(AvaliadorEntity $entity, $senha = null)
	    {
            if($entity->getLogin()) {
		        $query = $this->dbh->prepare("INSERT INTO avaliador (tx_login,nm_avaliador,st_avaliador,bn_senha) VALUES(?, ?, ?, sha1(?))");
		        $query->execute(array($entity->getLogin(), $entity->getNome(), $entity->getStatus(), $senha));
            }
	    }

	    public function update(AvaliadorEntity $entity, $nova_senha = null)
	    {
            if($entity->getLogin()) {
    			$query = $this->dbh->prepare("UPDATE avaliador SET nm_avaliador=?, st_avaliador=?, bn_senha=sha1(?) WHERE tx_login = ?");
	    		$query->execute(array($entity->getNome(), $entity->getStatus(), $nova_senha, $entity->getLogin()));
            }
	    }

	    public function delete(AvaliadorEntity $entity)
	    {
            if($entity->getLogin()) {
			    $query = $this->dbh->prepare("DELETE FROM avaliador WHERE tx_login = ?");
			    $query->execute(array($entity->getLogin()));
            }
	    }
    }
}