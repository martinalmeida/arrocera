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
				<a class="sidebar-brand text-decoration-none" href="admin.php">
					<i class="fas fa-tractor"></i>
					<span class="align-middle">Arrocera</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Principal
					</li>

					<li class="sidebar-item active">
						<a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
							<span class="align-middle"><i class="fas fa-people-carry"></i> Socios <i class="fas fa-angle-down"></i></span>
						</a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="../vereda/vereda.php">Veredas</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../fincas/fincas.php">Fincas</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../representante/representante.php">Representante</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="../fiscal/fiscal.php">Fiscal</a></li>
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
					<h1 class="h3 mb-3">Dashboard</h1>
				</div>
				<!-- HTML -->
				<div id="chartdiv"></div>
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
	<!-- Styles -->
	<style>
		#chartdiv {
			width: 100%;
			height: 500px;
		}
	</style>

	<!-- Resources -->
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

	<!-- Chart code -->
	<script>
		am4core.ready(function() {

			// Themes begin
			am4core.useTheme(am4themes_animated);
			// Themes end

			var chart = am4core.create("chartdiv", am4charts.XYChart);

			chart.data = [{
				"year": "1994",
				"cars": 1587,
				"motorcycles": 650,
				"bicycles": 121
			}, {
				"year": "1995",
				"cars": 1567,
				"motorcycles": 683,
				"bicycles": 146
			}, {
				"year": "1996",
				"cars": 1617,
				"motorcycles": 691,
				"bicycles": 138
			}, {
				"year": "1997",
				"cars": 1630,
				"motorcycles": 642,
				"bicycles": 127
			}, {
				"year": "1998",
				"cars": 1660,
				"motorcycles": 699,
				"bicycles": 105
			}, {
				"year": "1999",
				"cars": 1683,
				"motorcycles": 721,
				"bicycles": 109
			}, {
				"year": "2000",
				"cars": 1691,
				"motorcycles": 737,
				"bicycles": 112
			}, {
				"year": "2001",
				"cars": 1298,
				"motorcycles": 680,
				"bicycles": 101
			}, {
				"year": "2002",
				"cars": 1275,
				"motorcycles": 664,
				"bicycles": 97
			}, {
				"year": "2003",
				"cars": 1246,
				"motorcycles": 648,
				"bicycles": 93
			}, {
				"year": "2004",
				"cars": 1318,
				"motorcycles": 697,
				"bicycles": 111
			}, {
				"year": "2005",
				"cars": 1213,
				"motorcycles": 633,
				"bicycles": 87
			}, {
				"year": "2006",
				"cars": 1199,
				"motorcycles": 621,
				"bicycles": 79
			}, {
				"year": "2007",
				"cars": 1110,
				"motorcycles": 210,
				"bicycles": 81
			}, {
				"year": "2008",
				"cars": 1165,
				"motorcycles": 232,
				"bicycles": 75
			}, {
				"year": "2009",
				"cars": 1145,
				"motorcycles": 219,
				"bicycles": 88
			}, {
				"year": "2010",
				"cars": 1163,
				"motorcycles": 201,
				"bicycles": 82
			}, {
				"year": "2011",
				"cars": 1180,
				"motorcycles": 285,
				"bicycles": 87
			}, {
				"year": "2012",
				"cars": 1159,
				"motorcycles": 277,
				"bicycles": 71
			}];

			chart.dateFormatter.inputDateFormat = "yyyy";
			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.minGridDistance = 60;
			dateAxis.startLocation = 0.5;
			dateAxis.endLocation = 0.5;
			dateAxis.baseInterval = {
				timeUnit: "year",
				count: 1
			}

			var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			valueAxis.tooltip.disabled = true;

			var series = chart.series.push(new am4charts.LineSeries());
			series.dataFields.dateX = "year";
			series.name = "cars";
			series.dataFields.valueY = "cars";
			series.tooltipHTML = "<img src='https://www.amcharts.com/lib/3/images/car.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
			series.tooltipText = "[#000]{valueY.value}[/]";
			series.tooltip.background.fill = am4core.color("#FFF");
			series.tooltip.getStrokeFromObject = true;
			series.tooltip.background.strokeWidth = 3;
			series.tooltip.getFillFromObject = false;
			series.fillOpacity = 0.6;
			series.strokeWidth = 2;
			series.stacked = true;

			var series2 = chart.series.push(new am4charts.LineSeries());
			series2.name = "motorcycles";
			series2.dataFields.dateX = "year";
			series2.dataFields.valueY = "motorcycles";
			series2.tooltipHTML = "<img src='https://www.amcharts.com/lib/3/images/motorcycle.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
			series2.tooltipText = "[#000]{valueY.value}[/]";
			series2.tooltip.background.fill = am4core.color("#FFF");
			series2.tooltip.getFillFromObject = false;
			series2.tooltip.getStrokeFromObject = true;
			series2.tooltip.background.strokeWidth = 3;
			series2.sequencedInterpolation = true;
			series2.fillOpacity = 0.6;
			series2.stacked = true;
			series2.strokeWidth = 2;

			var series3 = chart.series.push(new am4charts.LineSeries());
			series3.name = "bicycles";
			series3.dataFields.dateX = "year";
			series3.dataFields.valueY = "bicycles";
			series3.tooltipHTML = "<img src='https://www.amcharts.com/lib/3/images/bicycle.png' style='vertical-align:bottom; margin-right: 10px; width:28px; height:21px;'><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
			series3.tooltipText = "[#000]{valueY.value}[/]";
			series3.tooltip.background.fill = am4core.color("#FFF");
			series3.tooltip.getFillFromObject = false;
			series3.tooltip.getStrokeFromObject = true;
			series3.tooltip.background.strokeWidth = 3;
			series3.sequencedInterpolation = true;
			series3.fillOpacity = 0.6;
			series3.defaultState.transitionDuration = 1000;
			series3.stacked = true;
			series3.strokeWidth = 2;

			chart.cursor = new am4charts.XYCursor();
			chart.cursor.xAxis = dateAxis;
			chart.scrollbarX = new am4core.Scrollbar();

			// Add a legend
			chart.legend = new am4charts.Legend();
			chart.legend.position = "top";

			// axis ranges
			var range = dateAxis.axisRanges.create();
			range.date = new Date(2001, 0, 1);
			range.endDate = new Date(2003, 0, 1);
			range.axisFill.fill = chart.colors.getIndex(7);
			range.axisFill.fillOpacity = 0.2;

			range.label.text = "Fines for speeding increased";
			range.label.inside = true;
			range.label.rotation = 90;
			range.label.horizontalCenter = "right";
			range.label.verticalCenter = "bottom";

			var range2 = dateAxis.axisRanges.create();
			range2.date = new Date(2007, 0, 1);
			range2.grid.stroke = chart.colors.getIndex(7);
			range2.grid.strokeOpacity = 0.6;
			range2.grid.strokeDasharray = "5,2";


			range2.label.text = "Motorcycle fee introduced";
			range2.label.inside = true;
			range2.label.rotation = 90;
			range2.label.horizontalCenter = "right";
			range2.label.verticalCenter = "bottom";

		}); // end am4core.ready()
	</script>

</body>

</html>