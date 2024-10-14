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
    $result = $pdo->query("SELECT * FROM cuentasbancarias");

    while ($row = $result->fetch()) {
        // Imprime cada resultado
        echo $row["id"] . " - " . $row["nombre"] .  " - " . $row["cantidad"] . "<br>";
    }

    /*
        Vamos a hacer una transferencia de dinero. Para ello tendremos que quitarle a id=1 uno el dinero que le va a pasar a id=2.
        Pero si falla el segundo update, emosido engañado
    */

    //Para eso, primero iniciamos una transaccion
    $pdo->beginTransaction();

    // Realiza una operación en la base de datos
    $pdo->query("UPDATE cuentasbancarias SET cantidad = cantidad - 100 WHERE id = 1");

    // Realiza otra operación en la base de datos
    $pdo->query("UPDATE cuentasbancarias SET cantidad = cantidad + 100 WHERE id = 2");

    // Confirma la transacción
    $pdo->commit();

    $result = $pdo->query("SELECT * FROM cuentasbancarias");

    while ($row = $result->fetch()) {
        // Imprime cada resultado
        echo $row["id"] . " - " . $row["nombre"] .  " - " . $row["cantidad"] . "<br>";
    }
    //IMPORTANTE CERRAR LA CONEXIÓN. Para esto basta con cargarse el valor de la instancia de PDO
    $pdo = null;
} catch (PDOException $e) {
        $pdo->rollBack();
        echo "No se ha podido completar la transaccion";
    }
?>