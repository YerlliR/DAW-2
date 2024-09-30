function verificacionEmail(){
    let correo = document.getElementById('email').value

    const restricciones = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    document.getElementById('email').style.borderColor = '';

    let validacion = restricciones.test(correo)
    if(validacion){
        console.log("El correo es correcto")
    }else {
        alert("El correo no es correcto")
        document.getElementById('email').style.borderColor = 'red';

        document.getElementById('email').value = ''
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
        alert("EL DNI NO ES CORRECTO")
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
            console.log("El DNI ES CORRECTO")
        }else {
            alert("EL DNI NO ES CORRECTO")
            document.getElementById('dni').style.borderColor = 'red';
            document.getElementById('dni').value = ''

        }
    }
}
function verificacionContrasenya(){
    let contrasenya = document.getElementById('password').value

    const tieneMayusculas = /[A-Z]/.test(contrasenya);
    const tieneNumeros = /[0-9]/.test(contrasenya);
    const tieneSimbolos = /[-!@#$%^&*(),.?":{}|<>]/.test(contrasenya);
    document.getElementById('ip').style.borderColor = '';

    if (tieneMayusculas && tieneNumeros && tieneSimbolos && contrasenya.length >= 8) {
        console.log("Contraseña valida")
        return contrasenya

    } else {
        alert("La contraseña debe contener mas de 5 catracteres, MAYUSCULAS, $¡MBº|º$ y num3r02")
        document.getElementById('password').style.borderColor = 'red';
        document.getElementById('password').value = ''

    }

}
function verificarRepeticionDeContrasenya(){
    let repeticion = document.getElementById('repeat-password').value
    let contrasenya = verificacionContrasenya()
    document.getElementById('ip').style.borderColor = '';

    if (repeticion == contrasenya){
        console.log("contraseña correcta")
    }else {
        alert("Contraseña no coincide")
        document.getElementById('repeat-password').style.borderColor = 'red';
        document.getElementById('repeat-password').value = ''

    }

}
function verificacionIp(){
    let ip = document.getElementById('ip').value

    const partes = ip.split('.');
    document.getElementById('ip').style.borderColor = '';

    if (partes.length !== 4) {
        alert("La ip no es valida")
        document.getElementById('ip').value = ''
        document.getElementById('ip').style.borderColor = 'red';

    }

    for (let i = 0; i < partes.length; i++) {
        const numero = parseInt(partes[i]);

        if (isNaN(numero) || numero < 0 || numero > 255) {
            alert("La ip no es valida")
            document.getElementById('ip').value = ''
            document.getElementById('ip').style.borderColor = 'red';
        }
    }
}