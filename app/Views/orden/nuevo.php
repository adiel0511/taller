<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title"><i class="bi bi-clipboard2-plus me-2" style="color:var(--tr-orange);"></i>Nueva <span>Orden de Servicio</span></h2>
    <a href="<?= base_url('orden') ?>" class="btn btn-ghost"><i class="bi bi-arrow-left me-1"></i> Volver</a>
</div>

<div class="card-toreto">
    <div class="card-header"><i class="bi bi-pencil-square me-2" style="color:var(--tr-orange);"></i>Datos de la Orden</div>
    <div class="card-body p-4">
        <form action="<?= base_url('orden/guardar') ?>" method="post">
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Vehículo *</label>
                    <select name="vehiculo_id" class="form-select" required>
                        <option value="">Seleccione vehículo...</option>
                        <?php foreach($vehiculos as $v): ?>
                        <option value="<?= $v['id'] ?>"><?= esc($v['placa']) ?> — <?= esc($v['marca']) ?> <?= esc($v['modelo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Estado *</label>
                    <select name="estado" class="form-select" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Completado">Completado</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha Estimada de Fin</label>
                    <input type="date" name="fecha_fin" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Diagnóstico / Descripción *</label>
                    <textarea name="diagnostico" class="form-control" rows="3" placeholder="Describe el problema o servicio requerido..." required></textarea>
                </div>
            </div>

            <!-- REPUESTOS -->
            <div class="card-toreto mb-4" style="border-color:rgba(244,128,26,.2);">
                <div class="card-header" style="background:rgba(244,128,26,.08);border-color:rgba(244,128,26,.2);">
                    <i class="bi bi-gear-wide-connected me-2" style="color:var(--tr-orange);"></i>Repuestos a Utilizar
                </div>
                <div class="card-body p-3">
                    <table class="table table-t mb-2" id="tabla-repuestos">
                        <thead>
                            <tr>
                                <th>Repuesto</th>
                                <th style="width:130px;" class="text-center">Cantidad</th>
                                <th style="width:80px;" class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="contenedor-filas"></tbody>
                    </table>
                    <button type="button" class="btn btn-ghost btn-sm" onclick="agregarFila()">
                        <i class="bi bi-plus-circle me-1"></i> Añadir repuesto
                    </button>
                </div>
            </div>

            <template id="fila-template">
                <tr>
                    <td>
                        <select name="repuesto_id[]" class="form-select form-select-sm" required>
                            <option value="">Seleccione repuesto...</option>
                            <?php foreach($repuestos as $r): ?>
                            <option value="<?= $r['id'] ?>"><?= esc($r['nombre']) ?> — $<?= number_format($r['precio'],2) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td class="text-center">
                        <input type="number" name="cantidad[]" class="form-control form-control-sm text-center" value="1" min="1" required>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-del btn-sm" onclick="eliminarFila(this)">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </td>
                </tr>
            </template>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-toreto flex-fill">
                    <i class="bi bi-floppy2 me-2"></i>Crear Orden de Servicio
                </button>
                <a href="<?= base_url('orden') ?>" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
function agregarFila(){
    const t=document.getElementById('fila-template').content.cloneNode(true);
    document.getElementById('contenedor-filas').appendChild(t);
}
function eliminarFila(btn){
    const filas=document.querySelectorAll('#contenedor-filas tr');
    if(filas.length>1) btn.closest('tr').remove();
    else alert('Debe haber al menos un repuesto.');
}
window.onload=agregarFila;
</script>
<?= $this->endSection() ?>
