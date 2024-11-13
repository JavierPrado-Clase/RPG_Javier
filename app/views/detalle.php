<?php
// Incluir el controlador y el DAO necesario
require_once __DIR__ . '/../controllers/CreatureController.php';

// Crear una instancia del controlador
$creatureController = new CreatureController();

// Verificar si hay un `id` en la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Si el `id` está presente, obtenemos los detalles de la criatura
if ($id) {
    $creature = $creatureController->getCreatureById($id);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Criatura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Detalle de la Criatura</h1>

        <?php if ($creature): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($creature->getAvatar()); ?>" class="card-img-top" alt="Avatar">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($creature->getName()); ?></h5>
                    <p class="card-text"><strong>Descripción:</strong> <?php echo htmlspecialchars($creature->getDescription()); ?></p>
                    <p class="card-text"><strong>Poder de Ataque:</strong> <?php echo htmlspecialchars($creature->getAttackPower()); ?></p>
                    <p class="card-text"><strong>Nivel de Vida:</strong> <?php echo htmlspecialchars($creature->getLifeLevel()); ?></p>
                    <p class="card-text"><strong>Arma:</strong> <?php echo htmlspecialchars($creature->getWeapon()); ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>¡Criatura no encontrada!</p>
        <?php endif; ?>

        <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista de criaturas</a>
    </div>
</body>
</html>