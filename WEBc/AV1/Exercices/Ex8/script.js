let eleccion = "";

//MODO DE JUEGO
document.addEventListener("DOMContentLoaded", function() {
    const botonesModoJuego = document.getElementsByClassName("modoJuego");
    for (let boton of botonesModoJuego) {
        boton.addEventListener("click", function(event) {
            const target = event.target;
            if (target.id === "todas") {
                target.style.backgroundColor = "rgb(124, 0, 0)";
                document.getElementById("soloColor").style.backgroundColor = "red";
                eleccion = "todas";
            }
            else if (target.id === "soloColor") {
                target.style.backgroundColor = "rgb(124, 0, 0)";
                document.getElementById("todas").style.backgroundColor = "red";
                eleccion = "soloColor";
            }
        });
    }
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
        console.log(segundos);
        // Formateo de tiempo
        const tiempoTexto = `${minutos < 10 ? '0' : ''}${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;

        if (minutos < 10 && segundos < 10) {
            document.getElementById("tiempo").textContent = "0" + minutos + ":0" + segundos;
        }else if (minutos < 10) {
            document.getElementById("tiempo").textContent = "0" + minutos + ":" + segundos;
        }else if (segundos < 10) {
            document.getElementById("tiempo").textContent = minutos + ":0" + segundos;
        }else {
            document.getElementById("tiempo").textContent = minutos + ":" + segundos;
        }
        
        // Actualización del HTML
        document.getElementById("tiempo").textContent = tiempoTexto;
    }, 1000); // Actualización cada segundo
}


window.onload = iniciarTemporizador();

