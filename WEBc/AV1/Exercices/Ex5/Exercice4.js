function verficacionFormulario() {
    if (verificacionEmail() && verificacionDni()) {
        crearFrase();
    } else {
        alert("Alguna cadena de texto no es válida");
    }
}

function verificacionEmail() {
    let correo = document.getElementById('email').value;
    const restricciones = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    document.getElementById('email').style.borderColor = '';

    let validacion = restricciones.test(correo);
    if (validacion) {
        return true;
    } else {
        document.getElementById('email').style.borderColor = 'red';
        document.getElementById('email').value = '';
        return false;
    }
}

function verificacionDni() {
    let dni = document.getElementById('dni').value;
    const letras = [
        'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B',
        'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'
    ];
    document.getElementById('dni').style.borderColor = '';

    if (dni.length !== 9) {
        document.getElementById('dni').style.borderColor = 'red';
        document.getElementById('dni').value = '';
        return false;
    } else {
        let array = dni.split('');
        const letra = dni[array.length - 1].toUpperCase();
        array.pop();
        let numeroFinal = array.join('');
        numeroFinal = parseInt(numeroFinal) % 23;
        if (letras[numeroFinal] === letra) {
            return true;
        } else {
            document.getElementById('dni').style.borderColor = 'red';
            document.getElementById('dni').value = '';
            return false;
        }
    }
}

function crearFrase() {
    const nombre = document.getElementById('nombre').value;
    const dni = document.getElementById('dni').value;
    const email = document.getElementById('email').value;
    const eleccion = document.getElementById('listado').value;
    const frase = document.createElement('p');
    frase.textContent = nombre + " con DNI " + dni + " e e-mail " + email;

    // Añadimos el event listener al nuevo elemento
    frase.addEventListener('dblclick', moverElemento);

    if (eleccion === "lista1") {
        document.getElementById('frases').appendChild(frase);
    } else if (eleccion === "lista2") {
        document.getElementById('frases2').appendChild(frase);
    } else if (eleccion === "lista3") {
        document.getElementById('frases3').appendChild(frase);
    } else {
        document.getElementById('frases4').appendChild(frase);
    }
}

function moverElemento(event) {
    const elemento = event.target;
    const nuevaLista = document.getElementById('listado').value;

    if (nuevaLista === "lista1") {
        document.getElementById('frases').appendChild(elemento);
    } else if (nuevaLista === "lista2") {
        document.getElementById('frases2').appendChild(elemento);
    } else if (nuevaLista === "lista3") {
        document.getElementById('frases3').appendChild(elemento);
    } else {
        document.getElementById('frases4').appendChild(elemento);
    }
}

document.querySelectorAll('#frases p, #frases2 p, #frases3 p, #frases4 p').forEach(function(elemento) {
    elemento.addEventListener('dblclick', moverElemento);
});