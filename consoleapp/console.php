<?php

require_once __DIR__ . "/../webapp/config.php";

use EtecAB\Entity\Avaliador;
use EtecAB\Dao\AvaliadorDao;

printf("---- etecab-event-subscriber Testes manuais ----\n");

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
