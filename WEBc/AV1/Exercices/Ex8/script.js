let eleccion = "";
let contador = new URLSearchParams(window.location.search).get("cantPelotas");

// MODO DE JUEGO
document.addEventListener("DOMContentLoaded", function() {
    const botonesModoJuego = document.getElementsByClassName("modoJuego");
    for (let boton of botonesModoJuego) {
        boton.addEventListener("click", function(event) {
            const target = event.target;
            if (target.id === "todas") {
                target.style.backgroundColor = "rgb(124, 0, 0)";
                document.getElementById("soloColor").style.backgroundColor = "red";
                eleccion = "todas";
            } else if (target.id === "soloColor") {
                target.style.backgroundColor = "rgb(124, 0, 0)";
                document.getElementById("todas").style.backgroundColor = "red";
                eleccion = "soloColor";
            }
            // Guardamos eleccion en sessionStorage
            sessionStorage.setItem("modoJuego", eleccion);
        });
    }

    const jugar = document.getElementById("jugar");
    jugar.addEventListener("click", function() {
        let cantidadPelotas = document.getElementById("pelotas").value;
        // Redirigir a juego.html con la cantidad de pelotas
        window.location.href = "juego.html?cantPelotas=" + cantidadPelotas;
    });
});

let segundos = 0;
let minutos = 0;

function iniciarTemporizador() {
    setInterval(() => {
        segundos++;
        if (segundos === 60) {
            segundos = 0;
            minutos++;
        }
        const tiempoTexto = `${minutos < 10 ? '0' : ''}${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
        document.getElementById("tiempo").textContent = tiempoTexto;
    }, 1000); // Actualización cada segundo
}

// Recuperar eleccion al cargar juego.html
document.addEventListener("DOMContentLoaded", function() {
    eleccion = sessionStorage.getItem("modoJuego"); // Recuperar eleccion guardada
    const panelJuego = document.getElementById("panelJuego");
    let colores = ["azul", "roja", "verde", "amarillo"];

    if (eleccion === "todas") {
        for (let i = 0; i < contador; i++) {
            const img = document.createElement("img");
            img.src = "imgs/" + colores[Math.floor(Math.random() * 4)] + ".png";
            img.className = "pelota";
            img.style.left = Math.random() * 71 + "rem";
            img.style.top = Math.random() * 22 + "rem"; 
            let tamanyo = Math.random() * 250 + 20;
            img.style.height = tamanyo + "px";
            img.style.width = tamanyo + "px"; 
            panelJuego.appendChild(img);
        }
    } else if (eleccion === "soloColor") {
        for (let i = 0; i < contador; i++) {
            const img = document.createElement("img");
            img.src = "imgs/roja.png";
            img.className = "pelota";
            img.style.left = Math.random() * 71 + "rem";
            img.style.top = Math.random() * 22 + "rem"; 
            let tamanyo = Math.random() * 250 + 20;
            img.style.height = tamanyo + "px";
            img.style.width = tamanyo + "px"; 
            panelJuego.appendChild(img);
        }
    }
    iniciarTemporizador();
});

document.addEventListener("DOMContentLoaded", function() {
    let pelotas = document.getElementsByClassName("pelota");
    let panelJuego = document.getElementById("panelJuego");

    panelJuego.addEventListener("click", function(event) {
        document.getElementById("rojo").textContent = parseInt(document.getElementById("rojo").textContent) + 1;
    });
    for (let pelota of pelotas) {
        pelota.addEventListener("click", function() {
            pelota.style.display = "none";
            document.getElementById("azul").textContent = parseInt(document.getElementById("azul").textContent) + 1;

            if (document.getElementById("rojo").textContent <= 0) {
                document.getElementById("rojo").textContent = 0;
            } else if (document.getElementById("rojo").textContent > 0) {
                document.getElementById("rojo").textContent = parseInt(document.getElementById("rojo").textContent) - 1;
            }

            if (parseInt(document.getElementById("azul").textContent) === parseInt(contador)) {
                document.getElementById("customAlert").style.display = "flex";
                alertMessage.textContent = "Has ganado, has tardado: " + document.getElementById("tiempo").textContent;
            }
        });
    }
});
