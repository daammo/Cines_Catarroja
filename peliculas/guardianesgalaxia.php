<!DOCTYPE HTML>
<<?php
include '../seguridad/seguridad.php';
include '../modelo/pelicula.php';
$sesion=new Seguridad();
$peli=new Pelicula();
 ?>
<html>
	<head>
		<title>Cines Catarroja</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="homepage">

		<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Logo -->
				<div id="logo">
					<h1><a>Cines Catarroja</a></h1>
				</div>

				<!-- Nav -->
				<?php
				if (isset($_SESSION["usuario"])) {
					echo "<nav id='nav'>";
						echo "<ul>";
							echo "<li><a href='../index.php'>Pagina principal</a></li>";
							echo "<li><a href='../cartelera.php'>Cartelera</a></li>";
							echo "<li><a href='../contacto.php'>Contactanos</a></li>";
							echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>";
							echo "<li><a href='../logout.php'>Cerrar sesion</a>";
						echo "</ul>";
					echo "</nav>";
				}else {
					echo "<nav id='nav'>";
						echo "<ul>";
							echo "<li><a href='../index.php'>Pagina principal</a></li>";
							echo "<li><a href='../cartelera.php'>Cartelera</a></li>";
							echo "<li><a href='../contacto.php'>Contactanos</a></li>";
							echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>";
							echo "<li><a href='../login.php'>Iniciar sesion</a></li>";
							echo "<li><a href='../registro.php'>Registro</a></li>;";
						echo "</ul>";
					echo "</nav>";
				}
				 ?>

			</div>
		</div>

		<div id="banner">&nbsp;</div>

		<div id="featured">
			<div class="container">
				<div class="row">

					<div class="3u">
						<section>
							<h1>Los Guarianes de la Galaxia Vol.2</h1>
							<a class="image full"><img src="images/gog.jpg" alt=""></a>
							<p>Sinopsis: Awesome Mix Vol. 2 es el nuevo telón de fondo sonoro de "Guardianes de la Galaxia Vol. 2" de Marvel que narra las aventuras del equipo mientras atraviesan los confines del cosmos. Los Guardianes deben luchar para mantener unida a su nueva familia mientras desentrañan el misterio de la verdadera filiación de Peter Quill. Los viejos enemigos se convierten en nuevos aliados y los personajes favoritos de los fans provenientes de los cómics clásicos acudirán en ayuda de nuestros héroes mientras el Universo Cinematográfico Marvel sigue expandiéndose.</p>
						</section>
					</div>
					<div class="3u">
						<section>
							<h1>Trailer</h1>
              <iframe width="560" height="380" src="https://www.youtube.com/embed/12gvJgLE4us?ecver=1" frameborder="0" allowfullscreen></iframe>
							<?php
          $comentarios=$peli->mostrarComentario();
					?>
					<h1>Comentarios de los usuarios</h1>
					<br><br>
	<?php foreach ($comentarios as $datos) {
  echo "<a>" .$datos['nombre']."</a><br><br>";
  echo "<a>" .$datos['comentario']."</a><br><br>";
	 }
	 ?>
						</section>
					</div>
					<div class="3u">
						<section>
							<p/>
						</section>
					</div>
					<div class="3u">
						<section>
							<ul>
                <li><p> <b>Duración</b>: 137 min </p></li>
								<li><p> <b>País</b>: Estados Unidos </p></li>
								<li><p> <b>Género</b>: Acción - Aventura - Ciencia ficción </p></li>
								<li><p> <b>Estreno</b>: 28/04/2017 </p></li>
								<li><p> <b>Directores</b>: James Gunn </p></li>
								<li><p> <b>Actores</b>: Bradley Cooper, Chris Pratt, Dave Bautista, Karen Gillan, Vin Diesel, Zoe Saldana </p></li>
								<li><p> <b>Guionistas</b>: Andy Lanning, Dan Abnett, James Gunn </p></li>
								<li><p> <b>Productores</b>: Marvel Enterprises, Marvel Studios, Walt Disney Pictures </p></li>
								<?php
								if (isset($_SESSION['usuario'])) {
								 ?>
								 		<h1>RESERVA</h1><br><br>
										<form class="" action='formularioreservas.php' method='post'>
													<a>Fecha:</a> <input type="date" name="fecha" value= ""><br><br>
										      <a>Hora:</a> <select name='hora'>
			   													<option value='1'>8:30</option>
																	<option value='2'>12:00</option>
																	<option value='3'>14:15</option>
																	<option value='4'>16:30</option>
																	<option value='5'>18:40</option>
																	<option value='6'>20:00</option>
																</select><br><br>
										      <a>Numero de personas: </a><input type="number" name="personas" value="" min="1" max="50">
										      <input type="submit" name="Reservar" value="Reservar">";
							</ul>;
										<?php
								    }
								 ?>

						</section>
						</section>
					</div>

		<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				<a>Design by Borja Molina</a>
			</div>
		</div>

	</body>
</html>
