<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="shortcut icon" href="assets/img/icons/icon-48x48.png" />
  <title></title>
</head>

<body style="background-color: #222E3C;">

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="assets/img/photos/img.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form id="formulario" method="POST">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Inicio de Sesión</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Proyecto Arroceras</h5>

                    <div class="form-outline mb-4">
                      <input type="email" class="form-control form-control-lg" id="correo" name="correo" />
                      <label class="form-label" for="form2Example17">Correo</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" class="form-control form-control-lg" id="password" name="password" />
                      <label class="form-label" for="form2Example27">Contraseña</label>
                    </div>
                    <div id="alerta"></div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                    </div>

                    <a class="small text-muted" href="#!">Olvidaste tu contraseña?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes una cuenta de usuario? <a href="#!" style="color: #393f81;">Registrate</a></p>
                    <a href="#!" class="small text-muted">Terminos y condiciones.</a>
                    <a href="#!" class="small text-muted">Politicas de privacidad</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  <script src="assets/js/fetch/login.js"></script>
</body>

</html>