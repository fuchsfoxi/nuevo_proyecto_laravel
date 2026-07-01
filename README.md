# nuevo_proyecto_laravel

1. Primer punto y explicación

Este proyecto es el comienzo de aprendizaje de PHP con Laravel, haciendo el proyecto **Panadería y Pastelería R.S.** como una adaptación y para mejorar en cuestiones que se fallaron.

## base de datos en estrucutracion 

```sql

CREATE TABLE roles (
    id_rol BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE usuarios (
    id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    email VARCHAR(255) UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE usuario_rol (
    id_usuario BIGINT UNSIGNED NOT NULL,
    id_rol BIGINT UNSIGNED NOT NULL,
    asignado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    PRIMARY KEY (id_usuario, id_rol),
    
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE,
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE empleados (
    id_empleado BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_usuario BIGINT UNSIGNED NOT NULL UNIQUE,
    apellido VARCHAR(100),
    dni VARCHAR(20) UNIQUE,
    telefono VARCHAR(15),
    puesto VARCHAR(50),
    salario DECIMAL(10,2),
    fecha_contratacion DATE,
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE tipos (
    id_tipo BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE presentaciones (
    id_presentacion BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_presentacion VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255),
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE productos (
    id_producto BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(150) NOT NULL,
    id_tipo BIGINT UNSIGNED NOT NULL,
    precio_venta DECIMAL(10,2) DEFAULT 0.00,
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_tipo) REFERENCES tipos(id_tipo)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE producto_presentacion (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_producto BIGINT UNSIGNED NOT NULL,
    id_presentacion BIGINT UNSIGNED NOT NULL,
    cantidad_unidades INT NOT NULL,
    es_principal BOOLEAN DEFAULT FALSE,
    
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE,
    FOREIGN KEY (id_presentacion) REFERENCES presentaciones(id_presentacion) ON DELETE CASCADE,
    
    UNIQUE KEY unique_producto_presentacion (id_producto, id_presentacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE turnos (
    id_turno BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_turno VARCHAR(50) NOT NULL,
    hora_inicio TIME,
    hora_fin TIME,
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE producciones (
    id_produccion BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_producto_presentacion BIGINT UNSIGNED NOT NULL,
    id_turno BIGINT UNSIGNED NOT NULL,
    id_usuario_registro BIGINT UNSIGNED NOT NULL,
    fecha_produccion DATE NOT NULL,
    cantidad_presentaciones INT NOT NULL DEFAULT 0,
    cantidad_total_unidades INT NOT NULL DEFAULT 0,
    cantidad_agotada INT DEFAULT 0,
    cantidad_merma INT DEFAULT 0,
    hora_agotada DATETIME NULL,
    observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_producto_presentacion) REFERENCES producto_presentacion(id) 
        ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_turno) REFERENCES turnos(id_turno) 
        ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_usuario_registro) REFERENCES usuarios(id_usuario) 
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE produccion_empleado (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_produccion BIGINT UNSIGNED NOT NULL,
    id_empleado BIGINT UNSIGNED NOT NULL,
    rol_en_turno VARCHAR(50) DEFAULT 'Operario',
    
    FOREIGN KEY (id_produccion) REFERENCES producciones(id_produccion) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado) ON DELETE RESTRICT,
    
    UNIQUE KEY unique_empleado_produccion (id_produccion, id_empleado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```
## Diagrama entidad relacion 

![imagen de entidad - relacion](https://github.com/fuchsfoxi/nuevo_proyecto_laravel/blob/main/.github/base%20de%20datos%20-%20img%20-%20relacional.svg)
