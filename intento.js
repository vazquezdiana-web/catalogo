/*Interactividad con Javascript y el DOM.*/
document.addEventListener("DOMContentLoaded", () => {
  const productoSelect = document.getElementById("producto");
  const cantidadInput = document.getElementById("cantidad");
  const totalPedido = document.getElementById("total_pedido");

  const precios = {
    regalo: 250,
    ramo: 150,
    peluche: 200
  };

  function calcularTotal() {
    const producto = productoSelect.value;
    const cantidad = parseInt(cantidadInput.value) || 0;

    const precio = precios[producto] || 0;
    const total = precio * cantidad;

    if (total > 0) {
      totalPedido.innerHTML = `$${total.toFixed(2)}`;
    } else {
      totalPedido.innerHTML = "—";
    }
  }

  productoSelect.addEventListener("change", calcularTotal);
  cantidadInput.addEventListener("input", calcularTotal);
})