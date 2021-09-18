<?php
include_once 'insertar_modal.php';
include_once 'editar_modal.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../../assets/img/icons/icon-48x48.png" />

	<title>ARROCERA</title>

	<link href="../../assets/css/app.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand text-decoration-none" href="../admin/admin.php">
					<i class="fas fa-tractor"></i>
					<span class="align-middle">Arrocera</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Principal
					</li>

					<li class="sidebar-item">
						<a href="#auth" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
							<span class="align-middle"><i class="fas fa-people-carry"></i> Socios <i class="fas fa-angle-down"></i></span>
						</a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="../vereda/vereda.php">Veredas</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../fincas/fincas.php">Fincas</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../representante/representante.php">Representante</a></li>
							<li class="sidebar-item active"><a class="sidebar-link" href="../fiscal/fiscal.php">Fiscal</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../tesorero/tesorero.php">Tesorero</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../asociacion/asociacion.php">Asociacion</a></li>
						</ul>
					</li>

				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link  d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<i class="fas fa-user-cog"></i> <span class="text-dark">Usuario</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></button>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div id="deletealert"></div>
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Tabla</strong> Fiscal</h1>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert">
						Insertar <i class="far fa-plus-square"></i>
					</button>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="table-responsive" style="width:100%">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nombre de Fiscal</th>
											<th scope="col">Cedula</th>
											<th scope="col">Telefono</th>
											<th scope="col">Correo</th>
											<th scope="col">Whatsapp</th>
											<th scope="col" class="text-center">Acciones</th>
										</tr>
									</thead>
									<tbody id="tabla">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="#" target="_blank"><strong>Arrocera</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Privacidad</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#" target="_blank">Terminos</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<a>Deseas Salir?</a>
					<a type="button" class="btn btn-primary" href="../../model/login/logout.php">Salir <i class="fas fa-sign-out-alt"></i></a>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar <i class="fas fa-times"></i></button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="../../assets/js/template/app.js"></script>
	<script src="../../assets/js/fetch/fiscal_fetch.js"></script>

</body>

</html>