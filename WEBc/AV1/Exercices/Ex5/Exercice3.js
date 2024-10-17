function verficacionFormulario(){
    if (verificacionEmail() && verificacionDni()){
        crearFrase()
    }else{
        alert("Alguna cadena de texto no es valida")
    }

}

function verificacionEmail(){
    let correo = document.getElementById('email').value

    const restricciones = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    document.getElementById('email').style.borderColor = '';

    let validacion = restricciones.test(correo)
    if(validacion){
        return true
    }else {
        document.getElementById('email').style.borderColor = 'red';

        document.getElementById('email').value = ''
        return false
    }
}

function verificacionDni(){

    let dni = document.getElementById('dni').value
    const letras = [
                    'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B',
                    'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'
                  ];
    document.getElementById('dni').style.borderColor = '';

    if (dni.length !== 9){
        document.getElementById('dni').style.borderColor = 'red';
        document.getElementById('dni').value = ''
        return false
    }else{
        let array = dni.split('');
        const letra = dni[array.length - 1].toUpperCase();
        array.pop()
        let numeroFinal = array.join('')
        console.log(typeof(numeroFinal))
        console.log(numeroFinal)
        numeroFinal = parseInt(numeroFinal)
        console.log(numeroFinal)
        console.log(typeof(numeroFinal))

        numeroFinal = numeroFinal % 23
        if (letra === letras[numeroFinal]){
            return true
        }else {
            document.getElementById('dni').style.borderColor = 'red';
            document.getElementById('dni').value = ''
            return false
        }
    }
}

function crearFrase(){
    const nombre = document.getElementById('nombre').value;
    const dni = document.getElementById('dni').value;
    const email = document.getElementById('email').value;
    const eleccion = document.getElementById('listado').value;

    const frase = document.createElement('p');
    frase.textContent = nombre + " con DNI " + dni + " e e-mail " + email;


    if (eleccion === "lista1"){
        document.getElementById('frases').appendChild(frase);

    }else {
        document.getElementById('frases2').appendChild(frase);

    }
    // Creamos un nuevo párrafo y lo agregamos al contenedor de frases

}

