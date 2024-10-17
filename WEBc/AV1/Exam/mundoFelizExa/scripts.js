// verificacion de que el numero es feliz
function esFeliz(posibilidad){
            let numero = parseInt(posibilidad);
            var conseguido = false
            var numerosArray = []


            for ( var x = 0; x < 8; x++){
                numerosArray = numero.toString().split('').map(Number);
                for (var i = 0; i < numerosArray.length; i++){
                    numerosArray[i] = numerosArray[i] * numerosArray[i]

                }
                numero = 0

                for (var y = 0; y < numerosArray.length; y++){
                    numerosArray = numerosArray.map(Number)

                    numero = numerosArray[y] + numero
                }

                if (numero == 1){
                    conseguido = true
                }
            }


            if (conseguido){
                return true

            }else {
                return false
            }
}


// guarrada para saber cuantas vueltas ha pegado el programa para saber si es feliz el numero
function nuemeroVueltas(posibilidad){
            let numero = parseInt(posibilidad);
            var conseguido = false
            var numerosArray = []
            let magia


            for ( var x = 0; x < 8; x++){
                numerosArray = numero.toString().split('').map(Number);
                for (var i = 0; i < numerosArray.length; i++){
                    numerosArray[i] = numerosArray[i] * numerosArray[i]

                }
                numero = 0

                for (var y = 0; y < numerosArray.length; y++){
                    numerosArray = numerosArray.map(Number)

                    numero = numerosArray[y] + numero
                }

                if (numero == 1){
                    return x
                }

            }
}




function inicial(){
// eliminar los elementos existentes para cuadno cambies los parametros del formulario no se almacenen
    let numerosContentos = document.getElementsByClassName('numeroFeliz')
    for (let i = 0 ; i < numerosContentos.length; i++){
        numerosContentos[i].innerHTML = ''
    }

//guardar elementos basicos
    let inicial = parseInt(document.getElementById('numeroInicio').value)
    let numerosAEncontrar = parseInt(document.getElementById('numeroVueltas').value)
    let contador = 0
    let control = true


    while (control){
        if (esFeliz(inicial)){

            contador++
            let numero = document.createElement('p');
            numero.textContent = inicial;
            numero.classList.add("numeroFeliz")
            numero.addEventListener("click", function (e){
                document.getElementById("juan").innerHTML = inicial
            })
            document.getElementById('espacioNumeros').appendChild(numero);

            let vueltas = document.createElement('p');
            vueltas.textContent = nuemeroVueltas(inicial);
            vueltas.classList.add("numeroFeliz")
            document.getElementById('espacioVueltas').appendChild(vueltas);
            if (contador === numerosAEncontrar){
                control = false
            }
        }
        inicial++
    }
}





