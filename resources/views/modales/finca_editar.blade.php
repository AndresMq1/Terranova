<div class="modal fade" id="editarFinca{{ $finca->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('finca.update', $finca->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Finca</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="">Nombre de la Finca</label>
                    <input type="text" name="nombreProducto" value="{{ $finca->producto->nombreProducto }}"
                        class="form-control mb-2" />
                    <label for="">Descripcion de la Finca</label>
                    <textarea name="descripcion"
                        class="form-control mb-2">{{ $finca->producto->descripcion }}</textarea>
                    <label for="">Precio de la Finca</label>
                    <input type="number" name="precioProducto"
                        value="{{ $finca->producto->precioProducto }}" class="form-control mb-2" />
                    <label for="">Ubicacion de la Finca</label>
                    <input type="text" name="ubicacionFinca" value="{{ $finca->ubicacionFinca }}"
                        class="form-control mb-2" />
                    <label for="">Espacio Total de la Finca</label>
                    <input type="text" name="espacioTotal" value="{{ $finca->espacioTotal }}"
                        class="form-control mb-2" />
                    <label for="">Cantidad de Habitaciones de la Finca</label>
                    <input type="text" name="numHabitaciones" value="{{ $finca->numHabitaciones }}"
                        class="form-control mb-2" />
                    <label for="">Cantidad de Baños de la Finca</label>
                    <input type="text" name="numBanos" value="{{ $finca->numBanos }}"
                        class="form-control mb-2" />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>