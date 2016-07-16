<?php

require_once __DIR__ . "/../webapp/config.php";

use EtecAB\Entity\Avaliador;
use EtecAB\Dao\AvaliadorDao;

use EtecAB\Entity\Inscrito;
use EtecAB\Dao\InscritoDao;

use EtecAB\Entity\Evento;
use EtecAB\Dao\EventoDao;

printf("---- etecab-event-subscriber Testes manuais ----\n");

/*
$avDao = new AvaliadorDao($dbh);

$seed = rand(0, 99);
$loginGravar = "fulano" . $seed;

$avGravar = new Avaliador();
$avGravar->setLogin($loginGravar);
$avGravar->setNome("Fulano de Tal");
$avGravar->setStatus("A");

printf("GRAVAR: login = %s, nome = %s, status = %s\n", $avGravar->getLogin(), $avGravar->getNome(), $avGravar->getStatus());

$novoAvaliador = new Avaliador();
$avDao->save($avGravar, "senha" . $seed);

$avLido = $avDao->fetchOneByLogin($avGravar->getLogin());

printf("LIDO: login = %s, nome = %s, status = %s\n", $avLido->getLogin(), $avLido->getNome(), $avLido->getStatus());
*/

/*
$ioDao = new InscritoDao($dbh);

$seed = rand(0, 99);
$ioGravar = new Inscrito();
$ioGravar->setRa($seed);
$ioGravar->setRg("RG".$seed);
$ioGravar->setNome("fulano".$seed);
$ioGravar->setTurma("Turma ".$seed);
$ioGravar->setDtnasc(date("Y-m-d"));
$ioGravar->setFone("011".$seed);
$ioGravar->setEmail($seed."@".$seed);

printf("GRAVAR: id = %s, ra = %s, rg = %s, nome = %s, turma = %s, dtnasc = %s, fone = %s, email = %s\n", $ioGravar->getId(), $ioGravar->getRa(), $ioGravar->getRg(), $ioGravar->getNome(), $ioGravar->getTurma(), $ioGravar->getDtnasc(), $ioGravar->getFone(), $ioGravar->getEmail());

$novoInscrito = new Inscrito();
$ioId = $ioDao->save($ioGravar);

$ioLido = $ioDao->fetchOneById($ioId);

printf("LIDO: id = %s, ra = %s, rg = %s, nome = %s, turma = %s, dtnasc = %s, fone = %s, email = %s\n", $ioGravar->getId(), $ioGravar->getRa(), $ioGravar->getRg(), $ioGravar->getNome(), $ioGravar->getTurma(), $ioGravar->getDtnasc(), $ioGravar->getFone(), $ioGravar->getEmail());
*/



$seed = rand(0, 99);
$hoje = date("Y-m-d");

$evGravar = new Evento();
$evGravar->setNome("fulano ".$seed);
$evGravar->setDescricao("descricao ".$seed);
$evGravar->setInicio($hoje." 22:00:00");
$evGravar->setFim($hoje." 23:00:00");
$evGravar->setVagas($seed);
$evGravar->setCondicoes("Condicoes ".$seed);
$evGravar->setAvaliacao("P");
$evGravar->setAvaliador("narciso");
$evGravar->setPermiteMenor("S");
$evGravar->setSolicitaAutorizacao("S");

printf("GRAVAR: id = %s, nome = %s, descricao = %s, inicio = %s, fim = %s, vagas = %s, condicoes = %s, avaliacao = %s, avaliador = %s, permite_menor = %s, solicita_autorizacao = %s\n", $evGravar->getId(), $evGravar->getNome(), $evGravar->getDescricao(), $evGravar->getInicio(), $evGravar->getFim(), $evGravar->getVagas(), $evGravar->getCondicoes(), $evGravar->getAvaliacao(), $evGravar->getAvaliador(), $evGravar->getPermiteMenor(), $evGravar->getSolicitaAutorizacao());

$evDao = new EventoDao($dbh);
$evId = $evDao->save($evGravar);

$evLido = $evDao->fetchOneById($evId);

printf("LIDO: id = %s, nome = %s, descricao = %s, inicio = %s, fim = %s, vagas = %s, condicoes = %s, avaliacao = %s, avaliador = %s, permite_menor = %s, solicita_autorizacao = %s\n", $evLido->getId(), $evLido->getNome(), $evLido->getDescricao(), $evLido->getInicio(), $evLido->getFim(), $evLido->getVagas(), $evLido->getCondicoes(), $evLido->getAvaliacao(), $evLido->getAvaliador(), $evLido->getPermiteMenor(), $evLido->getSolicitaAutorizacao());
 