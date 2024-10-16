
let i = 1;


function verificarTamanyo() {
}


function verificar() {
    console.log("verificar");
}


function anyadirLetra(e) {
    let valor = e.target.textContent;
    let cuadro = document.getElementById("caja" + i);
    if (i == 6 || i == 11 || i == 16 || i == 21 || i == 26 || i == 31) {
        valor = 'Enter';

    }

    switch (valor) {
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
        case 'Ñ':
            i++;
            cuadro.textContent = valor;
            break;
        case '←':
            i--;
            if (i > 1) {
                cuadro = document.getElementById("caja" + i);
                cuadro.textContent = "";
            }else{
                cuadro.textContent = "";
            }

            break;
        case 'Enter':
            if (i == 6 || i == 11 || i == 16 || i == 21 || i == 26 || i == 31) {
                document.querySelectorAll(".cajaLetra").forEach(cuadro => {
                    cuadro.style.transition = "border-color 0.3s ease-in-out";
                    cuadro.style.borderColor = "rgb(209, 209, 209)";
                });
                verificar();
            } else {
                const idFila = `fila${Math.ceil(i / 5)}`;
                document.getElementById(idFila).querySelectorAll(".cajaLetra").forEach(cuadro => {
                    cuadro.style.transition = "border-color 0.3s ease-in-out";
                    cuadro.style.borderColor = "red";
                });
            }

            i++
            break;

    };
}

/*
function añadirLetraTeclado(e) {
    const valor = e.key.toUpperCase();
    let cuadro = document.getElementById("caja" + i);

    switch (valor) {
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
        case 'Ñ':
            i++;
            cuadro.textContent = valor;
            break;
        case "BACKSPACE":
            i--;
            if (i > 1) {
                cuadro = document.getElementById("caja" + i);
                cuadro.textContent = "";
            }else{
                cuadro.textContent = "";
            }


            break;
        case "ENTER":
            verificarTamanyo(i);
            break;

    };
}


*/

//event listener 
document.addEventListener('DOMContentLoaded', () => {
    // Aquí coloca tu código para agregar el event listener
    document.querySelectorAll('.tecla').forEach(tecla => {
        tecla.addEventListener('click', anyadirLetra);
    });
    //document.addEventListener('keydown', añadirLetraTeclado)

});

