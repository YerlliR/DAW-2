<?php
/**
 * @author Student
 * Ej1UD9 - Incidencia.php
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

    private static $pendientes;


    /**
     * Constructor de la clase Incidencia
     */
    public function __construct($puesto ,$problema) {
        $this->codigo = self::$contador;
        $this->estado = "abierta";
        $this->puesto = $puesto;
        $this->problema = $problema;
        self::$pendientes++;
    }

    /**
     * Método estático para crear una nueva incidencia
     */
    public static function creaIncidencia($puesto, $problema) {
        // Generar un código único para la incidencia
        self::$contador++;
        
        // Crear la incidencia con estado "abierta"
        $incidencia = new Incidencia( $puesto, $problema);
        
        // Guardar en la base de datos
        $sql = "INSERT INTO INCIDENCIA (CODIGO, ESTADO, PUESTO, PROBLEMA, RESOLUCION) VALUES (?, ?, ?, ?, ?)";
        $parametros = [$incidencia->codigo, $incidencia->estado, $incidencia->puesto, $incidencia->problema, $incidencia->resolucion];
        
        self::queryPreparadaDB($sql, $parametros);
        
        echo "Incidencia con código {$incidencia->codigo} creada correctamente.<br>";
        
        // Mostrar la incidencia creada
        self::leeIncidencia($incidencia->codigo);
        
        return $incidencia;
    }

    /**
     * Método para resolver una incidencia
     */
    public function resuelve($resolucion) {
        $this->estado = "resuelta";
        $this->resolucion = $resolucion;
        
        // Actualizar en la base de datos
        $this->actualizaIncidencia("resuelta", $this->problema, $resolucion, $this->puesto);
        
        //ACTUALIZAR EL OBJETO

        return $this;
    }

    /**
     * Método para actualizar una incidencia
     */
    public function actualizaIncidencia($estado = "", $problema = "", $resolucion = "", $puesto = "") {
        // Si los parámetros están vacíos, mantener los valores actuales
        if (empty($estado)) $estado = $this->estado;
        if (empty($problema)) $problema = $this->problema;
        if (empty($resolucion)) $resolucion = $this->resolucion;
        if (empty($puesto)) $puesto = $this->puesto;
        
        // Actualizar propiedades del objeto
        $this->estado = $estado;
        $this->problema = $problema;
        $this->resolucion = $resolucion;
        $this->puesto = $puesto;
        
        // Actualizar en la base de datos
        $sql = "UPDATE INCIDENCIA SET ESTADO = ?, PUESTO = ?, PROBLEMA = ?, RESOLUCION = ? WHERE CODIGO = ?";
        $parametros = [$this->estado, $this->puesto, $this->problema, $this->resolucion, $this->codigo];
        
        self::queryPreparadaDB($sql, $parametros);
        
        echo "Incidencia con código {$this->codigo} modificada correctamente.<br>";
        
        // Mostrar la incidencia actualizada
        self::leeIncidencia($this->codigo);
        
        return $this;
    }

    /**
     * Método para borrar una incidencia
     */
    public function borraIncidencia() {
        $sql = "DELETE FROM INCIDENCIA WHERE CODIGO = ?";
        $parametros = [$this->codigo];
        
        self::queryPreparadaDB($sql, $parametros);
        
        echo "Incidencia con código {$this->codigo} borrada correctamente.<br>";
        
        // Mostrar todas las incidencias
        self::leeTodasIncidencias();
        
        return true;
    }

    /**
     * Método estático para leer una incidencia concreta
     */
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

    /**
     * Método estático para leer todas las incidencias
     */
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

    /**
     * Método estático para obtener el número de incidencias pendientes
     */
    public static function getPendientes() {
        $sql = "SELECT COUNT(*) as total FROM INCIDENCIA WHERE ESTADO = 'abierta'";
        
        $resultado = self::queryPreparadaDB($sql, []);
        
        return $resultado[0]['total'];
    }

    /**
     * Método para obtener el código de la incidencia
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Método para convertir la incidencia a string
     */
    public function __toString() {
        $string = "Incidencia {$this->codigo} - Puesto: {$this->puesto} - {$this->problema} - Estado: {$this->estado}";
        if (!empty($this->resolucion)) {
            $string .= " - Resolución: {$this->resolucion}";
        }
        $string .= "<br>";
        
        return $string;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */ 
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    /**
     * Get the value of puesto
     */ 
    public function getPuesto() {
        return $this->puesto;
    }

    /**
     * Set the value of puesto
     */ 
    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    /**
     * Get the value of problema
     */ 
    public function getProblema() {
        return $this->problema;
    }

    /**
     * Set the value of problema
     */ 
    public function setProblema($problema) {
        $this->problema = $problema;
    }

    /**
     * Get the value of resolucion
     */ 
    public function getResolucion() {
        return $this->resolucion;
    }

    /**
     * Set the value of resolucion
     */ 
    public function setResolucion($resolucion) {
        $this->resolucion = $resolucion;
    }
}

?>


