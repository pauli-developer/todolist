<?php include("conexion.php"); ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>To-Do List</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<main class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📋 Mi Lista de Tareas</h4>
        </div>
        <div class="card-body">
            <!-- Formulario para agregar tarea -->
            <form method="POST" action="index.php" class="mb-4 d-flex gap-2">
                <input type="text" name="tarea" class="form-control" placeholder="Escribe una nueva tarea" required>
                <input type="submit" name="agregar_tarea" class="btn btn-success" value="➕ Agregar">
            </form>

            <!-- Lista de tareas -->
            <ul class="list-group">
                <?php foreach ($registro as $fila): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center 
                        <?php echo $fila['completado'] ? 'bg-light' : ''; ?>">
                        
                        <form method="POST" action="index.php" class="d-flex align-items-center w-100">
                            <input type="hidden" name="id_tarea" value="<?php echo $fila['id']; ?>">
                            <input type="checkbox" class="form-check-input me-2"
                                name="marcar_completado"
                                onchange="this.form.submit()"
                                <?php if ($fila['completado']) echo 'checked'; ?>
                            >

                            <span class="flex-grow-1 <?php echo $fila['completado'] ? 'text-muted text-decoration-line-through' : 'fw-bold'; ?>">
                                <?php echo htmlspecialchars($fila['tarea']); ?>
                            </span>
                        </form>

                        <!-- Botón eliminar -->
                        <a href="index.php?id=<?php echo $fila['id']; ?>" class="badge bg-danger text-white text-decoration-none fs-6">
                            &times;
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="card-footer text-muted text-center">
            <?php echo count($registro); ?> tarea
        </div>
    </div>
</main>

</body>
</html>





