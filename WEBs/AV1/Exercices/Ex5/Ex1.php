
^(46|12|03)\d{3}$
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="get">
            <input type="number" name="numero1" id="numero1" >
            <select name="operador[]" id="" multiple>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="number" name="numero2" id="numero2">
            <br><br>
            <input type="submit" value="Calcular" id="enviar" name="enviar">
        </form>
        <?php

        if (isset($_GET['enviar'])) {
            $data = $_GET;
            $num1 = $data['numero1'];
            $num2 = $data['numero2'];
            for ($i = 0; $i < count($data['operador']); $i++){
                switch ($data['operador'][$i]) {
                    case '+':
                        echo $num1 . " " . $data['operador'][$i] . " " . $num2 . " = " . $num1 + $num2 . "<br>";
                        break;
                    case '-':
                        echo $num1 . " " . $data['operador'][$i] . " " . $num2 . " = " . $num1 - $num2 . "<br>";

                        break;
                    case '*':
                        echo $num1 . " " . $data['operador'][$i] . " " . $num2 . " = " . $num1 * $num2 . "<br>";

                        break;

                    case '/':
                        echo $num1 . " " . $data['operador'][$i] . " " . $num2 . " = " . $num1 / $num2 . "<br>";

                        
                        break;
                    default:
                        echo'Operador incorrecto';
                        break;
                }
            }
        }
        ?>
    </body>
</html>