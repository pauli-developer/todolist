-- Crear la base de datos
DROP DATABASE todolist;
CREATE DATABASE todolist CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE todolist;

-- Crear la tabla de tareas
CREATE TABLE tarea (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tarea VARCHAR(255) NOT NULL,
    descripcion TEXT,
    estado ENUM('pendiente', 'en progreso', 'completada') DEFAULT 'pendiente'
    );
    
ALTER TABLE tarea ADD completado TINYINT(1) DEFAULT 0;

-- Insertar una tarea de prueba
INSERT INTO tarea (tarea, descripcion, estado)
VALUES ('Estudiar PHP', 'Avanzar con el proyecto CRUD', 'pendiente');

-- Verificar
SELECT * FROM tarea;
