<?php
require_once __DIR__ . "/config.php";

$query_str = "SELECT tx_login, nm_avaliador FROM avaliador";
$query = $dbh->prepare($query_str);
$query->execute();

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
    </tr>
</thead>
<tbody>
   
    <?php while($row = $query->fetch()): ?>
    <tr>
        <td><?= $row['tx_login'] ?></td>
        <td><?= $row['nm_avaliador'] ?></td>
    </tr>
    <?php endwhile; ?>
</tbody>
</table>
</body>
</html>
