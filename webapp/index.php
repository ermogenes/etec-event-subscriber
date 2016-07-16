<?php
require_once __DIR__ . "/config.php";

use EtecAB\Dao\AvaliadorDao;

$avaliadorDao = new AvaliadorDao($dbh);
$avaliadores = $avaliadorDao->fetchAll();
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
        <td><?= $avaliador->getLogin() ?></td>
        <td><?= $avaliador->getNome() ?></td>
        <td><?= $avaliador->getStatus() ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</body>
</html>
