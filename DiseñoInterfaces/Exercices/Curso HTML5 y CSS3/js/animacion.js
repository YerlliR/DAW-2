let chincheta1 = document.getElementById("primera");
let section1 = document.getElementById("seccion1");
let chincheta2 = document.getElementById("segunda");
let chincheta3 = document.getElementById("tercera");
let section3 = document.getElementById("seccion3");


// Tengo puesto el id primera en 0px y cuando se carga la página cambio el id a chincheta1 que es la de la animación
function iniciar() {
    chincheta1.id = "chincheta1"; // Cambiar el id del elemento

    chincheta1.addEventListener("animationend", animacionArticle, false); // Cuando acabe la animacion de la chincheta empezar la del article
}

// Cogemos el primer article y le ponemos el id de la animación
function animacionArticle() {
    section1.id = "section1";

    section1.addEventListener("animationend", animacionChincheta2, false);

    chincheta2.id = "chincheta2";
}
/*Esta función no empieza despues de animacionArticle, sino que empieza cuando acaba la animación de la chincheta1??, 
así que para que funcione le meto delay directamente en css de 0.5s así empieza despúes de la anterior */

function animacionChincheta2() {
    
    chincheta2.addEventListener("animationend", animacionChincheta3, false);
}

function animacionChincheta3() {
    chincheta3.id = "chincheta3";

    chincheta3.addEventListener("animationend", animacionSection3, false);
}

function animacionSection3() {
    section3.id = "section3";
}

window.addEventListener("DOMContentLoaded", iniciar, false);

