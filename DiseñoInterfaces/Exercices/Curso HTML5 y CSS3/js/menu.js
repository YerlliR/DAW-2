document.addEventListener("DOMContentLoaded", () => {
    const enlaceMenu = document.querySelector("nav>a");

    const despliegaMenu = () => {
        document.querySelector("nav>ul").classList.toggle('desplegado');
    };

    enlaceMenu.addEventListener("click", despliegaMenu, false);
});
