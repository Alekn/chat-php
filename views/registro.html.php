<!-- Head -->
<?php require_once 'views/partials/head.html'; ?>

<!-- Header -->
<header id="header">
    <h1><a href="home">Gtalk</a> chat</h1>
    <nav id="nav">
        <ul>
            <li><a href="home">Home</a></li>
            <li><a href="login" class="button alt">Login</a></li>
        </ul>
    </nav>
</header>

<!-- Main -->
<section id="main" class="container 75%">
	<header>
		<h2>Registrarse</h2>
		<p>Ingresa tus datos personales</p>
	</header>

	<div class="box">
		<form method="POST" action="datos">
            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <input type="text" name="username" placeholder="usuario">
				</div>
                <div class="6u 12u(mobilep)">
                    <input type="password" name="password" placeholder="password">
                </div>
			</div>
            <div class="row uniform 50%">
                <div class="12u">
                    <input type="text" name="nombre" placeholder="nombre">
                </div>
            </div> 
			<div class="row uniform 50%">
				<div class="12u">
				    <input type="email" name="email" placeholder="e-mail">
				</div>
			</div>
			<div class="row uniform 50%">
				<div class="12u">
					<div class="select-wrapper">
						<select name="sexo">
							<option value="">- Género -</option>
							<option value="hombre">Hombre</option>
							<option value="mujer">Mujer</option>
						</select>
					</div>
				</div>
			</div>			
			<div class="row uniform 50%">
				<div class="6u 12u(mobilep)">
                    <label for="birthday">Fecha de nacimiento: </label>
					<input type="date" name="birthday">
				</div>
			</div>
			
			<div class="row uniform">
				<div class="12u">
					<ul class="actions align-center">
						<li><input type="submit" value="Registrarse"></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>

<!-- Footer -->
<?php require_once 'views/partials/footer.html' ?>