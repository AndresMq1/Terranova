@extends('layouts.app')
@section('navbar')
    @vite(['resources/css/PaginaPrincipalVendedor.css'])
    <nav class="navbar navbar-expand-lg bg-light shadow">
        <div class="container">
            <a class="navbar-brand marca-sitio" href="{{ url('/') }}">Terranova</a>
            <div class="dropdown ms-auto contenedor-boton-menu">
                <i class="fa fa-bars icono-barras"></i>
                <button class="btn btn-dark rounded-circle" type="button" id="userMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <p class="letra">{{ substr(Auth::user()->name, 0, 1) }}</p>
                </button>
                <ul class="dropdown-menu dropdown-menu-end contenedor-menu" aria-labelledby="userMenuButton">
                    <li><a class="dropdown-item" href="#">Notificaciones <span class="punto-notificacion"></span></a></li>
                    <li><a class="dropdown-item" href="#">Mensajes</a></li>
                    <li><a class="dropdown-item" href="#">Listas de Favoritos</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Centro de Ayuda</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="dashboard-container">
            <aside id="sidebar" class="dashboard-sidebar">
                <!-- Botón de alternancia -->
                <button id="toggleSidebar" class="toggle-sidebar-btn">
                    <i class="fas fa-bars boton-alternancia"></i>
                </button>
                <h2 id="sidebarTitle">Opciones</h2>

                @if(Auth::user()->cod_tipo_fk == "V")
                    <ul class="menu">
                        <li class="botones-sidebar" class="botonSBInicio"><a href="{{ route('home') }}"
                                class="active"><i class="fas fa-home"></i><span> Inicio</span></a></li>
                        <li class="botones-sidebar"><a href="../Dashboard Vendedor/DashboardVendedor.html"><i
                                    class="fas fa-chart-line"></i><span> Análisis de Ventas</span></a></li>
                        <li class="botones-sidebar"><a href="{{ route('calendario.vendedor') }}"><i
                                    class="fas fa-calendar-alt"></i><span> Gestión de Citas</span></a></li>
                        <li class="botones-sidebar"><a href="../Terranova web2/FormularioContrato.html"><i
                                    class="fas fa-file-contract"></i><span> Contratos</span></a></li>
                        <li class="botones-sidebar"><a href="../Terranova web/Clausulas.html"><i
                                    class="fa-solid fa-paperclip"></i><span> Clausulas</span></a></li>
                        <li class="botones-sidebar"><a href="../Notificaciones Vendedor/notificacionesVendedor.html"><i
                                    class="fas fa-solid fa-envelope"></i><span> Notificaciones</span></a></li>
                        <li class="botones-sidebar"><a href="../Pagos Vendedor/pagosVendedor.html"><i
                                    class="fas fa-money-bill-wave"></i><span> Pagos</span></a></li>
                        <li class="botones-sidebar"><a href="../Editar Perfil Vendedor/editarperfilVendedor.html"><i
                                    class="fas fa-cog"></i><span> Configuración</span></a></li>
                        <li class="botones-sidebar"><a href="../Inicio Sesion/InicioSesion.html"><i
                                    class="fas fa-sign-out-alt"></i><span> Cerrar Sesión</span></a></li>
                    </ul>
                @else
                    <ul class="menu">
                        <li class="botones-sidebar" class="botonSBInicio"><a href="Pagina Principal Comprador.html"
                                class="active"><i class="fas fa-home"></i><span> Inicio</span></a></li>
                        <li class="botones-sidebar"><a href="../Carrito de compras/carritocompras.html"><i
                                    class="fas fa-cart-shopping"></i><span> Carrito de compras</span></a></li>
                        <li class="botones-sidebar"><a href="../historialCompras/historialcompras.html"><i
                                    class="fas fa-chart-line"></i><span> Historial de compras</span></a></li>
                        <li class="botones-sidebar"><a href="../citasComprador/citascomprador.html"><i
                                    class="fas fa-calendar-alt"></i><span> Gestión de Citas</span></a></li>
                        <li class="botones-sidebar"><a href="../contratosComprador/contratocomprador.html"><i
                                    class="fas fa-file-contract"></i><span> Contratos Activos</span></a></li>
                        <li class="botones-sidebar"><a href="../notificacionesComprador/notificacionesComprador.html"><i
                                    class="fas fa-solid fa-envelope"></i><span> Notificaciones</span></a></li>
                        <li class="botones-sidebar"><a href="../Editar Perfil Comprador/configuracioncomprador.html"><i
                                    class="fas fa-cog"></i><span> Configuración</span></a></li>
                        <li class="botones-sidebar"><a href="../Inicio Sesion/InicioSesion.html"><i
                                    class="fas fa-sign-out-alt"></i><span> Cerrar Sesión</span></a></li>
                    </ul>
                @endif
            </aside>

            <main class="dashboard-main">
                <header>
                    @if(Auth::user()->cod_tipo_fk == "V")
                        <!-- CONTENIDO PARA VENDEDOR -->
                        <div class="contenedorTitulo">
                            <div class="tituloYParrafoIzquierda">
                                <h1>{{ Auth::user()->name }} - Vendedor</h1>
                                <p class="parrafoBajotitulo">Gestióna y controla tus propiedades y ventas</p>
                            </div>
                            <div class="botonDerecha">
                                <button class="botones-sidebar botonCrear" data-bs-toggle="modal"
                                    data-bs-target="#tipoProductoModal">Crear Producto</button>
                            </div>

                            <!--Modal para seleccionar el tipo de producto-->
                            <div class="modal fade" id="tipoProductoModal" tabindex="-1"
                                aria-labelledby="tipoProductoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content p-4 modalEjegirTipo">
                                        <br>
                                        <h5 class="modal-title mb-3 text-center" id="tipoProductoModalLabel">Selecciona el tipo
                                            de producto</h5>
                                        <div class="d-flex justify-content-around">
                                            <button class="botones-sidebar botonTipoProducto"
                                                onclick="mostrarFormulario('finca')"><img src="images/icono casa.png" alt="">
                                                <p>Finca</p>
                                            </button>
                                            <button class="botones-sidebar botonTipoProducto"
                                                onclick="mostrarFormulario('ganado')"><img src="images/icono vaca.png" alt="">
                                                <p>Ganado</p>
                                            </button>
                                            <button class="botones-sidebar botonTipoProducto"
                                                onclick="mostrarFormulario('terreno')"><img src="images/icono terreno.png"
                                                    alt="">
                                                <p>Terreno</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Modal para el formulario-->
                            <div class="modal fade" id="formularioModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content p-4">
                                        <div id="formularioContenido"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="formularios" class="d-none">
                                <div id="form-finca">
                                    <h5>Formulario de Finca</h5>
                                    <form action="{{ route('finca.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Campos de finca -->
                                        <input type="text" name="nombreProducto" placeholder="Nombre de la Finca"
                                            class="form-control mb-2" />
                                        <textarea name="descripcion" placeholder="Descripcion de la Finca"
                                            class="form-control mb-2"></textarea>
                                        <input type="number" name="precioProducto" placeholder="Precio de la Finca"
                                            class="form-control mb-2" />
                                        <label for="imagenes">Carga Tus Imagenes</label>
                                        <input type="file" name='imagenes[]' id="imagenes" multiple>
                                        <input name="espacioTotal"
                                            placeholder="Espacio total (Especifica unidad Ej: Hectareas, m2, m3)"
                                            class="form-control mb-2" />
                                        <input name="espacioConstruido"
                                            placeholder="Espacio Construido (Especifica unidad Ej: Hectareas, m2, m3)"
                                            class="form-control mb-2" />
                                        <label for="">Estrato de la finca</label>
                                        <select name="estratoFinca">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                        <input type="number" name="numHabitaciones" placeholder="Numero de Habitaciones"
                                            class="form-control mb-2" />
                                        <input type="number" name="numBanos" placeholder="Numero de Baños"
                                            class="form-control mb-2" />
                                        <input name="ubicacionFinca" placeholder="Ubicacion de la Finca"
                                            class="form-control mb-2" />
                                        <button type="submit" class="btn btn-success mt-2">Guardar Finca</button>
                                    </form>
                                </div>

                                <div id="form-ganado">
                                    <h5>Formulario de Ganado</h5>
                                    <form action="{{ route('ganado.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Campos de ganado -->
                                        <input type="text" name="nombreProducto" placeholder="Nombre de tu publicacion"
                                            class="form-control mb-2" />
                                        <textarea name="descripcion" placeholder="Descripcion de tu publicacion"
                                            class="form-control mb-2"></textarea>
                                        <input type="number" name="precioProducto" placeholder="Precio del Animal"
                                            class="form-control mb-2" />
                                        <label for="imagenes">Carga Tus Imagenes</label>
                                        <input type="file" name='imagenes[]' id="imagenes" multiple>
                                        <input name="razaGanado" placeholder="Raza del Animal" class="form-control mb-2" />
                                        <input type="number" name="edadGanado" placeholder="Edad del Animal (En años)"
                                            class="form-control mb-2" />
                                        <input type="number" name="pesoGanado" placeholder="Peso del Animal (En KG)"
                                            class="form-control mb-2" />
                                        <label for="">Genero del Animal</label>
                                        <select name="generoGanado" id="">
                                            <option value="Macho">Macho</option>
                                            <option value="Hembra">Hembra</option>
                                        </select>
                                        <input name="tipoGanado"
                                            placeholder="Tipo del Animal (Ej: vacuno, ovino, porcino, caprino, equino)"
                                            class="form-control mb-2" />
                                        <input name="ubicacionGanado" placeholder="Ubicacion actual del Animal"
                                            class="form-control mb-2" />
                                        <input name="vacunasGanado" placeholder="Vacunas que posee el Animal"
                                            class="form-control mb-2" />
                                        <input type="number" name="cantidadGanado"
                                            placeholder="Cantidad de Animales con las mismas caracteristicas"
                                            class="form-control mb-2" />
                                        <button type="submit" class="btn btn-warning mt-2">Guardar Ganado</button>
                                    </form>
                                </div>

                                <div id="form-terreno">
                                    <h5>Formulario de Terreno</h5>
                                    <form action="{{ route('terreno.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Campos de terreno -->
                                        <input type="text" name="nombreProducto" placeholder="Nombre de tu Publicacion"
                                            class="form-control mb-2" />
                                        <textarea name="descripcion" placeholder="Descripcion de tu publicacion"
                                            class="form-control mb-2"></textarea>
                                        <input type="number" name="precioProducto" placeholder="Precio del Terreno"
                                            class="form-control mb-2" />
                                        <label for="imagenes">Carga Tus Imagenes</label>
                                        <input type="file" name='imagenes[]' id="imagenes" multiple>
                                        <input name="tamanoTerreno"
                                            placeholder="Tamaño del Terreno (Especifica Medida. Ej: Hectareas, m3, Etc.)"
                                            class="form-control mb-2" />
                                        <input name="ubicacionTerreno" placeholder="Ubicacion del Terreno"
                                            class="form-control mb-2" />
                                        <input name="tipoSuelo"
                                            placeholder="Tipo del suelo (Ej: arcilloso, arenoso, franco, etc.)"
                                            class="form-control mb-2" />
                                        <input name="tipografiaTerreno"
                                            placeholder="Tipografia del terreno (Ej: plano, ondulado, pendiente)"
                                            class="form-control mb-2" />
                                        <input name="fuentesAgua"
                                            placeholder="Fuentes de Agua del Terreno (Ej: pozo, río, canal de riego)"
                                            class="form-control mb-2" />
                                        <button type="submit" class="btn btn-info mt-2">Guardar Terreno</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            function mostrarFormulario(tipo) {
                                const contenido = document.getElementById('formularioContenido');
                                const formularios = {
                                    finca: document.getElementById('form-finca'),
                                    ganado: document.getElementById('form-ganado'),
                                    terreno: document.getElementById('form-terreno')
                                };
                                contenido.innerHTML = formularios[tipo].innerHTML;
                                new bootstrap.Modal(document.getElementById('formularioModal')).show();
                                bootstrap.Modal.getInstance(document.getElementById('tipoProductoModal')).hide();
                            }
                        </script>
                        <!-- FINCAS -->
                        @foreach($fincas as $finca)
                            <div class="card mb-3">
                                <div class="col-12 mb-4">
                                    <div class="card-horizontal">
                                        <div class="row g-0">
                                            <div class="col-md-4 card-img-container">
                                                @if ($finca->imagenes->isNotEmpty())
                                                    <img src="{{ asset('storage/' . $finca->imagenes->first()->path) }}"
                                                        class="horizontal-img">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body-horizontal">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <h5 class="card-title">{{ $finca->producto->nombreProducto }}</h5>
                                                        <div class="contorno-tipo">Venta</div>
                                                    </div>
                                                    <p class="card-description mb-3"><strong>Descripcion:
                                                        </strong>{{ $finca->producto->descripcion }}</p>
                                                    <p class="card-description mb-3"><strong>Ubicacion:
                                                        </strong>{{ $finca->ubicacionFinca }}</p>
                                                    <div class="property-features mb-3">
                                                        <span class="feature"><i
                                                                class="fas fa-vector-square me-1"></i><strong>{{ $finca->espacioTotal }}</strong></span>
                                                        <span class="feature"><i
                                                                class="fas fa-bed me-1"></i><strong>{{ $finca->numHabitaciones }}</strong></span>
                                                        <span class="feature"><i
                                                                class="fas fa-bath me-1"></i><strong>{{ $finca->numBanos }}</strong></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <p class="card-text">${{ number_format($finca->producto->precioProducto) }}
                                                        </p>
                                                        <div>
                                                            <button class="btn btn-cartas btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#editarFinca{{ $finca->id }}"><i
                                                                    class="fas fa-pencil-alt"></i></button>
                                                            <button class="btn btn-cartas btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#eliminarFinca{{ $finca->id }}"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('modales.finca_editar', ['finca' => $finca])
                            @include('modales.finca_eliminar', ['finca' => $finca])
                        @endforeach


                        <!-- GANADOS -->
                        @foreach($ganados as $ganado)
                            <div class="col-12 mb-4">
                                <div class="card-horizontal">
                                    <div class="row g-0">
                                        <div class="col-md-4 card-img-container">
                                            @if ($ganado->imagenes->isNotEmpty())
                                                <img src="{{ asset('storage/' . $ganado->imagenes->first()->path) }}"
                                                    class="horizontal-img">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body-horizontal">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h5 class="card-title">{{ $ganado->producto->nombreProducto }}</h5>
                                                    <div class="contorno-tipo">Venta</div>
                                                </div>
                                                <p class="card-description mb-3"><strong>Descripcion:
                                                    </strong>{{ $ganado->producto->descripcion }}</p>
                                                <p class="card-description mb-3"><strong>Ubicacion:
                                                    </strong>{{ $ganado->ubicacionGanado }}</p>
                                                <div class="property-features mb-3">
                                                    <span class="feature">
                                                        <i class="fas fa-dna me-1"></i><strong>{{ $ganado->razaGanado }}</strong>
                                                    </span>
                                                    <span class="feature">
                                                        <i class="fas fa-birthday-cake me-1"></i><strong>{{ $ganado->edadGanado }}
                                                            Años</strong>
                                                    </span>
                                                    <span class="feature">
                                                        <i class="fas fa-weight me-1"></i><strong>{{ $ganado->pesoGanado }}</strong>
                                                    </span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <p class="card-text">${{ number_format($ganado->producto->precioProducto) }}</p>
                                                    <div>
                                                        <button class="btn btn-cartas btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editarGanado{{ $ganado->id }}"><i
                                                                class="fas fa-pencil-alt"></i></button>
                                                        <button class="btn btn-cartas btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#eliminarGanado{{ $ganado->id }}"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('modales.ganado_editar', ['ganado' => $ganado])
                            @include('modales.ganado_eliminar', ['ganado' => $ganado])
                        @endforeach


                        <!-- TERRENOS -->
                        @foreach($terrenos as $terreno)
                            <div class="col-12 mb-4">
                                <div class="card-horizontal">
                                    <div class="row g-0">
                                        <div class="col-md-4 card-img-container">
                                            @if ($terreno->imagenes->isNotEmpty())
                                                <img src="{{ asset('storage/' . $terreno->imagenes->first()->path) }}"
                                                    class="horizontal-img">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body-horizontal">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h5 class="card-title">{{ $terreno->producto->nombreProducto }}</h5>
                                                    <div class="contorno-tipo">Venta</div>
                                                </div>
                                                <p class="card-description mb-3"><strong>Descripcion:
                                                    </strong>{{ $terreno->producto->descripcion }}</p>
                                                <p class="card-description mb-3"><strong>Ubicacion:
                                                    </strong>{{ $terreno->ubicacionTerreno }}</p>
                                                <div class="property-features mb-3">
                                                    <span class="feature">
                                                        <i
                                                            class="fas fa-mountain me-1"></i><strong>{{ $terreno->tipografiaTerreno }}</strong>
                                                    </span>
                                                    <span class="feature">
                                                        <i
                                                            class="fas fa-expand me-1"></i><strong>{{ $terreno->tamanoTerreno }}</strong>
                                                    </span>
                                                    <span class="feature">
                                                        <i class="fas fa-tree me-1"></i><strong>{{ $terreno->tipoSuelo }}</strong>
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <p class="card-text">${{ number_format($terreno->producto->precioProducto) }}
                                                    </p>
                                                    <div>
                                                        <button class="btn btn-cartas btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editarTerreno{{ $terreno->id }}"><i
                                                                class="fas fa-pencil-alt"></i></button>
                                                        <button class="btn btn-cartas btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#eliminarTerreno{{ $terreno->id }}"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('modales.terreno_editar', ['terreno' => $terreno])
                            @include('modales.terreno_eliminar', ['terreno' => $terreno])
                        @endforeach
                    @else
                        <!-- CONTENIDO PARA COMPRADOR -->
                        <div class="contenedorTitulo">
                            <div class="tituloYParrafoIzquierda">
                                <h1>{{ Auth::user()->name }} - Comprador</h1>
                                <p class="parrafoBajotitulo">Explora y encuentra las mejores propiedades rurales, ganado o
                                    terreno</p>
                            </div>
                            <div class="botonDerecha">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar propiedades...">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Filtros para buscar propiedades -->
                        <form method="GET" action="{{ route('home') }}" class="row mb-4">
                            <div class="col-md-4">
                                <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre" value="{{ request('nombre') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="precio" class="form-control">
                                    <option value="">Filtrar por precio</option>
                                    <option value="1" {{ request('precio') == '1' ? 'selected' : '' }}>Menos de $100.000</option>
                                    <option value="2" {{ request('precio') == '2' ? 'selected' : '' }}>$100.000 - $500.000</option>
                                    <option value="3" {{ request('precio') == '3' ? 'selected' : '' }}>Más de $500.000</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="tipo" class="form-control">
                                    <option value="">Filtrar por tipo</option>
                                    <option value="finca" {{ request('tipo') == 'finca' ? 'selected' : '' }}>Finca</option>
                                    <option value="ganado" {{ request('tipo') == 'ganado' ? 'selected' : '' }}>Ganado</option>
                                    <option value="terreno" {{ request('tipo') == 'terreno' ? 'selected' : '' }}>Terreno</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">Limpiar filtros</a>
                            </div>
                        </form>

                        <!-- Listado de propiedades disponibles para COMPRADOR -->
                        <h3 class="mb-3">Propiedades destacadas</h3>

                        @if (Auth::user()->cod_tipo_fk == "C")
                            <!-- FINCAS -->
                            @foreach($fincas as $finca)
                                <div class="card mb-3">
                                    <div class="col-12 mb-4">
                                        <div class="card-horizontal">
                                            <div class="row g-0">
                                                <div class="col-md-4 card-img-container">
                                                    @if ($finca->imagenes->isNotEmpty())
                                                        <img src="{{ asset('storage/' . $finca->imagenes->first()->path) }}"
                                                            class="horizontal-img">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body-horizontal">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h5 class="card-title">{{ $finca->producto->nombreProducto }}</h5>
                                                            <div class="contorno-tipo">Venta</div>
                                                        </div>
                                                        <p class="card-description mb-3"><strong>Descripcion:
                                                            </strong>{{ $finca->producto->descripcion }}</p>
                                                        <p class="card-description mb-3"><strong>Ubicacion:
                                                            </strong>{{ $finca->ubicacionFinca }}</p>
                                                        <div class="property-features mb-3">
                                                            <span class="feature"><i
                                                                    class="fas fa-vector-square me-1"></i><strong>{{ $finca->espacioTotal }}</strong></span>
                                                            <span class="feature"><i
                                                                    class="fas fa-bed me-1"></i><strong>{{ $finca->numHabitaciones }}</strong></span>
                                                            <span class="feature"><i
                                                                    class="fas fa-bath me-1"></i><strong>{{ $finca->numBanos }}</strong></span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <p class="card-text">${{ number_format($finca->producto->precioProducto) }}
                                                            </p>
                                                            <div>
                                                                <button id="view-button" class="btn btn-primary btn-sm"><i
                                                                        class="fas fa-eye me-1"></i><a href="{{ route('citas.cliente') }}" style="text-decoration: none; color: white;">Agendar Cita</a></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <!-- GANADOS -->
                            @foreach($ganados as $ganado)
                                <div class="col-12 mb-4">
                                    <div class="card-horizontal">
                                        <div class="row g-0">
                                            <div class="col-md-4 card-img-container">
                                                @if ($ganado->imagenes->isNotEmpty())
                                                    <img src="{{ asset('storage/' . $ganado->imagenes->first()->path) }}"
                                                        class="horizontal-img">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body-horizontal">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <h5 class="card-title">{{ $ganado->producto->nombreProducto }}</h5>
                                                        <div class="contorno-tipo">Venta</div>
                                                    </div>
                                                    <p class="card-description mb-3"><strong>Descripcion:
                                                        </strong>{{ $ganado->producto->descripcion }}</p>
                                                    <p class="card-description mb-3"><strong>Ubicacion:
                                                        </strong>{{ $ganado->ubicacionGanado }}</p>
                                                    <div class="property-features mb-3">
                                                        <span class="feature">
                                                            <i class="fas fa-dna me-1"></i><strong>{{ $ganado->razaGanado }}</strong>
                                                        </span>
                                                        <span class="feature">
                                                            <i class="fas fa-birthday-cake me-1"></i><strong>{{ $ganado->edadGanado }}
                                                                Años</strong>
                                                        </span>
                                                        <span class="feature">
                                                            <i class="fas fa-weight me-1"></i><strong>{{ $ganado->pesoGanado }}</strong>
                                                        </span>
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <p class="card-text">${{ number_format($ganado->producto->precioProducto) }}</p>
                                                        <div>
                                                            <button id="view-button" class="btn btn-primary btn-sm"><i
                                                                    class="fas fa-eye me-1"></i><a href="{{ route('citas.cliente') }}" style="text-decoration: none; color: white;">Agendar Cita</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <!-- TERRENOS -->
                            @foreach($terrenos as $terreno)
                                <div class="col-12 mb-4">
                                    <div class="card-horizontal">
                                        <div class="row g-0">
                                            <div class="col-md-4 card-img-container">
                                                @if ($terreno->imagenes->isNotEmpty())
                                                    <img src="{{ asset('storage/' . $terreno->imagenes->first()->path) }}"
                                                        class="horizontal-img">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body-horizontal">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <h5 class="card-title">{{ $terreno->producto->nombreProducto }}</h5>
                                                        <div class="contorno-tipo">Venta</div>
                                                    </div>
                                                    <p class="card-description mb-3"><strong>Descripcion:
                                                        </strong>{{ $terreno->producto->descripcion }}</p>
                                                    <p class="card-description mb-3"><strong>Ubicacion:
                                                        </strong>{{ $terreno->ubicacionTerreno }}</p>
                                                    <div class="property-features mb-3">
                                                        <span class="feature">
                                                            <i
                                                                class="fas fa-mountain me-1"></i><strong>{{ $terreno->tipografiaTerreno }}</strong>
                                                        </span>
                                                        <span class="feature">
                                                            <i
                                                                class="fas fa-expand me-1"></i><strong>{{ $terreno->tamanoTerreno }}</strong>
                                                        </span>
                                                        <span class="feature">
                                                            <i class="fas fa-tree me-1"></i><strong>{{ $terreno->tipoSuelo }}</strong>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <p class="card-text">${{ number_format($terreno->producto->precioProducto) }}
                                                        </p>
                                                        <div>
                                                            <button id="view-button" class="btn btn-primary btn-sm"><i
                                                                    class="fas fa-eye me-1"></i><a href="{{ route('citas.cliente') }}" style="text-decoration: none; color: white;">Agendar Cita</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-info">
                                No hay propiedades disponibles en este momento.
                            </div>
                        @endif
                    @endif
                </header>
            </main>
        </div>

        <script>
            // Lógica para alternar el sidebar
            const toggleSidebarButton = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            toggleSidebarButton.addEventListener('click', () => {
                sidebar.classList.toggle('compact');
                mainContent.classList.toggle('compact');
            });

            // Lógica para pantallas pequeñas
            toggleSidebarButton.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.toggle('open');
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection