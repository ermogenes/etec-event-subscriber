<?php

namespace EtecAB\Dao;
use EtecAB\Entity\Inscrito as InscritoEntity;
{
	class InscritoDao
	{
        private $dbh;

	    function __construct(\PDO $dbh)
	    {
		    $this->dbh = $dbh;
	    }

	    public function fetchAll()
	    {
		    $query = $this->dbh->prepare("SELECT id_inscrito AS id,nr_ra AS ra,nr_rg AS rg,nm_inscrito AS nome,tx_turma AS turma,dt_nasc AS dt_nasc,tx_email AS email,tx_fone AS fone FROM inscrito");
		    $query->execute();

		    $entities = array();
		    while($row = $query->fetch()) {
			    $entities[] = new InscritoEntity($row);
		    }
		    return $entities;
	    }

        public function fetchOneById($id)
	    {
		    $query = $this->dbh->prepare("SELECT id_inscrito AS id,nr_ra AS ra,nr_rg AS rg,nm_inscrito AS nome,tx_turma AS turma,dt_nasc AS dt_nasc,tx_email AS email,tx_fone AS fone FROM inscrito WHERE id_inscrito = ?");
		    $query->execute([$id]);

		    $row = $query->fetch();
		    return $row ? new InscritoEntity($row) : null;
	    }

        public function fetchOneByRg($rg)
	    {
		    $query = $this->dbh->prepare("SELECT id_inscrito AS id,nr_ra AS ra,nr_rg AS rg,nm_inscrito AS nome,tx_turma AS turma,dt_nasc AS dt_nasc,tx_email AS email,tx_fone AS fone FROM inscrito WHERE nr_rg = ?");
		    $query->execute([$rg]);

		    $row = $query->fetch();
		    return $row ? new InscritoEntity($row) : null;
	    }

        public function save(InscritoEntity $entity)
	    {
            if($entity->getId() > 0){
                return $this->update($entity);
            }
            return $this->insert($entity);

	    }

        public function insert(InscritoEntity $entity)
	    {
		    $query = $this->dbh->prepare("INSERT INTO avaliador (nr_ra,nr_rg,nm_inscrito,tx_turma,dt_nasc,tx_email,tx_fone) VALUES(?, ?, ?, ?, ?, ?, ?)");
		    $query->execute(array($entity->getRa(), $entity->getRg(), $entity->getNome(), $entity->getTurma(), $entity->getDtNasc(), $entity->getEmail(), $entity->getFone()));
            return $this->dbh->lastInsertId();
	    }

	    public function update(InscritoEntity $entity)
	    {
            if($entity->getId() > 0) {
    			$query = $this->dbh->prepare("UPDATE avaliador SET nr_ra=?,nr_rg=?,nm_inscrito=?,tx_turma=?,dt_nasc=?,tx_email=?,tx_fone=? WHERE id_inscrito = ?");
	    		$query->execute(array($entity->getRa(), $entity->getRg(), $entity->getNome(), $entity->getTurma(), $entity->getDtNasc(), $entity->getEmail(), $entity->getFone(), $entity->getId()));
            }
	    }

	    public function delete(InscritoEntity $entity)
	    {
            if($entity->getId() > 0) {
			    $query = $this->dbh->prepare("DELETE FROM avaliador WHERE id_inscrito = ?");
			    $query->execute(array($entity->getId()));
            }
	    }
	}
}