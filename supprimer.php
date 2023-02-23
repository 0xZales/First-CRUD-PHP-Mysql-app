<?php
require('f_connexion.php');
define("dbname", "MARCHE");
$db=connect(host,username,password,dbname);

$id = $_GET["id"];
$sql = "DELETE FROM hangar WHERE id=:id";
$statement = $db->prepare($sql);
if (
    $statement->execute([
        ':id' => $id
    ])
) {
    header("location:/Hangar");
}

; ?>