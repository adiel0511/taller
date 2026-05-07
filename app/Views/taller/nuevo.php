<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title"><i class="bi bi-building-add me-2" style="color:var(--tr-orange);"></i>Nuevo <span>Taller</span></h2>
    <a href="<?= base_url('taller') ?>" class="btn btn-ghost"><i class="bi bi-arrow-left me-1"></i> Volver</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-toreto">
            <div class="card-header"><i class="bi bi-plus-circle me-2" style="color:var(--tr-orange);"></i>Registrar Taller</div>
            <div class="card-body p-4">
                <form action="<?= base_url('taller/guardar') ?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre del Taller *</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej: Toreto Central" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ciudad *</label>
                            <input type="text" name="ciudad" class="form-control" placeholder="Ej: San Salvador" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Ubicación / Dirección</label>
                            <input type="text" name="ubicacion" class="form-control" placeholder="Ej: Calle Principal #123">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Capacidad (vehículos)</label>
                            <input type="number" name="capacidad" class="form-control" placeholder="10" min="1">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Especialidad</label>
                            <select name="especialidad" class="form-select">
                                <option value="">Seleccione especialidad...</option>
                                <option>Mecánica General</option>
                                <option>Electricidad Automotriz</option>
                                <option>Carrocería y Pintura</option>
                                <option>Frenos y Suspensión</option>
                                <option>Motor y Transmisión</option>
                                <option>Diagnóstico Electrónico</option>
                                <option>Multimarca</option>
                            </select>
                        </div>
                        <div class="col-12 pt-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-toreto flex-fill">
                                    <i class="bi bi-floppy2 me-2"></i>Guardar Taller
                                </button>
                                <a href="<?= base_url('taller') ?>" class="btn btn-ghost">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
