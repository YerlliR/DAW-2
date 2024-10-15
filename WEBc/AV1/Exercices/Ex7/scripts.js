
let i = 1;

function añadirLetra(e) {
    const valor = e.target.textContent;
    let cuadro = document.getElementById("caja" + i);
    cuadro.textContent = valor;
    i++;
    // Imprimir la letra por consola
    console.log("Letra presionada:", valor);
}




//event listener 
document.addEventListener('DOMContentLoaded', () => {
    // Aquí coloca tu código para agregar el event listener
    document.querySelectorAll('.tecla').forEach(tecla => {
        tecla.addEventListener('click', añadirLetra);
    });
});