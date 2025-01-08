window.onload = function () {
    let eleccion = document.querySelectorAll("img");
    for (let i = 0; i < eleccion.length; i++) {
        eleccion[i].addEventListener("dragstart", drag);
        eleccion[i].addEventListener("click", () => jugar(eleccion[i].id));
    }

    let zonasDrop = document.querySelectorAll(".item, #seleccionado, #enemigo");
    zonasDrop.forEach((zona) => {
        zona.addEventListener("dragover", allowDrop);
        zona.addEventListener("drop", drop);
    });

    document.getElementById("reiniciar").addEventListener("click", reiniciarJuego);
};

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("id", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    const idElement = ev.dataTransfer.getData("id");
    jugar(idElement);
}

let puntosJugador = 0;
let puntosMaquina = 0;

function jugar(eleccionJugador) {
    const opciones = ["piedra", "papel", "tijera", "lagarto", "spock"];
    const eleccionMaquina = opciones[Math.floor(Math.random() * opciones.length)];

    actualizarSeleccionado("jugador", eleccionJugador);
    actualizarSeleccionado("maquina", eleccionMaquina);

    // Mostrar ventana de cargando
    document.getElementById("cargando").style.display = "block";

    // Agregar un retraso de 2 segundos antes de determinar el ganador
    setTimeout(() => {
        const resultado = determinarGanador(eleccionJugador, eleccionMaquina);
        actualizarMarcador(resultado);

        // Ocultar ventana de cargando
        document.getElementById("cargando").style.display = "none";

        if (puntosJugador === 3 || puntosMaquina === 3) {
            mostrarGanador();
        }
    }, 2000);
}

function actualizarSeleccionado(tipo, eleccion) {
    const contenedor = document.getElementById(tipo === "jugador" ? "seleccionado" : "enemigo");
    contenedor.innerHTML = `<img src='img/${eleccion}.png' alt='${eleccion}'>`;
}

function determinarGanador(jugador, maquina) {
    const reglas = {
        piedra: ["tijera", "lagarto"],
        papel: ["piedra", "spock"],
        tijera: ["papel", "lagarto"],
        lagarto: ["papel", "spock"],
        spock: ["tijera", "piedra"],
    };

    if (jugador === maquina) return "empate";
    return reglas[jugador].includes(maquina) ? "jugador" : "maquina";
}

function actualizarMarcador(ganador) {
    if (ganador !== "empate") {
        const barra = document.querySelector(`#${ganador} .punto`);
        const puntosActuales = barra.dataset.puntos ? parseInt(barra.dataset.puntos) : 0;
        const nuevosPuntos = puntosActuales + 1;
        barra.dataset.puntos = nuevosPuntos;
        barra.style.height = `${nuevosPuntos * 100}px`; // Ajustar la altura según el número de puntos

        if (ganador === "jugador") {
            puntosJugador++;
        } else {
            puntosMaquina++;
        }
    }
}

function mostrarGanador() {
    const mensaje = document.getElementById("mensaje-ganador");
    const texto = document.getElementById("mensaje-texto");

    if (puntosJugador === 3) {
        texto.textContent = "¡Jugador gana!";
    } else {
        texto.textContent = "¡Máquina gana!";
    }

    mensaje.style.display = "block";
}

function reiniciarJuego() {
    puntosJugador = 0;
    puntosMaquina = 0;

    document.querySelector("#jugador .punto").style.height = "0px";
    document.querySelector("#maquina .punto").style.height = "0px";

    document.querySelector("#jugador .punto").dataset.puntos = "0";
    document.querySelector("#maquina .punto").dataset.puntos = "0";

    document.getElementById("mensaje-ganador").style.display = "none";
}