# nuevo_proyecto_laravel

1. Primer punto y explicación

Este proyecto es el comienzo de aprendizaje de PHP con Laravel, haciendo el proyecto **Panadería y Pastelería R.S.** como una adaptación y para mejorar en cuestiones que se fallaron.

## base de datos en estrucutracion 

```sql

CREATE DATABASE panaderia_rs;
USE panaderia_rs;

CREATE TABLE usuario(
id_usuario INT AUTO_INCREMENT PRIMARY KEY,
roles ENUM('admin', 'superadmin') DEFAULT 'admin',
nombre_usuario VARCHAR(150) NOT NULL,
clave VARCHAR(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tipo(
id_tipo INT AUTO_INCREMENT PRIMARY KEY,
tipo VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE producto(
id_producto INT AUTO_INCREMENT PRIMARY KEY,
nombre_prod VARCHAR(150),
id_tipo INT NOT NULL,
FOREIGN KEY(id_tipo) REFERENCES tipo(id_tipo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE turno(
id_turno INT AUTO_INCREMENT PRIMARY KEY,
nombre_turno ENUM('Mañana', 'Noche')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE producciones (
    id_produccion INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    id_presentacion INT NULL,             
    cantidad_presentaciones INT NOT NULL, 
    cantidad_total_panes INT NOT NULL,     
    
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
    FOREIGN KEY (id_presentacion) REFERENCES presentaciones_pan(id_presentacion)
);

CREATE TABLE producto_presentacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    id_presentacion INT NOT NULL,
    es_principal BOOLEAN DEFAULT FALSE,     
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE,
    FOREIGN KEY (id_presentacion) REFERENCES presentaciones_pan(id_presentacion) ON DELETE CASCADE,
    UNIQUE KEY unique_producto_presentacion (id_producto, id_presentacion)
);


CREATE TABLE presentaciones_pan (
    id_presentacion INT AUTO_INCREMENT PRIMARY KEY,
    nombre_presentacion VARCHAR(50) NOT NULL, 
    cantidad_panes INT NOT NULL,                   
    descripcion VARCHAR(255),                    
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Datos
INSERT INTO usuario (roles, nombre_usuario, clave) VALUES
('admin', 'gerente', '1234'),
('superadmin', 'dueña', '1234');

INSERT INTO tipo (tipo) VALUES
('Pan'),
('Torta'),
('Bocadito');

INSERT INTO producto (nombre_prod, id_tipo) VALUES
('Pan de molde', 1),
('Torta de chocolate', 2),
('Bocadito de queso', 3),
('Pastel de manzana', 2),
('Galleta de avena', 1),
('Empanada de pollo', 1),
('Croissant de mantequilla', 1),
('Queque de vainilla', 2);

INSERT INTO turno (nombre_turno) VALUES
('Mañana'),
('Noche');

INSERT INTO produccion (cantidad_prod, hora_agotada, id_producto, id_turno) VALUES
(100, NULL, 1, 1),
(50, '2026-05-11 10:30:00', 2, 1),
(80, NULL, 3, 2),
(60, '2026-05-11 21:00:00', 4, 2),
(120, NULL, 5, 1),
(45, '2026-05-11 09:15:00', 6, 1),
(90, NULL, 7, 2),
(30, '2026-05-11 22:45:00', 8, 2);

```

## Diagrama entidad relacion 

