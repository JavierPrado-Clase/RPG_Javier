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
                <img src="heroes_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Heroes of Might and Magic
            </a>
            <button class="btn btn-primary">Crear una criatura</button>
        </nav>
        
        <!-- Header section -->
        <div class="container mt-4">
            <div class="row">
                <!-- Main image and title -->
                <div class="col-lg-8">
                    <img src="heroes_banner.png" class="img-fluid" alt="Heroes V Banner">
                </div>
                <!-- Call to action -->
                <div class="col-lg-4 text-center">
                    <h3>Comunidad de usuarios de Heroes</h3>
                    <p>La aventura comienza aquí, en tu navegador</p>
                    <button class="btn btn-primary btn-lg">¡Juega ahora!</button>
                </div>
            </div>
        </div>
        
        <!-- Creature cards section -->
        <div class="container mt-5">
            <div class="row">
                <!-- Creature 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="creature1.jpg" class="card-img-top" alt="Creature 1">
                        <div class="card-body">
                            <h5 class="card-title">Nombre criatura 1</h5>
                            <p class="card-text">Descripción de la criatura1. Por ejemplo: Los poderosos Centinelas son la primera línea de defensa del Sacro Imperio...</p>
                            <a href="#" class="btn btn-info">More Info</a>
                            <a href="#" class="btn btn-success">Modificar</a>
                            <a href="#" class="btn btn-danger">Exterminar</a>
                        </div>
                    </div>
                </div>
        
                <!-- Creature 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="creature2.jpg" class="card-img-top" alt="Creature 2">
                        <div class="card-body">
                            <h5 class="card-title">Nombre criatura 2</h5>
                            <p class="card-text">Descripción de la criatura2.</p>
                            <a href="#" class="btn btn-info">More Info</a>
                            <a href="#" class="btn btn-success">Modificar</a>
                            <a href="#" class="btn btn-danger">Exterminar</a>
                        </div>
                    </div>
                </div>
        
                <!-- Creature 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="creature3.jpg" class="card-img-top" alt="Creature 3">
                        <div class="card-body">
                            <h5 class="card-title">Nombre criatura 3</h5>
                            <p class="card-text">Descripción de la criatura3.</p>
                            <a href="#" class="btn btn-info">More Info</a>
                            <a href="#" class="btn btn-success">Modificar</a>
                            <a href="#" class="btn btn-danger">Exterminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>