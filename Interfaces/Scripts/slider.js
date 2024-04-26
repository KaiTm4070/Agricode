const slider = document.querySelector('#slider');
let sliderSeccion = document.querySelectorAll('.seccion_slider');
let sliderSeccionLast = sliderSeccion[sliderSeccion.length -1];

const btnSiguente = document.querySelector('#botonAdelante');
const btnAtras = document.querySelector('#botonAtras');

slider.insertAdjacentElement('afterbegin', sliderSeccionLast);

function Adelante(){
    let sliderSeccionFirst = document.querySelectorAll('.seccion_slider')[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.5s";

    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend', sliderSeccionFirst)
        slider.style.marginLeft = "-100%";
    },500); 
}

function Atras(){
    let sliderSeccion = document.querySelectorAll('.seccion_slider');
    let sliderSeccionLast = sliderSeccion[sliderSeccion.length -1];
    slider.style.marginLeft = "0";
    slider.style.transition = "all 0.5s";
    

    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('afterbegin', sliderSeccionLast);
        slider.style.marginLeft = "-100%";
    },500); 
}

btnSiguente.addEventListener('click', function(){
    Adelante();
});

btnAtras.addEventListener('click', function(){
    Atras();
});

setInterval(function(){
    Adelante();
}, 6000);