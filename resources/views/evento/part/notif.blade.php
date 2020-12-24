<script>
    //Elimina las filas de la tabla
        $(function eliminarfila() {
            $(document).on('click', 'button.btn-danger', function ()
            {
                if ($(this).val()) {
                    document.getElementById("accion[" + $(this).val() + "]").value= 'borrar';
                    $(this).closest('tr').attr('hidden',true);
                }
                else {
                    $(this).closest('tr').remove();
                };

            });
        });
    </script>

    <script>
        function agregarFila(){
            var table = document.getElementById("tablaNoti");
            var row = table.insertRow(-1);

            //var cellid = row.insertCell(0);
            var cellNoti = row.insertCell(0);
            var cellCant = row.insertCell(1);
            var cellDura = row.insertCell(2);
            var cellBorra = row.insertCell(3);
            //cellid.innerHTML = '<input name="id[]" type="hidden" value="">';
            cellNoti.innerHTML = '<select name="tipoNoti[]" class="form-control form-control-sm"> <option value="1">Notificación</option> <option value="2">correo electrónico</option> </select>';
            cellCant.innerHTML = '<input name="cantidad[]" type="text" min="5" max="366" value="5" placeholder= "99" class="form-control">';
            cellDura.innerHTML = '<select name="duracion[]" class="form-control form-control-sm"> <option value="mi">Minutos</option> <option value="hh">Horas</option> <option value="dd">Días</option> </select>';
            cellBorra.innerHTML = '<input type="hidden" name="accion[]" value=""><button type="button" name="borrar[]" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-sm" data-original-title="Eliminar Registro"> <a> <i class="fa fa-trash"></i> </a> </button> <input name="id[]" type="hidden" value="">';
        }

        function cambioData (idCambio) {
            document.getElementById("accion[" + idCambio + "]").value= 'actualizar';
        }
    </script>
