<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title"><i class="bi bi-car-front me-2" style="color:var(--tr-orange);"></i>Nuevo <span>Vehículo</span></h2>
    <a href="<?= base_url('vehiculo/deku') ?>" class="btn btn-ghost"><i class="bi bi-arrow-left me-1"></i> Volver</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-toreto">
            <div class="card-header"><i class="bi bi-plus-circle me-2" style="color:var(--tr-orange);"></i>Registrar Vehículo</div>
            <div class="card-body p-4">
                <form action="<?= base_url('vehiculo/guardar') ?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Placa *</label>
                            <input type="text" name="placa" class="form-control" placeholder="Ej: ABC-1234" required style="text-transform:uppercase;">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Marca *</label>
                            <input type="text" name="marca" class="form-control" placeholder="Ej: Toyota" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Modelo *</label>
                            <input type="text" name="modelo" class="form-control" placeholder="Ej: Corolla" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Año</label>
                            <input type="number" name="anio" class="form-control" placeholder="<?= date('Y') ?>" min="1960" max="<?= date('Y')+1 ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tipo de Servicio</label>
                            <select name="tipo_servicio" class="form-select">
                                <option value="">Seleccione...</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                                <option value="Reparacion">Reparación</option>
                                <option value="Urgente">Urgente</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Taller Asignado</label>
                            <select name="taller_id" class="form-select">
                                <option value="">Sin asignar</option>
                                <?php foreach($datos as $t): ?>
                                <option value="<?= $t['id'] ?>"><?= esc($t['nombre']) ?> — <?= esc($t['ciudad']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 pt-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-toreto flex-fill">
                                    <i class="bi bi-floppy2 me-2"></i>Guardar Vehículo
                                </button>
                                <a href="<?= base_url('vehiculo/deku') ?>" class="btn btn-ghost">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
