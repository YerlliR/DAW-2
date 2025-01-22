let contadorFila = 1;
let i = 0;
let palabra = "";
let palabraUsuario = "";

async function iniciarJuego() {
    palabra = await eleccionPalabra();
    
    if (!palabra) {
        alert('No se pudo cargar una palabra aleatoria. Intenta nuevamente.');
        return;
    }

    console.log(palabra);
}

async function eleccionPalabra() {
    var url = `https://random-word-api.herokuapp.com/word?lang=es`;

    let intentos = 0;
    try {
        while (intentos < 10) {
            var response = await fetch(url);
            var data = await response.json();

            if (data[0].length === 5) {
                return data[0].toUpperCase();
            }

            intentos++;
        }

        throw new Error('No se encontró una palabra de 5 letras.');
        
    } catch (error) {
        console.log(error);
        return null;
    }
};

async function palabraExistente(palabra) {
    var url = `https://rae-api.com/api/words/${palabra}`;
    console.log(palabra);
    try {
        const response = await fetch(url);
        const data = await response.json();
        console.log(data.ok);
        return data.ok;

    } catch (error) {
        console.log("Error al verificar la palabra:", error);
        return false;
    }
}

async function anyadirLetra(e) {
    let valor = e.target.textContent;
    let cuadro = document.getElementById("fila" + contadorFila).querySelector("#caja" + i);

    switch (valor) {

        case 'A': case 'B': case 'C': case 'D': case 'E': case 'F': case 'G': 
        case 'H': case 'I': case 'J': case 'K': case 'L': case 'M': case 'N': 
        case 'O': case 'P': case 'Q': case 'R': case 'S': case 'T': case 'U': 
        case 'V': case 'W': case 'X': case 'Y': case 'Z': case 'Ñ':
            if (i < 5) {
                i++;
                cuadro = document.getElementById("fila" + contadorFila).querySelector("#caja" + i);
                cuadro.textContent = valor;
            }
            break;

        case '←':
            i--;
            cuadro.textContent = '';
            if (i <= 0) {
                i = 0;
            }                   
            break;

        case 'Enter':
            let caja1 = document.getElementById("fila" + contadorFila).querySelector("#caja1").textContent;
            let caja2 = document.getElementById("fila" + contadorFila).querySelector("#caja2").textContent;
            let caja3 = document.getElementById("fila" + contadorFila).querySelector("#caja3").textContent;
            let caja4 = document.getElementById("fila" + contadorFila).querySelector("#caja4").textContent;
            let caja5 = document.getElementById("fila" + contadorFila).querySelector("#caja5").textContent;

            palabraUsuario = caja1 + caja2 + caja3 + caja4 + caja5;

            if (i === 5) {
                const existe = await palabraExistente(palabraUsuario);

                if (existe) {
                    document.getElementById("fila" + contadorFila).querySelectorAll(".cajaLetra").forEach(cuadro => {
                        cuadro.style.transition = "background-color 0.4s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out";
                        cuadro.style.color = "#fff";
                        cuadro.style.borderColor = "rgb(209, 209, 209)";
                    });

                    for (let j = 0; j < 5; j++) {
                        let caja = document.getElementById("fila" + contadorFila).querySelector("#caja" + (j + 1));
                        if (palabra[j] === palabraUsuario[j]) {
                            caja.style.backgroundColor = "#43a047";
                        } else if (palabra.includes(palabraUsuario[j])) {
                            caja.style.backgroundColor = "#e4a81d";
                        } else {
                            caja.style.backgroundColor = "#757575";
                        }
                    }

                    if (palabra === palabraUsuario) {
                        document.getElementById("resultado").innerHTML = "¡FELICIDADES! ¡HAS GANADO! <br>";
                        const botonVolver = document.createElement("button");
                        botonVolver.textContent = "Volver a jugar";
                        botonVolver.onclick = () => location.reload();
                        document.getElementById("resultado").appendChild(botonVolver);

                        document.getElementById("resultado").style.padding = "10px";
                        document.getElementById("resultado").style.paddingBottom = "40px";
                    }
                    contadorFila++;
                    i = 0;
                } else {
                    alert("La palabra no existe");
                }
            } else {
                alert("Debes introducir 5 letras");
            }
            break;
    };
}

document.addEventListener('DOMContentLoaded', async () => {
    await iniciarJuego();
    document.querySelectorAll('.tecla').forEach(tecla => {
        tecla.addEventListener('click', anyadirLetra);
    });
});
