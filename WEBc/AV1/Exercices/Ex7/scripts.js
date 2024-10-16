
let i = 0;

function añadirLetra(e) {
    const valor = e.target.textContent;
    let cuadro = document.getElementById("caja" + i);

    switch (valor) {
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
            i++;
            cuadro.textContent = valor;
            break;
        case '←':
            if (i > 1) {
                i--;
                cuadro.textContent = "";
            }else{
                cuadro.textContent = "";
            }
            break;

    };

}




//event listener 
document.addEventListener('DOMContentLoaded', () => {
    // Aquí coloca tu código para agregar el event listener
    document.querySelectorAll('.tecla').forEach(tecla => {
        tecla.addEventListener('click', añadirLetra);
    });
});