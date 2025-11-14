// 🌸 Productos - Añadiendo información para filtros avanzados
const productos = [
  // id, nombre, precio, categoria, tamaño (para filtros), costo (para filtros)
  { id: 1, nombre: "Eterno encanto", precio: 150.00, categoria: "ramos", imagen: "Imagenes/producto.jpeg", descripcion: "Un pequeño ramo para momentos íntimos, con tonos pastel que transmiten ternura y alegría.", size: "chico", costo: "barato" },
  { id: 2, nombre: "Beso de rosas", precio: 280.00, categoria: "ramos", imagen: "Imagenes/producto2.jpeg", descripcion: "Ideal para aniversarios. Rosas de tallo largo con follaje clásico, símbolo de amor y elegancia.", size: "chico", costo: "barato" },
  { id: 3, nombre: "Pétalos mágicos", precio: 450.00, categoria: "ramos", imagen: "Imagenes/producto3.jpeg", descripcion: "Perfecto para cualquier ocasión. Su brillo floral transmite optimismo y alegría.", size: "grande", costo: "caro" },
  { id: 4, nombre: "Aurora Floral", precio: 1000.00, categoria: "cajas", imagen: "Imagenes/producto4.jpeg", descripcion: "Ideal como centro de mesa en bodas. Una combinación de flores que simboliza unión y felicidad.", size: "grande", costo: "caro" },
  { id: 5, nombre: "Amani Bloom", precio: 100.00, categoria: "ramos", imagen: "Imagenes/producto5.jpg", descripcion: "Un ramo que respira calma y armonía. Sus tonos suaves son perfectos para regalar paz, amor y equilibrio.", size: "chico", costo: "barato" },
  { id: 6, nombre: "Lúa Encantada", precio: 380.00, categoria: "ramos", imagen: "Imagenes/producto6.jpeg", descripcion: "Inspirado en la magia de la noche. Flores ideales para ocasiones especiales o amores eternos.", size: "grande", costo: "barato" },
  { id: 7, nombre: "Nahara", precio: 500.00, categoria: "cajas", imagen: "Imagenes/producto7.jpeg", descripcion: "Radiante y llena de vida. Perfecto para quienes iluminan cada espacio con su presencia.", size: "grande", costo: "caro" },
  { id: 8, nombre: "Kaelani", precio: 700.00, categoria: "plantas", imagen: "Imagenes/producto8.jpeg", descripcion: "Una combinación de flores que transmite pureza, libertad y tranquilidad.", size: "grande", costo: "caro" }
];

// Elementos del DOM (variables que usaremos para el catálogo/modal/carrito)
const contenedor = document.getElementById('productos');
const modal = document.getElementById('modal');
const btnAgregarModal = document.getElementById('btnAgregar');

// Variables del carrito
let carrito = [];

// --- Funciones de Catálogo y Filtro ---

/**
 * Genera y muestra los productos en el contenedor principal.
 * Se ha eliminado el botón "Agregar" del producto para usar solo el modal.
 * @param {Array} lista - Lista de objetos producto a mostrar.
 */
function mostrarProductos(lista) {
  contenedor.innerHTML = '';
  lista.forEach(p => {
    const div = document.createElement('div'); // Usamos 'div' como en tu código original
    div.classList.add('producto');
    div.dataset.categoria = p.categoria;
    
    // Se llama a mostrarModal con el ID para usar el objeto completo del producto
    div.innerHTML = `
      <img src="${p.imagen}" alt="${p.nombre}" onclick="mostrarModal(${p.id})">
      <h3>${p.nombre}</h3>
      <p>${p.descripcion.substring(0, 70)}...</p>
      <p>$${p.precio.toFixed(2)}</p>
    `;
    contenedor.appendChild(div);
    // Aplicamos la clase 'visible' para la animación de entrada
    setTimeout(() => div.classList.add('visible'), 100); 
  });
}

/**
 * Filtra los productos según la categoría o criterio avanzado seleccionado.
 * @param {string} cat - Criterio a filtrar ('todos', 'ramos', 'cajas', 'plantas', 'ramos_chicos', 'ramos_grandes', 'ramos_baratos', 'ramos_caros').
 */
function filtrarProductos(cat) {
  let productosFiltrados = productos;
  
  if (cat === 'todos') {
    // Mostrar todos, no hace falta filtrar
  } else if (cat === 'ramos_chicos') {
    productosFiltrados = productos.filter(p => p.categoria === 'ramos' && p.size === 'chico');
  } else if (cat === 'ramos_grandes') {
    productosFiltrados = productos.filter(p => p.categoria === 'ramos' && p.size === 'grande');
  } else if (cat === 'ramos_baratos') {
    productosFiltrados = productos.filter(p => p.costo === 'barato'); // Filtra todos los productos baratos, no solo ramos
  } else if (cat === 'ramos_caros') {
    productosFiltrados = productos.filter(p => p.costo === 'caro'); // Filtra todos los productos caros
  } else {
    // Filtro simple por categoría ('ramos', 'cajas', 'plantas')
    productosFiltrados = productos.filter(p => p.categoria === cat);
  }
  
  mostrarProductos(productosFiltrados);
}


// Inicializar el catálogo al cargar
document.addEventListener('DOMContentLoaded', () => {
    mostrarProductos(productos);
    actualizarCarrito();
});


// --- Funciones de Modal (Popup) ---

/**
 * Muestra el modal con la información detallada de un producto.
 * @param {number} id - El ID del producto.
 */
function mostrarModal(id) {
  const p = productos.find(prod => prod.id === id);
  if (!p) return; 

  // Llenar el modal con los datos del producto (usando los selectores del HTML que mandaste)
  modal.querySelector('h2').textContent = p.nombre;
  modal.querySelector('p').textContent = p.descripcion;
  modal.querySelector('img').src = p.imagen;
  
  // Asignar la función agregarAlCarrito al botón del modal
  btnAgregarModal.onclick = () => {
      agregarAlCarrito(p.nombre, p.precio);
  };

  // Mostrar el modal
  modal.style.display = 'flex';
  // (Si quieres la animación del modal, asegúrate de que el CSS esté configurado para la clase 'show' o similar)
}

function cerrarModal() {
  document.getElementById('modal').style.display = 'none';
}


// --- Funciones de Carrito ---

function agregarAlCarrito(nombre, precio) {
  carrito.push({ nombre, precio });
  alert("${nombre}" agregado al carrito!);
  actualizarCarrito();
  cerrarModal(); // Cierra el modal después de agregar
}

function eliminarDelCarrito(index) {
  carrito.splice(index, 1);
  actualizarCarrito();
}

function actualizarCarrito() {
  const lista = document.getElementById('lista-carrito');
  lista.innerHTML = '';
  let total = 0;
  
  carrito.forEach((p, i) => {
    total += p.precio;
    // Usamos el formato de lista de tu código original
    lista.innerHTML += `<li>${p.nombre} - $${p.precio.toFixed(2)} 
      <button onclick="eliminarDelCarrito(${i})">❌</button></li>`;
  });
  
  document.getElementById('total').textContent = 'Total: $' + total.toFixed(2);
}

// --- Funciones de Secciones Adicionales ---

// Reservación (Restaurada)
if (document.getElementById('reservaForm')) {
  document.getElementById('reservaForm').addEventListener('submit', e => {
    e.preventDefault();
    const fechaInput = document.getElementById('fecha').value;
    const fecha = new Date(fechaInput);
    const hoy = new Date();
    // Limpiar la hora para solo comparar la fecha
    hoy.setHours(0, 0, 0, 0); 
    fecha.setHours(0, 0, 0, 0);

    if (fecha < hoy) {
      document.getElementById('mensaje').textContent = '❌ No puedes reservar en una fecha pasada.';
      return;
    }
    document.getElementById('mensaje').textContent = '🌸 ¡Reserva confirmada con éxito!';
  });
}

// Mapa (Restaurada)
function abrirMapa() {
  window.open('https://goo.gl/maps/yourmaplink', '_blank');
}

// Contacto (Restaurada)
if (document.getElementById('contactoForm')) {
  document.getElementById('contactoForm').addEventListener('submit', e => {
    e.preventDefault();
    alert('Gracias por contactarnos 💐 Te responderemos pronto.');
    // Aquí podrías agregar un código para limpiar el formulario si fuera necesario
  });
}