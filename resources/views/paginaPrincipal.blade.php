<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/paginaPrincipal.css'])
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="marca-sitio" href="#">Terranova</a>
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="boton-nav me-2">Iniciar Sesión</a>
            </div>
        </div>
    </nav>  

    <!-- SECCION PRINCIPAL -->
    <section class="seccion-principal">
        <div class="capa-principal">
            <div class="container">
                <h2 class="titulo-principal">Puedes buscar por</h2>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4 text-center">
                        <button class="boton-busqueda w-100 mb-3"><a href="../PaginaPProductos/PaginaPProductos.html">Venta</a></button>
                        <button class="boton-busqueda w-100"><a href="../PaginaPProductos/PaginaPProductos.html">Arriendo</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-busqueda">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <select class="form-select">
                            <option selected disabled>Tipo de producto</option>
                            <option class="opciones" value="Finca">Finca</option>
                            <option class="opciones" value="Ganado">Ganado</option>
                            <option class="opciones" value="Terreno">Terreno</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="search" class="form-control" placeholder="Búsqueda por palabra clave">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION DE SERVICIOS -->
    <section class="container container-servicios">
        <h2 class="titulo-servicio">Mira cómo Terranova te puede ayudar</h2>
        <div class="row g-4">
            <div class="col-md-4 col-lg-2-4">
                <div class="tarjeta-servicio">
                    <i class="fa fa-home icono-servicio"></i>
                    <h3 class="titulo-tarjeta">Compra Propiedades y Ganado</h3>
                    <p class="texto-servicio">Encuentra y adquiere propiedades y ganado fácilmente.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-2-4">
                <div class="tarjeta-servicio">
                    <i class="fa fa-tractor icono-servicio"></i>
                    <h3 class="titulo-tarjeta">Renta Terrenos y Fincas</h3>
                    <p class="texto-servicio">Alquila terrenos y fincas con opciones ajustadas a tus necesidades.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-2-4">
                <div class="tarjeta-servicio">
                    <i class="fa fa-search icono-servicio"></i>
                    <h3 class="titulo-tarjeta">Búsqueda Personalizada</h3>
                    <p class="texto-servicio">Filtra propiedades y ganado para hallar justo lo que buscas.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-2-4">
                <div class="tarjeta-servicio"tarjeta-servicio>
                    <i class="fa fa-bullhorn icono-servicio"></i>
                    <h3 class="titulo-tarjeta">Vende Propiedades y Ganado</h3>
                    <p class="texto-servicio">Publica y gestiona la venta de tus propiedades y ganado.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-2-4">
                <div class="tarjeta-servicio">
                    <i class="fa fa-calendar-check icono-servicio"></i>
                    <h3 class="titulo-tarjeta">Agenda Citas Presenciales</h3>
                    <p class="texto-servicio">Puedes seleccionar un día y una hora de un calendario, así como reprogramar las citas.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-2-4">
                <div class="tarjeta-servicio">
                    <i class="fa fa-credit-card icono-servicio"></i>
                    <h3 class="titulo-tarjeta">Haz Tus Pagos Online</h3>
                    <p class="texto-servicio">Realiza pagos seguros de manera instantánea con múltiples opciones de pago.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- SECCION DE PRODUCTOS DESTACADOS -->
    <section class="container container-carrusel">
        <h2 class="titulo-carrusel">Productos Destacados</h2>
        <div id="carruselEjemplo" class="carousel slide carrusel-contenedor" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carruselEjemplo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carruselEjemplo" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carruselEjemplo" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/ofertaejecafetero-1400x428.jpg')}}" class="d-block w-100 carrusel-img" alt="Imagen 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Finca Los Alamos</h5>
                        <p>Hermosa finca en las afueras de medellin</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Vaca Lechera.png') }}" class="d-block w-100 carrusel-img" alt="Imagen 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Segunda diapositiva</h5>
                        <p>Descripción de la segunda diapositiva.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/ofertaejecafetero-1400x428.jpg')}}" class="d-block w-100 carrusel-img" alt="Imagen 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tercera diapositiva</h5>
                        <p>Descripción de la tercera diapositiva.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carruselEjemplo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselEjemplo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <!-- SECCION DEL FOOTER -->
    <section class="container-footer">
        <footer class="pie-de-pagina mt-5 pt-4">
            <div class="container">
            <div class="row">
                <!-- Sección Enlaces -->
                <div class="col-md-4 enlaces">
                <h5>Enlaces rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Propiedades</a></li>
                    <li><a href="#">Fincas</a></li>
                    <li><a href="#">Ganado</a></li>
                </ul>
                </div>
        
                <!-- Sección Contacto -->
                <div class="col-md-4 contacto">
                <h5>Contáctanos</h5>
                <p>Teléfono: +57 123 456 7890</p>
                <p>Correo: soporte@terranova.com</p>
                </div>
        
                <!-- Sección Redes Sociales -->
                <div class="col-md-4 redes-sociales">
                <h5>Síguenos</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="icono-red-social">Facebook</a>
                    <a href="#" class="icono-red-social">Instagram</a>
                    <a href="#" class="icono-red-social">Twitter</a>
                </div>
                </div>
            </div>
        
            <!-- Línea divisora -->
            <hr class="mt-4">
        
            <!-- Copyright -->
            <div class="text-center mt-3 derechos">
                <p>© 2024 Terranova. Todos los derechos reservados.</p>
            </div>
            </div>
        </footer>
    </section>
</body>
</html>