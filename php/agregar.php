<?php
    require_once 'includes/validar_sesion.php';
?>
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar registro</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="includes/upload.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="serie" class="form-label">Serie</label>
                                <input type="text" id="serie" name="serie" class="form-control" value="<?php echo $_GET['id']; ?>" readonly>                              
                            </div>
                            <div class="mb-3">
                                <label for="serie" class="form-label">Inventario</label>
                                <input type="text" id="inv" name="inv" class="form-control" value="<?php echo $_GET['inv']; ?>" readonly>                              
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="tipo">Tipo de documento</label>
                                <select id="tipo" name="tipo">
                                    <option value="baja">Baja</option>
                                    <option value="resguardo">Resguardo</option>
                                    <option value="garantia">Garantia</option>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Archivo</label>
                        <input type="file" name="archivo" id="archivo" class="form-control" accept=".pdf" required>

                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>