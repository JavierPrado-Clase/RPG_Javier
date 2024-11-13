<?php
// Incluimos el controlador
require_once __DIR__ . '/../controllers/CreatureController.php';

// Creamos una instancia del controlador
$creatureController = new CreatureController();
$creature = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $creature = $creatureController->getCreatureById($id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesamos el formulario y agregamos la nueva criatura
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatar = $_POST['avatar'];
    $attackPower = $_POST['attackPower'];
    $lifeLevel = $_POST['lifeLevel'];
    $weapon = $_POST['weapon'];

     if ($creature) {
        // Si estamos editando, actualizamos la criatura
        $creatureController->updateCreature($creature->getIdCreature(), $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
    } else {
        // Si no estamos editando, creamos una nueva criatura
        $creatureController->createCreature($name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
    }

    // Redirigimos a la página principal
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $creature ? "Editar Criatura" : "Crear Criatura"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Heroes of Might and Magic</a>
    </nav>

    <div class="container mt-5">
        <h2><?php echo $creature ? "Editar Criatura" : "Crear Nueva Criatura"; ?></h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $creature ? htmlspecialchars($creature->getName()) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $creature ? htmlspecialchars($creature->getDescription()) : ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar (URL)</label>
                <input type="text" class="form-control" id="avatar" name="avatar" value="<?php echo $creature ? htmlspecialchars($creature->getAvatar()) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="attackPower" class="form-label">Poder de Ataque</label>
                <input type="number" class="form-control" id="attackPower" name="attackPower" value="<?php echo $creature ? htmlspecialchars($creature->getAttackPower()) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lifeLevel" class="form-label">Nivel de Vida</label>
                <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" value="<?php echo $creature ? htmlspecialchars($creature->getLifeLevel()) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="weapon" class="form-label">Arma</label>
                <input type="text" class="form-control" id="weapon" name="weapon" value="<?php echo $creature ? htmlspecialchars($creature->getWeapon()) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $creature ? "Actualizar Criatura" : "Crear Criatura"; ?></button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>