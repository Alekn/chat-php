<!-- Head -->
<?php require_once 'views/partials/head.html'; ?>

<!-- Header -->
<header id="header">
    <h1><a href="home">Gtalk</a> chat</h1>
    <nav id="nav">
        <ul>
            <li><a href="home">Home</a></li>
            <li><a href="registro" class="button alt">Registrate</a></li>
        </ul>
    </nav>
</header>

<!-- Main -->
<section id="main" class="container 75%">
	<header>
		<h2>Ingreso</h2>
		<p>Ingresa tu usuario y contraseña</p>
	</header>
	
	<div class="box">
		<form action="check_in" method="POST" >
		
			<div class="row uniform 50%">
				<div class="12u">
					<ul class="actions align-center">
				        <input name="username" type="text" placeholder="usuario" required>
					</ul>
				</div>
			</div>
		
			<div class="row uniform 50%">
				<div class="12u">
					<ul class="actions align-center">
				        <input name="password" type="password" placeholder="contraseña" required>
				    </ul>
				</div>
            </div>
            
			<div class="row uniform">
				<div class="12u">
					<ul class="actions align-center">
						<li><input type="submit" value="Ingresar"></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>

<!-- Footer -->
<?php require_once 'views/partials/footer.html' ?>