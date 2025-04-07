<div class="modal fade" id="eliminarFinca{{ $finca->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('finca.destroy', $finca->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Finca</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar esta finca?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>