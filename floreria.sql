CREATE TABLE pedidos ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100) NOT NULL, 
    email VARCHAR(100) NOT NULL, 
    producto VARCHAR(50) NOT NULL, 
    cantidad INT NOT NULL, 
    direccion TEXT NOT NULL, 
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);
