document.getElementById("pedidoForm").addEventListener("submit", function (e) {
e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const producto = document.getElementById("producto").value;
    const cantidad = document.getElementById("cantidad").value;
    const direccion = document.getElementById("direccion").value;
    const mensaje = `
    ¡Gracias por tu pedido, ${nombre}!Hemos recibido tu solicitud de ${cantidad} ${producto}(s).Te enviaremos una confirmación a ${email}.`;
document.getElementById("mensaje").innerText = mensaje;
// Aquí podrías enviar los datos a un servidor con fetch()
});