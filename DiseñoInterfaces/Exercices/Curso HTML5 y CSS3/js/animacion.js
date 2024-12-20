document.addEventListener("DOMContentLoaded", () => {
    const chincheta1 = document.getElementById("primera");
    const section1 = document.getElementById("seccion1");
    const chincheta2 = document.getElementById("segunda");
    const chincheta3 = document.getElementById("tercera");
    const section3 = document.getElementById("seccion3");

    const animacionSection3 = () => {
        section3.id = "section3";
    };

    const animacionChincheta3 = () => {
        chincheta3.id = "chincheta3";
        chincheta3.addEventListener("animationend", animacionSection3, false);
    };

    const animacionChincheta2 = () => {
        chincheta2.addEventListener("animationend", animacionChincheta3, false);
    };

    const animacionArticle = () => {
        section1.id = "section1";
        section1.addEventListener("animationend", animacionChincheta2, false);
        chincheta2.id = "chincheta2";
    };

    chincheta1.id = "chincheta1";
    chincheta1.addEventListener("animationend", animacionArticle, false);
});
