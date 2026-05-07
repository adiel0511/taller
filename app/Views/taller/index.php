<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title">
        <i class="bi bi-building-gear me-2" style="color:var(--tr-orange);"></i>
        Talleres <span>Registrados</span>
    </h2>
    <a href="<?= base_url('taller/nuevo') ?>" class="btn btn-toreto">
        <i class="bi bi-plus-lg me-1"></i> Nuevo Taller
    </a>
</div>

<?php $total = count($datos); ?>
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(230,57,70,.15);color:#e63946;">🏭</div>
            <div class="mini-stat-val"><?= $total ?></div>
            <div class="mini-stat-lbl">Talleres activos</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(244,128,26,.15);color:#f4801a;">📍</div>
            <div class="mini-stat-val" style="color:#f4801a;"><?= count(array_unique(array_column($datos,'ciudad'))) ?></div>
            <div class="mini-stat-lbl">Ciudades</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(32,201,151,.15);color:#20c997;">🚗</div>
            <div class="mini-stat-val" style="color:#20c997;"><?= array_sum(array_column($datos,'capacidad')) ?></div>
            <div class="mini-stat-lbl">Cap. total veh.</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(255,214,10,.15);color:#ffd60a;">🔧</div>
            <div class="mini-stat-val" style="color:#ffd60a;"><?= count(array_unique(array_column($datos,'especialidad'))) ?></div>
            <div class="mini-stat-lbl">Especialidades</div>
        </div>
    </div>
</div>

<div class="toreto-table-card">
    <div class="toreto-table-header">
        <span><i class="bi bi-table me-2" style="color:var(--tr-orange);"></i>Listado de Talleres</span>
        <span style="color:var(--tr-muted);font-size:.82rem;"><?= $total ?> registros</span>
    </div>
    <div class="table-responsive">
        <table class="table toreto-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Ciudad</th>
                    <th>Ubicación</th>
                    <th>Capacidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($datos)): ?>
                <?php foreach ($datos as $d): ?>
                <tr>
                    <td><span class="orden-id"><?= $d['id'] ?></span></td>
                    <td style="font-weight:600;color:#fff;"><?= esc($d['nombre']) ?></td>
                    <td><span class="badge bg-mant px-3 py-2"><?= esc($d['especialidad']) ?></span></td>
                    <td><i class="bi bi-geo-alt me-1" style="color:var(--tr-muted);"></i><?= esc($d['ciudad']) ?></td>
                    <td class="date-cell"><?= esc($d['ubicacion']) ?></td>
                    <td><span class="badge bg-rep px-3"><?= esc($d['capacidad']) ?> veh.</span></td>
                    <td>
                        <a href="<?= base_url('taller/eliminar/'.$d['id']) ?>"
                           class="btn-icon btn-icon-del"
                           onclick="return confirm('¿Eliminar este taller?')" title="Eliminar">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">
                    <div class="empty-state">
                        <div style="font-size:3rem;opacity:.3;margin-bottom:.75rem;">🏭</div>
                        <div style="font-size:1rem;font-weight:600;color:#fff;margin-bottom:.3rem;">Sin talleres registrados</div>
                        <div style="font-size:.83rem;color:var(--tr-muted);margin-bottom:1rem;">Agrega tu primer taller</div>
                        <a href="<?= base_url('taller/nuevo') ?>" class="btn btn-toreto"><i class="bi bi-plus-lg me-1"></i> Nuevo Taller</a>
                    </div>
                </td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
