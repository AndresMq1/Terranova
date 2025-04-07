<div class="modal fade" id="editarGanado{{ $ganado->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('ganado.update', $ganado->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Ganado</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="">Nombre de tu publicacion</label>
                    <input type="text" name="nombreProducto" value="{{ $ganado->producto->nombreProducto }}"
                        class="form-control mb-2" />
                    <label for="">Descripcion de tu publicacion</label>
                    <textarea name="descripcion" value="{{ $ganado->producto->descripcion }}"
                        class="form-control mb-2"></textarea>
                    <label for="">Precio del Animal</label>
                    <input type="number" name="precioProducto" value="{{ $ganado->producto->precioProducto }}"
                        class="form-control mb-2" />
                    <!--<label for="imagenes">Carga Tus Imagenes</label>
                <input type="file" name='imagenes[]' id="imagenes" multiple>-->
                    <label for="">Raza del Animal</label>
                    <input name="razaGanado" value="{{ $ganado->razaGanado }}" class="form-control mb-2" />
                    <label for="">Edad del Animal (En años)</label>
                    <input type="number" name="edadGanado" value="{{ $ganado->edadGanado }}"
                        class="form-control mb-2" />
                    <label for="">Peso del Animal (En KG)</label>
                    <input type="number" name="pesoGanado" value="{{ $ganado->pesoGanado }}"
                        class="form-control mb-2" />
                    <label for="">Genero del Animal</label>
                    <select name="generoGanado" id="">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                    <label for="">Tipo del Animal (Ej: vacuno, ovino, porcino, caprino, equino)</label>
                    <input name="tipoGanado" value="{{ $ganado->tipoGanado }}" class="form-control mb-2" />
                    <label for="">Ubicacion actual del Animal</label>
                    <input name="ubicacionGanado" value="{{ $ganado->ubicacionGanado }}" class="form-control mb-2" />
                    <label for="">Vacunas que posee el Animal</label>
                    <input name="vacunasGanado" value="{{ $ganado->vacunasGanado }}" class="form-control mb-2" />
                    <label for="">Cantidad de Animales con las mismas caracteristicas</label>
                    <input type="number" name="cantidadGanado" value="{{ $ganado->cantidadGanado }}"
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