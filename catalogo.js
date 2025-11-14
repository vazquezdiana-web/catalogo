// 🌸 Datos de productos
const productos = [
  { id: 1, nombre: "Eterno Encanto", precio: 150, categoria: "ramos", size: "chico", costo: "barato", imagen: "Imagenes/producto.jpeg", descripcion: "Un pequeño ramo para momentos íntimos, con tonos pastel que transmiten ternura y alegría." },
  { id: 2, nombre: "Beso de Rosas", precio: 280, categoria: "ramos", size: "chico", costo: "barato", imagen: "Imagenes/producto2.jpeg", descripcion: "Rosas de tallo largo con follaje clásico, símbolo de amor y elegancia." },
  { id: 3, nombre: "Pétalos Mágicos", precio: 450, categoria: "ramos", size: "grande", costo: "caro", imagen: "Imagenes/producto3.jpeg", descripcion: "Su brillo floral transmite optimismo y alegría." },
  { id: 4, nombre: "Aurora Floral", precio: 1000, categoria: "ramos", size: "grande", costo: "caro", imagen: "Imagenes/producto4.jpeg", descripcion: "Ideal para eventos o bodas. Una combinación de flores que simboliza unión y felicidad." }
];

const contenedor = document.getElementById("productos");
const modal = document.getElementById("modal");
const btnAgregar = document.getElementById("btnAgregar");
let carrito = [];
let productoActual = null;

// 🪻 Mostrar productos
function mostrarProductos(lista) {
  contenedor.innerHTML = "";
  lista.forEach((p) => {
    const div = document.createElement("div");
    div.classList.add("producto");
    div.innerHTML = `
      <img src="${p.imagen}" alt="${p.nombre}" onclick="mostrarModal(${p.id})">
      <h3>${p.nombre}</h3>
      <p class="precio">$${p.precio.toFixed(2)}</p>
    `;
    contenedor.appendChild(div);
  });
}

// 🌼 Filtros personalizados
function filtrarProductos(tipo) {
  let filtrados = productos;
  if (tipo === "ramos_chicos") filtrados = productos.filter(p => p.size === "chico");
  else if (tipo === "ramos_grandes") filtrados = productos.filter(p => p.size === "grande");
  else if (tipo === "baratos") filtrados = productos.filter(p => p.costo === "barato");
  else if (tipo === "caros") filtrados = productos.filter(p => p.costo === "caro");
  mostrarProductos(filtrados);
}

// 🌷 Modal con información
function mostrarModal(id) {
  const p = productos.find(prod => prod.id === id);
  productoActual = p;
  modal.querySelector("h2").textContent = p.nombre;
  modal.querySelector("p").textContent = p.descripcion;
  modal.querySelector("img").src = p.imagen;
  modal.querySelector(".precio").textContent = `$${p.precio.toFixed(2)}`;
  modal.style.display = "flex";
}
function cerrarModal() {
  modal.style.display = "none";
}

// 🛒 Carrito de compras
btnAgregar.addEventListener("click", () => {
  if (productoActual) {
    carrito.push({ ...productoActual });
    actualizarCarrito();
    cerrarModal();
  }
});
function eliminarDelCarrito(index) {
  carrito.splice(index, 1);
  actualizarCarrito();
}
function actualizarCarrito() {
  const lista = document.getElementById("lista-carrito");
  lista.innerHTML = "";
  let total = 0;
  carrito.forEach((p, i) => {
    total += p.precio;
    lista.innerHTML += `<li>${p.nombre} - $${p.precio.toFixed(2)} <button onclick="eliminarDelCarrito(${i})">❌</button></li>`;
  });
  document.getElementById("total").textContent = "Total: $" + total.toFixed(2);
}

// Inicializar
document.addEventListener("DOMContentLoaded", () => {
  mostrarProductos(productos);
});
