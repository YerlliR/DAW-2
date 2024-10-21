let contadorFila = 1;
let i = 0;
let palabra = eleccionPalabra();
console.log(palabra);

function anyadirLetra(e) {
    let valor = e.target.textContent;
    let cuadro = document.getElementById("fila" + contadorFila).querySelector("#caja" + (i + 1)); // Cambiado a (i + 1)

    switch (valor) {
        case 'A': case 'B': case 'C': case 'D': case 'E': case 'F': case 'G':
        case 'H': case 'I': case 'J': case 'K': case 'L': case 'M': case 'N':
        case 'O': case 'P': case 'Q': case 'R': case 'S': case 'T': case 'U':
        case 'V': case 'W': case 'X': case 'Y': case 'Z': case 'Ñ':
            if (i < 5) {
                cuadro.textContent = valor;
                i++;
            }
            break;
        case '←':
            if (i > 0) {
                i--;
                cuadro.textContent = '';
                cuadro = document.getElementById("fila" + contadorFila).querySelector("#caja" + (i + 1)); // Ajustar el cuadro
            }
            break;
        case 'Enter':
            if (i === 5) {
                document.getElementById("fila" + contadorFila).querySelectorAll(".cajaLetra").forEach(cuadro => {
                    cuadro.style.transition = "background-color 0.4s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out";
                    cuadro.style.color = "#fff";
                });

                const letras = Array.from(document.getElementById("fila" + contadorFila).querySelectorAll(".cajaLetra")).map(cuadro => cuadro.textContent);

                let todasCorrectas = true; // Inicializa la variable

                letras.forEach((letra, index) => {
                    const cajaEntrono = document.getElementById("fila" + contadorFila).querySelector(`#caja${index + 1}`);
                    if (letra === palabra[index]) {
                        cajaEntrono.style.backgroundColor = "#43a047"; // Correcto
                    } else if (palabra.includes(letra)) {
                        cajaEntrono.style.backgroundColor = "#e4a81d"; // Incorrecto pero en la palabra
                        todasCorrectas = false; // No todas son correctas
                    } else {
                        cajaEntrono.style.backgroundColor = "#757575"; // Incorrecto
                        todasCorrectas = false; // No todas son correctas
                    }
                });

                if (todasCorrectas) {
                    setTimeout(() => {
                        alert("¡Victoria! Has adivinado la palabra.");
                    }, 700);
                }

                contadorFila++;
                i = 0;

            } else {
                document.getElementById("fila" + contadorFila).querySelectorAll(".cajaLetra").forEach(cuadro => {
                    cuadro.style.transition = "border-color 0.3s ease-in-out";
                    cuadro.style.borderColor = "red";
                });
                alert("Debes introducir 5 letras");
            }
            break;
    }
}

// Event listener
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.tecla').forEach(tecla => {
        tecla.addEventListener('click', anyadirLetra);
    });
});
