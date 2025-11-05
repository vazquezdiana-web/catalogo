// 🌸 Productos
const productos = [
  { nombre: "Ramo Rosas Rojas", precio: 350, categoria: "ramos", imagen: "Imagenes/producto.jpeg", descripcion: "Ramo clásico de 12 rosas rojas, símbolo de amor eterno." },
  { nombre: "Caja Primavera", precio: 420, categoria: "cajas", imagen: "Imagenes/producto2.jpeg", descripcion: "Caja decorativa con flores mixtas de temporada." },
  { nombre: "Suculenta Mini", precio: 180, categoria: "plantas", imagen: "Imagenes/producto3.jpeg", descripcion: "Planta suculenta pequeña en maceta artesanal." },
  { nombre: "Ramo Tulipanes", precio: 380, categoria: "ramos", imagen: "Imagenes/producto4.jpeg", descripcion: "Colorido ramo de tulipanes frescos ideal para regalar." }
];

// Mostrar productos
const contenedor = document.getElementById('productos');
function mostrarProductos(lista) {
  contenedor.innerHTML = '';
  lista.forEach(p => {
    const div = document.createElement('div');
    div.classList.add('producto');
    div.dataset.categoria = p.categoria;
    div.innerHTML = `
      <img src="${p.imagen}" alt="${p.nombre}" onclick="mostrarModal('${p.nombre}', '${p.descripcion}', '${p.imagen}', ${p.precio})">
      <h3>${p.nombre}</h3>
      <p>$${p.precio}</p>
      <button onclick="agregarAlCarrito('${p.nombre}', ${p.precio})">Agregar</button>
    `;
    contenedor.appendChild(div);
    setTimeout(() => div.classList.add('visible'), 100);
  });
}
mostrarProductos(productos);

// Filtro
function filtrarProductos(cat) {
  if (cat === 'todos') {
    mostrarProductos(productos);
  } else {
    mostrarProductos(productos.filter(p => p.categoria === cat));
  }
}

// Modal
function mostrarModal(nombre, descripcion, imagen, precio) {
  const modal = document.getElementById('modal');
  modal.querySelector('h2').textContent = nombre;
  modal.querySelector('p').textContent = descripcion;
  modal.querySelector('img').src = imagen;
  document.getElementById('btnAgregar').onclick = () => agregarAlCarrito(nombre, precio);
  modal.style.display = 'flex';
}
function cerrarModal() {
  document.getElementById('modal').style.display = 'none';
}

// Carrito
let carrito = [];
function agregarAlCarrito(nombre, precio) {
  carrito.push({ nombre, precio });
  actualizarCarrito();
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
    lista.innerHTML += `<li>${p.nombre} - $${p.precio} 
      <button onclick="eliminarDelCarrito(${i})">❌</button></li>`;
  });
  document.getElementById('total').textContent = 'Total: $' + total;
}

// Reservación
document.getElementById('reservaForm').addEventListener('submit', e => {
  e.preventDefault();
  const fecha = new Date(document.getElementById('fecha').value);
  const hoy = new Date();
  if (fecha < hoy) return alert('No puedes reservar en una fecha pasada.');
  document.getElementById('mensaje').textContent = '🌸 ¡Reserva confirmada con éxito!';
});

// Mapa
function abrirMapa() {
  window.open('https://goo.gl/maps/yourmaplink', '_blank');
}

// Menú móvil
function toggleMenu() {
  document.querySelector('nav ul').classList.toggle('activo');
}

// Contacto
document.getElementById('contactoForm').addEventListener('submit', e => {
  e.preventDefault();
  alert('Gracias por contactarnos 💐 Te responderemos pronto.');
});