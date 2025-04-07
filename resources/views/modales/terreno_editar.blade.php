<div class="modal fade" id="editarTerreno{{ $terreno->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('terreno.update', $terreno->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Terreno</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="">Nombre del Terreno</label>
                    <input type="text" name="nombreProducto" value="{{ $terreno->producto->nombreProducto }}"
                        class="form-control mb-2" />
                        <label for="">Descripcion del Terreno</label>
                    <textarea name="descripcion" value="{{ $terreno->producto->descripcion }}"
                        class="form-control mb-2"></textarea>
                        <label for="">Precio del Terreno</label>
                    <input type="number" name="precioProducto" value="{{ $terreno->producto->precioProducto }}"
                        class="form-control mb-2" />
                        <label for="">Tamaño del Terreno (Especifica Medida. Ej: Hectareas, m3, Etc.)</label>
                    <input name="tamanoTerreno" value="{{ $terreno->tamanoTerreno }}" class="form-control mb-2" />
                    <label for="">Ubicacion del Terreno</label>
                    <input name="ubicacionTerreno" value="{{ $terreno->ubicacionTerreno }}" class="form-control mb-2" />
                    <label for="">Tipo del suelo (Ej: arcilloso, arenoso, franco, etc.)</label>
                    <input name="tipoSuelo" value="{{ $terreno->tipoSuelo }}"
                        class="form-control mb-2" />
                        <label for="">Tipografia del terreno (Ej: plano, ondulado, pendiente)</label>
                    <input name="tipografiaTerreno"
                        value="{{ $terreno->tipografiaTerreno }}"
                        class="form-control mb-2" />
                        <label for="">Fuentes de Agua del Terreno (Ej: pozo, río, canal de riego)</label>
                    <input name="fuentesAgua" value="{{ $terreno->fuentesAgua }}"
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