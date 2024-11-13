<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once __DIR__ . '/../controllers/CreatureController.php';
//Recupero de la BD todos los empleos a través del controlador
$creatureController = new CreatureController;
$creatures = $creatureController->listCreatures();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id']; // Obtener el id de la criatura a eliminar
    $creatureController->deleteCreature($id); // Eliminar la criatura
    // Recargar la página para reflejar los cambios
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <body>

        <!-- Navigation bar -->
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                Heroes of Might and Magic
            </a>
            <a href="crear-modificar.php" class="btn btn-primary">Crear una criatura</a>
        </nav>
        
        <!-- Header section -->
        <div class="container mt-4">
            <div class="row">
                <!-- Main image and title -->
                <div class="col-lg-8">
                    <img src="./../../assets/img/banner.jpg" class="img-fluid" alt="Heroes V Banner">
                </div>
                <!-- Call to action -->
                <div class="col-lg-4 text-center">
                    <h3>Comunidad de usuarios de Heroes</h3>
                    <p>La aventura comienza aquí, en tu navegador</p>
                    <button class="btn btn-primary btn-lg">¡Juega ahora!</button>
                </div>
            </div>
        </div>
        <div class="container mt-5">
    <div class="row">
         <?php
            foreach ($creatures as $creature):
        ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($creature->getAvatar()); ?>" class="card-img-top" style="width: 400px; height: 300px;" alt="Imagen de <?php echo htmlspecialchars($creature->getName()); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($creature->getName()); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($creature->getDescription()); ?></p>
                        <a href="detalle.php?id=<?php echo $creature->getIdCreature(); ?>" class="btn btn-info">More Info</a>
                        <a href="crear-modificar.php?id=<?php echo $creature->getIdCreature(); ?>" class="btn btn-success">Modificar</a>
                        <form method='POST' style='display:inline;'>
                        <input type='hidden' name='delete_id' value='<?php echo $creature->getIdCreature(); ?>'>
                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        ?>
    </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>