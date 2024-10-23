let contadorFila = 1;
let i = 0;
let palabra = eleccionPalabra();
console.log(palabra);

function anyadirLetra(e) {
    let valor = e.target.textContent;
    let cuadro = document.getElementById("fila" + contadorFila).querySelector("#caja" + i);

    switch (valor) {

        case 'A': case 'B': case 'C': case 'D': case 'E': case 'F': case 'G': 
        case 'H': case 'I': case 'J': case 'K': case 'L': case 'M': case 'N': 
        case 'O': case 'P': case 'Q': case 'R': case 'S': case 'T': case 'U': 
        case 'V': case 'W': case 'X': case 'Y': case 'Z': case 'Ñ':
            if (i < 5) {
                console.log(i);
                i++;
                cuadro = document.getElementById("fila" + contadorFila).querySelector("#caja" + i);
                cuadro.textContent = valor;
            }
            break;
        case '←':
            i--;
            console.log(i);
            cuadro.textContent = '';
            if (i <= 0) {
                console.log(i);
                i = 0;
            }                   
            break;
        case 'Enter':
            if (i == 5) {
                document.getElementById("fila" + contadorFila).querySelectorAll(".cajaLetra").forEach(cuadro => {
                    cuadro.style.transition = "background-color 0.4s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out";
                    cuadro.style.color = "#fff";
                    cuadro.style.borderColor = "rgb(209, 209, 209)";
                });

                let caja1 = document.getElementById("fila" + contadorFila).querySelector("#caja1").textContent;
                let caja2 = document.getElementById("fila" + contadorFila).querySelector("#caja2").textContent;
                let caja3 = document.getElementById("fila" + contadorFila).querySelector("#caja3").textContent;
                let caja4 = document.getElementById("fila" + contadorFila).querySelector("#caja4").textContent;
                let caja5 = document.getElementById("fila" + contadorFila).querySelector("#caja5").textContent;

                let caja1Entrono = document.getElementById("fila" + contadorFila).querySelector("#caja1");
                let caja2Entrono = document.getElementById("fila" + contadorFila).querySelector("#caja2");
                let caja3Entrono = document.getElementById("fila" + contadorFila).querySelector("#caja3");
                let caja4Entrono = document.getElementById("fila" + contadorFila).querySelector("#caja4");
                let caja5Entrono = document.getElementById("fila" + contadorFila).querySelector("#caja5");


                if (caja1 == palabra[0]) {
                    caja1Entrono.style.backgroundColor = "#43a047";
                }else if (caja1 == palabra[1] || caja1 == palabra[2] || caja1 == palabra[3] || caja1 == palabra[4]) {
                    caja1Entrono.style.backgroundColor = "#e4a81d";
                }else {
                    caja1Entrono.style.backgroundColor = "#757575";
                }

                if (caja2 == palabra[1]) {
                    caja2Entrono.style.backgroundColor = "#43a047";
                }else if (caja2 == palabra[0] || caja2 == palabra[2] || caja2 == palabra[3] || caja2 == palabra[4]) {
                    caja2Entrono.style.backgroundColor = "#e4a81d";
                }else { 
                    caja2Entrono.style.backgroundColor = "#757575";
                }

                if (caja3 == palabra[2]) {
                    caja3Entrono.style.backgroundColor = "#43a047";
                }else if (caja3 == palabra[1] || caja3 == palabra[0] || caja3 == palabra[3] || caja3 == palabra[4]) {
                    caja3Entrono.style.backgroundColor = "#e4a81d";
                }else {
                    caja3Entrono.style.backgroundColor = "#757575";
                }

                if (caja4 == palabra[3]) {
                    caja4Entrono.style.backgroundColor = "#43a047";
                }else if (caja4 == palabra[1] || caja4 == palabra[2] || caja4 == palabra[0] || caja4 == palabra[4]) {
                    caja4Entrono.style.backgroundColor = "#e4a81d";
                }else {
                    caja4Entrono.style.backgroundColor = "#757575";
                } 

                if (caja5 == palabra[4]) {
                    caja5Entrono.style.backgroundColor = "#43a047";
                }else if (caja5 == palabra[1] || caja5 == palabra[2] || caja5 == palabra[3] || caja5 == palabra[0]) {
                    caja5Entrono.style.backgroundColor = "#e4a81d";
                }else {
                    caja5Entrono.style.backgroundColor = "#757575";
                } 

                if (caja1 == palabra[0] && caja2 == palabra[1] && caja3 == palabra[2] && caja4 == palabra[3] && caja5 == palabra[4]) {
                    document.getElementById("resultado").innerHTML = "¡FELICIDADES! ¡HAS GANADO! <br>";
                    const botonVolver = document.createElement("button");
                    botonVolver.textContent = "Volver a jugar";
                    botonVolver.onclick = () => location.reload();
                    document.getElementById("resultado").appendChild(botonVolver);

                    document.getElementById("resultado").style.padding = "10px";
                    document.getElementById("resultado").style.paddingBottom = "40px";
                }
                contadorFila++;
                i=0;

            }else{
                document.getElementById("fila" + contadorFila).querySelectorAll(".cajaLetra").forEach(cuadro => {
                    cuadro.style.transition = "border-color 0.3s ease-in-out";
                    cuadro.style.borderColor = "red";
                });

                alert("Debes introducir 5 letras");
            }
            break;

    };
}

// Event listener
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.tecla').forEach(tecla => {
        tecla.addEventListener('click', anyadirLetra);
    });
});
