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



