<?php

namespace EtecAB\Dao;
use EtecAB\Entity\Evento as EventoEntity;
{
	class EventoDao
	{
        private $dbh;

	    function __construct(\PDO $dbh)
	    {
		    $this->dbh = $dbh;
	    }

	    public function fetchAll()
	    {
		    $query = $this->dbh->prepare("SELECT id_evento AS id,nm_evento AS nome,dc_evento AS descricao,dt_inicio AS inicio,dt_fim AS fim,nr_vagas AS vagas,tx_condicoes AS condicoes,st_avaliacao AS avaliacao,tx_login_avaliador AS avaliador,in_permite_menor AS permite_menor,in_solicita_autorizacao AS solicita_autorizacao FROM evento");
		    $query->execute();

		    $entities = array();
		    while($row = $query->fetch()) {
			    $entities[] = new EventoEntity($row);
		    }
		    return $entities;
	    }

        public function fetchOneById($id)
	    {
		    $query = $this->dbh->prepare("SELECT id_evento AS id,nm_evento AS nome,dc_evento AS descricao,dt_inicio AS inicio,dt_fim AS fim,nr_vagas AS vagas,tx_condicoes AS condicoes,st_avaliacao AS avaliacao,tx_login_avaliador AS avaliador,in_permite_menor AS permite_menor,in_solicita_autorizacao AS solicita_autorizacao FROM evento WHERE id_evento = ?");
		    $query->execute([$id]);
		    $row = $query->fetch();
		    return $row ? new EventoEntity($row) : null;
	    }

        public function save(EventoEntity $entity)
	    {
            if($entity->getId() > 0){
                return $this->update($entity);
            }
            return $this->insert($entity);
	    }

        public function insert(EventoEntity $entity)
	    {
            $query = $this->dbh->prepare("INSERT INTO evento (nm_evento,dc_evento,dt_inicio,dt_fim,nr_vagas,tx_condicoes,st_avaliacao,tx_login_avaliador,in_permite_menor,in_solicita_autorizacao) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $dados = array($entity->getNome(), $entity->getDescricao(), $entity->getInicio(), $entity->getFim(), $entity->getVagas(), $entity->getCondicoes(), $entity->getAvaliacao(), $entity->getAvaliador(), $entity->getPermiteMenor(), $entity->getSolicitaAutorizacao());
            $query->execute($dados);
            return $this->dbh->lastInsertId();
	    }

	    public function update(EventoEntity $entity)
	    {
            if($entity->getId() > 0) {
    			$query = $this->dbh->prepare("UPDATE evento SET nm_evento=?,dc_evento=?,dt_inicio=?,dt_fim=?,nr_vagas=?,tx_condicoes=?,st_avaliacao=?,tx_login_avaliador=?,in_permite_menor=?,in_solicita_autorizacao=? WHERE id_evento = ?");
	    		$query->execute(array($entity->getNome(), $entity->getDescricao(), $entity->getInicio(), $entity->getFim(), $entity->getVagas(), $entity->getCondicoes(), $entity->getAvaliacao(), $entity->getAvaliador(), $entity->getPermiteMenor(), $entity->getSolicitaAutorizacao(), $entity->getId()));
            }
	    }

	    public function delete(EventoEntity $entity)
	    {
            if($entity->getId() > 0) {
			    $query = $this->dbh->prepare("DELETE FROM evento WHERE id_evento = ?");
			    $query->execute(array($entity->getId()));
            }
	    }
	}
}