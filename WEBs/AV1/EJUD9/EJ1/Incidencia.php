<?php
/**
 * @author Sergio Ricart
 */
require_once "../traitDB.php";

class Incidencia {
    use traitDB;

    private $codigo;
    private $estado;
    private $puesto;
    private $problema;
    private $resolucion;
    private static $contador = 0;

    private static $pendientes = 0;


    public function __construct($puesto ,$problema) {
        $this->codigo = self::$contador;
        $this->estado = "abierta";
        $this->puesto = $puesto;
        $this->problema = $problema;
        self::$pendientes++;
    }

    public static function creaIncidencia($puesto, $problema) {
        self::$contador++;
        
        $incidencia = new Incidencia($puesto, $problema);
        
        $sql = "INSERT INTO INCIDENCIA (CODIGO, ESTADO, PUESTO, PROBLEMA, RESOLUCION) VALUES (?, ?, ?, ?, ?)";
        $parametros = [$incidencia->codigo, $incidencia->estado, $incidencia->puesto, $incidencia->problema, $incidencia->resolucion];
        
        self::queryPreparadaDB($sql, $parametros);
        
        echo "Incidencia con código {$incidencia->codigo} creada correctamente.<br>";
        
        self::leeIncidencia($incidencia->codigo);
        
        return $incidencia;
    }

    public function resuelve($resolucion) {
        if ($this->estado === "abierta") {
            self::$pendientes--;
        }
        
        $this->estado = "resuelta";
        $this->resolucion = $resolucion;
        
        $this->actualizaIncidencia("resuelta", $this->problema, $resolucion, $this->puesto);
        
        return $this;
    }

    public function actualizaIncidencia($estado = "", $problema = "", $resolucion = "", $puesto = "") {
        $cambioEstado = ($this->estado === "abierta" && !empty($estado) && $estado !== "abierta");
        
        if (empty($estado)) $estado = $this->estado;
        if (empty($problema)) $problema = $this->problema;
        if (empty($resolucion)) $resolucion = $this->resolucion;
        if (empty($puesto)) $puesto = $this->puesto;
        
        $this->estado = $estado;
        $this->problema = $problema;
        $this->resolucion = $resolucion;
        $this->puesto = $puesto;
        
        if ($cambioEstado) {
            self::$pendientes--;
        }
        
        $sql = "UPDATE INCIDENCIA SET ESTADO = ?, PUESTO = ?, PROBLEMA = ?, RESOLUCION = ? WHERE CODIGO = ?";
        $parametros = [$this->estado, $this->puesto, $this->problema, $this->resolucion, $this->codigo];
        
        self::queryPreparadaDB($sql, $parametros);
        
        echo "Incidencia con código {$this->codigo} modificada correctamente.<br>";
        
        self::leeIncidencia($this->codigo);
        
        return $this;
    }


    public function borraIncidencia() {
        if ($this->estado === "abierta") {
            self::$pendientes--;
        }
        
        $sql = "DELETE FROM INCIDENCIA WHERE CODIGO = ?";
        $parametros = [$this->codigo];
        
        self::queryPreparadaDB($sql, $parametros);
        
        echo "Incidencia con código {$this->codigo} borrada correctamente.<br>";
        
        self::leeTodasIncidencias();
        
        return true;
    }


    public static function leeIncidencia($codigo) {
        $sql = "SELECT * FROM INCIDENCIA WHERE CODIGO = ?";
        $parametros = [$codigo];
        
        $resultado = self::queryPreparadaDB($sql, $parametros);
        
        if (count($resultado) > 0) {
            $incidencia = $resultado[0];
            echo "Incidencia {$incidencia['CODIGO']}: {$incidencia['PROBLEMA']} - Estado: {$incidencia['ESTADO']}";
            if (!empty($incidencia['RESOLUCION'])) {
                echo " - Resolución: {$incidencia['RESOLUCION']}";
            }
            echo "<br>";
        } else {
            echo "No se encontró ninguna incidencia con el código $codigo.<br>";
        }
    }

    public static function leeTodasIncidencias() {
        $sql = "SELECT * FROM INCIDENCIA";
        
        $resultado = self::queryPreparadaDB($sql, []);
        
        echo "Lista de todas las incidencias:<br>";
        if (count($resultado) > 0) {
            foreach ($resultado as $incidencia) {
                echo "Incidencia {$incidencia['CODIGO']}: {$incidencia['PROBLEMA']} - Estado: {$incidencia['ESTADO']}";
                if (!empty($incidencia['RESOLUCION'])) {
                    echo " - Resolución: {$incidencia['RESOLUCION']}";
                }
                echo "<br>";
            }
        } else {
            echo "No hay incidencias registradas.<br>";
        }
    }

    public static function getPendientes() {
        return self::$pendientes;
    }


    public function getCodigo() {
        return $this->codigo;
    }

    public function __toString() {
        $string = "Incidencia {$this->codigo} - Puesto: {$this->puesto} - {$this->problema} - Estado: {$this->estado}";
        if (!empty($this->resolucion)) {
            $string .= " - Resolución: {$this->resolucion}";
        }
        $string .= "<br>";
        
        return $string;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        if ($this->estado === "abierta" && $estado !== "abierta") {
            self::$pendientes--;
        }
        else if ($this->estado !== "abierta" && $estado === "abierta") {
            self::$pendientes++;
        }
        
        $this->estado = $estado;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    public function getProblema() {
        return $this->problema;
    }

    public function setProblema($problema) {
        $this->problema = $problema;
    }


    public function getResolucion() {
        return $this->resolucion;
    }

    public function setResolucion($resolucion) {
        $this->resolucion = $resolucion;
    }
}
?>
