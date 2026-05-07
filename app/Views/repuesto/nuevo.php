<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title"><i class="bi bi-gear me-2" style="color:var(--tr-orange);"></i>Nuevo <span>Repuesto</span></h2>
    <a href="<?= base_url('repuesto') ?>" class="btn btn-ghost">
        <i class="bi bi-arrow-left me-1"></i> Volver
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card-toreto">
            <div class="card-header"><i class="bi bi-plus-circle me-2" style="color:var(--tr-orange);"></i>Registrar Repuesto</div>
            <div class="card-body p-4">
                <form action="<?= base_url('repuesto/guardar') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Repuesto</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej: Filtro de aceite" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio ($)</label>
                        <input type="number" name="precio" class="form-control" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Stock (unidades)</label>
                        <input type="number" name="stock" class="form-control" placeholder="0" min="0" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-toreto flex-fill">
                            <i class="bi bi-floppy2 me-2"></i>Guardar Repuesto
                        </button>
                        <a href="<?= base_url('repuesto') ?>" class="btn btn-ghost">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
