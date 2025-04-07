<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h2 class="mb-4 text-primary">Calendarios disponibles</h2>

    @foreach ($calendarios as $cal)
    <div class="card mb-3">
        <div class="card-body">
            
            <h5 class="card-title">{{ $cal->Ubicacion }}</h5>
            <p class="card-text">📅 {{ \Carbon\Carbon::parse($cal->fechaDisponible)->format('d/m/Y') }}</p>
            <p class="card-text">🕑 {{ \Carbon\Carbon::parse($cal->horaInicio)->format('g:i A') }}</p>
            <p class="card-text">🕑 {{ \Carbon\Carbon::parse($cal->horaFin)->format('g:i A') }}</p>
            
            <form action="{{ route('citas.store') }}" method="POST" onsubmit="return confirmarAgendamiento()">
                @csrf
                <input type="hidden" name="id_Calendario" value="{{ $cal->id_Calendario }}">
                <button type="submit" class="btn btn-success">Agendar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<script>
    function confirmarAgendamiento() {
        return confirm("¿Estás seguro de que quieres agendar esta cita?");
    }
</script>
</body>
</html>