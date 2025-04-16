<?php
header('Content-Type: application/json');

// Validación de datos recibidos
$errores = [];
$nombre = $_POST['nombre'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// Validaciones básicas
if (empty($nombre)) {
    $errores[] = 'El nombre completo es requerido';
}

if (empty($usuario) || strlen($usuario) < 4) {
    $errores[] = 'El usuario debe tener al menos 4 caracteres';
}

if (empty($password) || strlen($password) < 6) {
    $errores[] = 'La contraseña debe tener al menos 6 caracteres';
}

// Procesamiento
if (count($errores) === 0) {
    // Aquí iría la lógica para guardar en base de datos
    // Por ahora simulamos éxito
    
    $response = [
        'status' => 'ok',
        'mensaje' => 'Usuario registrado correctamente',
        'datos_recibidos' => [
            'nombre' => htmlspecialchars($nombre),
            'usuario' => htmlspecialchars($usuario),
            'password' => '******' // Nunca devolver la contraseña real
        ]
    ];
} else {
    $response = [
        'status' => 'error',
        'mensaje' => implode(', ', $errores)
    ];
}

echo json_encode($response);
?>