<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi calendario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <h2 class="text-primary">Mis Calendarios</h2>

    <button class="btn btn-primary my-3 mb-5" data-bs-toggle="modal" data-bs-target="#crearCalendarioModal">
        Crear nuevo calendario
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calendario as $cal)
                <tr>
                    <td>{{ $cal->fechaDisponible }}</td>
                    <td>{{ $cal->horaInicio }}</td>
                    <td>{{ $cal->horaFin }}</td>
                    <td>{{ $cal->Ubicacion }}</td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ActualizarCalendarioModal{{$cal->id_Calendario}}">Actualizar</a>
                        <form action="{{ route('calendarios.destroy', $cal->id_Calendario) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este calendario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                   
                    </td>
                </tr>
                <!-- Modal Actualizar -->
                <div class="modal fade" id="ActualizarCalendarioModal{{$cal->id_Calendario}}" tabindex="-1" aria-labelledby="ActualizarCalendarioModal" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('calendarios.update', $cal->id_Calendario) }}" method="POST">
                        
                        @method('PUT')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Crear Calendario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <label>Fecha</label>
                                <input type="date" name="fechaDisponible" class="form-control" value="{{$cal->fechaDisponible}}">

                                <label>Hora Inicio</label>
                                <input type="time" name="horaInicio" class="form-control" value="{{$cal->horaInicio}}" required>

                                <label>Hora Fin</label>
                                <input type="time" name="horaFin" class="form-control" value="{{$cal->horaFin}}" required>

                                <label>Ubicación</label>
                                <input type="text" name="Ubicacion" class="form-control" value="{{$cal->Ubicacion}}" required>
                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div> 


            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Crear -->


<div class="modal fade" id="crearCalendarioModal" tabindex="-1" aria-labelledby="crearCalendarioModal" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('calendarios.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Calendario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label>Fecha</label>
                <input type="date" name="fechaDisponible" class="form-control" required>

                <label>Hora Inicio</label>
                <input type="time" name="horaInicio" class="form-control" required>

                <label>Hora Fin</label>
                <input type="time" name="horaFin" class="form-control" required>

                <label>Ubicación</label>
                <input type="text" name="Ubicacion" class="form-control" required>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </form>
  </div>
</div> 


</body>
</html>