document.addEventListener("DOMContentLoaded", activarMenu);

function activarMenu() {
    const Menu = document.querySelector(".menu");
    const offScreenMenu = document.querySelector(".navbar");
    Menu.addEventListener("click", () => {
    Menu.classList.toggle("activa");
    offScreenMenu.classList.toggle("activa");
})

}