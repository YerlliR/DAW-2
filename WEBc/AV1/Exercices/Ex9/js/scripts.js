// scripts.js actualizado con drag and drop restaurado

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

function jugar(eleccionJugador) {
    const opciones = ["piedra", "papel", "tijera", "lagarto", "spock"];
    const eleccionMaquina = opciones[Math.floor(Math.random() * opciones.length)];

    actualizarSeleccionado("jugador", eleccionJugador);
    actualizarSeleccionado("maquina", eleccionMaquina);

    const resultado = determinarGanador(eleccionJugador, eleccionMaquina);
    actualizarMarcador(resultado);
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
        const barra = document.getElementById(ganador);
        const puntosActuales = barra.dataset.puntos ? parseInt(barra.dataset.puntos) : 0;
        const nuevosPuntos = puntosActuales + 1;
        barra.dataset.puntos = nuevosPuntos;
        barra.style.height = `${nuevosPuntos * 10}px`;
    }
}
