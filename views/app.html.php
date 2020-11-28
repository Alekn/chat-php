<!-- Head -->
<?php require_once 'views/partials/head.html'; ?>

<!-- Header -->
<header id="header">
    <h1><a href="dashboard">Gtalk</a> chat</h1>
    <nav id="nav">
        <ul>
            <li><a href="dashboard">Home</a></li>
            <li>
                <a href="#" class="icon fa-angle-down">Solicitudes</a>
                <ul>
                    <li>
                        <a href="#">pendientes</a>
                        <ul id="solicitudes-pendientes">
                        </ul>
                    </li>
                    <li>
                        <a href="#">realizadas</a>
                        <ul id="solicitudes-realizadas">
                        </ul>
                    </li>
                </ul>
            </li>            
            <li><a href="logout" class="button alt">Logout</a></li>       
        </ul>
    </nav>
</header>

<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Chat App</h2>        
    </header>

    <div class="box">
        <h4><strong>Bienvenido, <?= $_SESSION['name']; ?></strong></h4>
        <p>Aquí podras agregar tus contactos, así como también interactuar con ellos y disfrutar de nuestro servicio =)</p>

        <form action="pendiente" method="POST" >
            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <div class="select-wrapper">
                        <select name="user_id" id="usuarios">
                            <option value="">- Usuarios Existentes -</option>
                        </select>
                    </div>
                </div>
                <div class="3u 12u(mobilep)">
                    <ul class="actions">
                        <li><input type="submit" value="Agregar" class="button special"></li>
                    </ul>
                </div>
            </div>    
        </form>

        <hr />        
        <table class='table table-hover'>
            <caption><h4>Lista de Contactos</h4></caption>
            <thead>
                <tr>
                    <th scope='col'>Usuario</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody id="contactos">
            </tbody>
        </table>
        <div id="user_model_details"></div>
    </div>
</section>
<!-- Footer -->
<footer id="footer">
    <ul class="icons">
        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
        <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
        <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
    </ul>
    <ul class="copyright">
        <li>&copy; UNET Project. All rights reserved.</li><li>Designer: <strong>Alexander & Stefany</strong></li>
    </ul>
</footer>

</div>

<!-- Scripts -->
<!-- <script src="assets/js/jquery.min.js"></script> -->
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollgress.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
<script src="assets/js/app.js"></script>

</body>
</html>