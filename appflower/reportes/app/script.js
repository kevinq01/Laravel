
//Selector del menu Hamburguesa
const botonHB = document.querySelector('.navbar #hamburguer-menu');
const lateralMenu = document.querySelector('.lateralMenu');


const selectedOptionArmado = document.querySelector('#selectOption');
const selectedOptionArmadoBanda = document.querySelector('#selectOptionBanda');
const selectedOptionArmadoTallo = document.querySelector('#selectOptionTallo');
const selectOptionPreparacion = document.querySelector('#selectOptionPreparacion');
const selectOptionEmpaque = document.querySelector('#selectOptionEmpaque');
const selectOptionGeneral = document.querySelector('#selectOptionGeneral');
const selectOptionTm = document.querySelector('#selectOptionTm');
const selectOptionBonificacion = document.querySelector('#selectOptionBonificacion');



botonHB.addEventListener('click', ocultarLateral);
// selectedOption.addEventListener('change', cambiarOpcionSelect);


//Reporte Armado
selectedOptionArmado.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaArmado', 'semanaArmado');
});

//Reporte Armado Banda
selectedOptionArmadoBanda.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaArmadoBanda', 'semanaArmadoBanda');
});
//Reporte Armado tallo
selectedOptionArmadoTallo.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaArmadoTallo', 'semanaArmadoTallo');
});
//Reporte Preparaciones
selectOptionPreparacion.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaPreparacion', 'semanaPreparacion');
});
//Reporte Empaque
selectOptionEmpaque.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaEmpaque', 'semanaEmpaque');
});
//Reporte general
selectOptionGeneral.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaGeneral', 'semanaGeneral');
});
//Reporte tiempo muerto 
selectOptionTm.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaTm', 'semanaTm');
});
//Reporte bonificaciones
selectOptionBonificacion.addEventListener('change', (e) => {
    cambiarOpcionSelect(e, 'fechaBonificacion', 'semanaBonificacion');
});

//Esta función nos oculta o muestra el menu lateral
function ocultarLateral() {
    if (lateralMenu.classList.contains('d-none')) {
        lateralMenu.classList.remove('d-none');
        botonHB.classList.remove('text-primary');
        botonHB.classList.add('text-dark');
        sessionStorage.setItem('menu', 'open');
    } else {
        lateralMenu.classList.add('d-none');
        botonHB.classList.remove('text-dark');
        botonHB.classList.add('text-primary');
        sessionStorage.setItem('menu', 'close');
    }
}
window.onload = () => {
    if (sessionStorage.getItem('menu') !== "open") {
        if (sessionStorage.getItem('menu') == "close") {
            ocultarLateral();
        }
    }
}

//Esta función nos permite mostrar u ocultar la fecha y semana 
cambiarOpcionSelect = (e, divFecha, divSemana) => {
    const fechaDiv = document.querySelector('#' + divFecha + '');
    const semanaDiv = document.querySelector('#' + divSemana + '');
    if (e.target.value === "1") {
        fechaDiv.style.setProperty('display', '');
        semanaDiv.style.setProperty('display', 'none');
        console.log("hola")

    } else {
        fechaDiv.style.setProperty('display', 'none');
        semanaDiv.style.setProperty('display', '');
    }

}


//Esta funcion nos permite enviar por la url, los parametros al control
reporte = (url, fechaInicio, fechaFin, Option, Week) => {
    const desde = $('#' + fechaInicio + '').val();
    const hasta = $('#' + fechaFin + '').val();
    const semanaReport = $('#' + Week + '').val();
    const selectOption = $('#' + Option + '').val();
    window.open('../control/' + url + '.php?desde=' + desde + '&hasta=' + hasta + '&selectOption=' + selectOption + '&semanaReport=' + semanaReport);
}

