<!-- Head -->
<?php require_once 'views/partials/head.html'; ?>

<!-- Header -->
<header id="header">
    <h1><a href="dashboard">Gtalk</a> chat</h1>
    <nav id="nav">
        <ul>
            <li><a href="dashboard">Home</a></li>
            <li><a href="logout" class="button alt">Logout</a></li>       
        </ul>
    </nav>
</header>

<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Dashboard</h2> 
        <p>Gestion de usuarios</p> 
    </header>

    <div class="box">
        <h4><strong>Bienvenido <?=$_SESSION['name']?> :)</strong></h4>         
        <table class='table table-hover'>
            <caption><h3>Usuarios</h3></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th scope='col'>Usuario</th>
                    <th scope='col'>Sexo</th>
                    <th scope='col'>Edad</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>

            </tbody>
        </table> 
    </div>
</section>

<!-- Footer -->
<?php require_once 'views/partials/footer.html' ?>