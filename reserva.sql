CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_entrega DATE NOT NULL,
    hora_entrega TIME NOT NULL,
    cantidad_arreglos INT NOT NULL,
    fecha_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);