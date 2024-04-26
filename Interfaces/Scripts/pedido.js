const carro = new carrito();
const carrito = document.getElementById('carrito');
const productos = document.getElementById('slider-productos');
const listaProductos = document.querySelector('#ventana')

function cargarEvento(){
    productos.addEventListener('click',  (e)=>{carro.comprarProducto(e)})
    console.log(productos)
}