<?php
require_once __DIR__ . "/config.php";

use EtecAB\Dao\AvaliadorDao;

$avaliadorDao = new AvaliadorDao($dbh);
$avaliadores = $avaliadorDao->fetchAll();

use EtecAB\Dao\EventoDao;

$eventoDao = new EventoDao($dbh);
$eventos = $eventoDao->fetchAll();

use EtecAB\Dao\InscritoDao;

$inscritoDao = new InscritoDao($dbh);
$inscritos = $inscritoDao->fetchAll();


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Teste</title>
</head>
 
<body>

<h2>Conexão ok!</h2>

<table border="1" cellspacing="0">
<thead>
    <tr>
        <th>Login</th>
        <th>Nome</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
   
    <?php foreach($avaliadores as $avaliador): ?>
    <tr>
        <td>
            <?= $avaliador->getLogin() ?>
        </td>
        <td>
            <?= $avaliador->getNome() ?>
        </td>
        <td>
            <?= $avaliador->getStatus() ?>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>

    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Inicio</th>
                <th>Fim</th>
                <th>Vagas</th>
                <th>Condicoes</th>
                <th>Avaliacao</th>
                <th>Avaliador</th>
                <th>PermiteMenor</th>
                <th>SolicitaAutorizacao</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($eventos as $evento): ?>
            <tr>
                <td>
                    <?= $evento->getId() ?>
                </td>
                <td>
                    <?= $evento->getNome() ?>
                </td>
                <td>
                    <?= $evento->getDescricao() ?>
                </td>
                <td>
                    <?= $evento->getInicio() ?>
                </td>
                <td>
                    <?= $evento->getFim() ?>
                </td>
                <td>
                    <?= $evento->getVagas() ?>
                </td>
                <td>
                    <?= $evento->getCondicoes() ?>
                </td>
                <td>
                    <?= $evento->getAvaliacao() ?>
                </td>
                <td>
                    <?= $evento->getAvaliador() ?>
                </td>
                <td>
                    <?= $evento->getPermiteMenor() ?>
                </td>
                <td>
                    <?= $evento->getSolicitaAutorizacao() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<table border="1" cellspacing="0">
    <thead>
        <tr>
            <th>Login</th>
            <th>Id</th>
            <th>Rg</th>
            <th>Ra</th>
            <th>Nome</th>
            <th>Turma</th>
            <th>Dtnasc</th>
            <th>Email</th>
            <th>Fone</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($inscritos as $inscrito): ?>
        <tr>
            <td>
                <?= $inscrito->getId() ?>
            </td>
            <td>
                <?= $inscrito->getRg() ?>
            </td>
            <td>
                <?= $inscrito->getRa() ?>
            </td>
            <td>
                <?= $inscrito->getNome() ?>
            </td>
            <td>
                <?= $inscrito->getTurma() ?>
            </td>
            <td>
                <?= $inscrito->getDtnasc() ?>
            </td>
            <td>
                <?= $inscrito->getEmail() ?>
            </td>
            <td>
                <?= $inscrito->getFone() ?>
            </td>
	</tr>
	<?php endforeach; ?>
    </tbody>
</table>


</body>
</html>
