const botonHB = document.querySelector('.navbar #hamburguer-menu');
const lateralMenu = document .querySelector('.lateralMenu');
botonHB.addEventListener('click', ocultarLateral);


function ocultarLateral(){
    if(lateralMenu.classList.contains('d-none')){
        lateralMenu.classList.remove('d-none');
        botonHB.classList.remove('text-primary');
        botonHB.classList.add('text-dark');
        sessionStorage.setItem('menu','open');
    } else {
        lateralMenu.classList.add('d-none');
        botonHB.classList.remove('text-dark');
        botonHB.classList.add('text-primary');
        sessionStorage.setItem('menu','close');
    }
}

window.onload = () => {
    if(sessionStorage.getItem('menu') !== "open"){
        if(sessionStorage.getItem('menu') == "close"){
            ocultarLateral();
        }
    }
}