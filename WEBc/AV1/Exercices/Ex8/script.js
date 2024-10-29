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



let tiempo = document.getElementsByClassName("tiempo")
console.log(tiempo)
let finalizado = true
let seconds = 0
let minutes = 0
setInterval(timerFunction, 1000);
function timerFunction(){
    seconds++
    console.log(seconds)

    if (seconds == 60){
        seconds = 0
        minutes+++
        console.log("an")
    }
    tiempo.innerText = minutes + ":" + seconds
}

