let operacion = '';
let pantalla = document.querySelector('.pantalla input');

// funcion para actualizar la pantalla
function actualizarPantalla(valor) {
    if (pantalla.value === '0' && valor !== '.') {
        pantalla.value = valor;
    } else {
        pantalla.value += valor;
    }
}

function calcular() {
    // he puesto el try catch para que no de error si la operacion no se puede hacer basicamente (Dilema de principio de curso, js es incapaz de realizar operaciones con decimales mayores de x numero de cifras) 
    try {
        operacion = pantalla.value.replace(/x/g, '*');
        let resultado = eval(operacion);
        pantalla.value = resultado;
    } catch (error) {
        pantalla.value = 'Error';
    }
}


// funcion con case con el valor guardado del event listener para actuar en cada caso
function manejarBoton(e) {
    const valor = e.target.textContent;

    switch (valor) {
        case 'C':
            // si es C limipar pantalla 
            pantalla.value = '0';
            break;
        case '=':
            // si es igual lanzar la funcion calcular que calcula lo que hay en pantalla, si no esta bien lanza un error 
            calcular();
            break;
        case '«':
            // para borrar el ultimo valor
            pantalla.value = pantalla.value.slice(0, -1);
            if (pantalla.value === '') pantalla.value = '0';
            break;
        case '/':
        case 'x':
        case '+':
        case '-':
        case '%':
        case '.':
            // para agregar las operaciones a la pantalla
            actualizarPantalla(valor);
            break;
        case '()':
            // agregar parentesis al principio y al final sobrescribo el valor de la pantalla añadiendo los parentesis
            pantalla.value = `(${pantalla.value})`;
            break;
        default:
            // por defecto son los numeros que se añaden a la pantalla
            actualizarPantalla(valor);
            break;
    }
}

//event listener 
document.querySelectorAll('.boton').forEach(boton => {
    boton.addEventListener('click', manejarBoton);
});
