<?php

$host = "localhost:3306";
$user = "root";
$pass = "root";

$bd = "northwind";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
} catch (PDOException $e) {
    echo "Error de conexión";
}
try {

    $cantidadATransferir = 100;
    $idEnvia = 1;
    $idRecibe = 2;

    //Primero iniciamos una transaccion
    $pdo->beginTransaction();

    // Preparamos la consulta
    $statement1 = $pdo->prepare("UPDATE cuentasbancarias SET cantidad = cantidad - (?) WHERE id = (?)");
    $statement1->bindParam(1,$cantidadATransferir);
    $statement1->bindParam(2,$idEnvia);
    $statement1->execute();

    // Preparamos la otra consulta y la ejecutamos
    $statement2 = $pdo->prepare("UPDATE cuentasbancarias SET cantidad = cantidad + (?) WHERE id = (?)");
    $statement2->bindParam(1,$cantidadATransferir);
    $statement2->bindParam(2,$idRecibe);
    $statement2->execute();

    // Confirma la transacción
    $pdo->commit();

    //Mostrar resultados:
    $result = $pdo->query("SELECT * FROM cuentasbancarias");

    $results = $result->fetchAll();
    foreach ($results as $i) {
        echo $i['nombre'].' - '.$i['cantidad'];
        echo '<br/>';
    }
    //IMPORTANTE CERRAR LA CONEXIÓN. Para esto basta con cargarse el valor de la instancia de PDO
    $pdo = null;
}catch (PDOException $e) {
        $pdo->rollBack();
        echo "No se ha podido completar la transaccion";
    }
?>