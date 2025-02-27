<?php

require_once "db.php";
trait traitDB
{
    public static function connectDB()
    {
        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=INCIDENCIAS", USERNAME, PASSWORD);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        //devuelve la conexion creada
        return $conn;
    }

    public function execDB($sql)
    {
        $conn = self::connectDB();
        $filas = $conn->exec($sql);
        return $filas;
    }

    public static function queryPreparadaDB($sql, $parametros)
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare($sql);
        $stmt->execute($parametros);
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function resetearBD()
    {
        $conn = self::connectDB();
        $sql = "USE INCIDENCIAS";
        $conn->exec($sql);
        $sql = "DELETE FROM INCIDENCIA";
        $conn->exec($sql);
        // $sql = "DROP TABLE INCIDENCIA IF EXISTS";
        // $conn->exec($sql);
        // $sql = "CREATE TABLE INCIDENCIA (
        //     CODIGO INTEGER,
        //     ESTADO VARCHAR (100) NOT NULL,
        //     PUESTO VARCHAR (15),
        //     PROBLEMA VARCHAR(255),
        //     RESOLUCION VARCHAR(255),
        //     CONSTRAINT PK_CODIGO PRIMARY KEY(CODIGO)
        // )";
        // $conn->exec($sql);
    }
}
?>