window.onload = function() {
    let jugada = document.getElementsByClassName("item"); 

    for (div of jugada) {
        div.addEventListener("drop", drop);

        div.addEventListener("dragover", allowDrop);
    }

    let eleccion = document.getQuerySelectorAll("img"); 
}