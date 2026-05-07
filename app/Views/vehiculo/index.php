<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title">
        <i class="bi bi-car-front me-2" style="color:var(--tr-orange);"></i>
        Vehículos <span>Registrados</span>
    </h2>
    <a href="<?= base_url('vehiculo/nuevo') ?>" class="btn btn-toreto">
        <i class="bi bi-plus-lg me-1"></i> Nuevo Vehículo
    </a>
</div>

<?php
    $total   = count($datos);
    $mant    = count(array_filter($datos, fn($v) => ($v['tipo_servicio']??'') === 'Mantenimiento'));
    $rep_cnt = count(array_filter($datos, fn($v) => in_array($v['tipo_servicio']??'', ['Reparacion','Reparación'])));
    $urg     = count(array_filter($datos, fn($v) => ($v['tipo_servicio']??'') === 'Urgente'));
?>
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(230,57,70,.15);color:#e63946;">🚗</div>
            <div class="mini-stat-val"><?= $total ?></div>
            <div class="mini-stat-lbl">Total vehículos</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(25,200,90,.15);color:#3ddc84;">🔩</div>
            <div class="mini-stat-val" style="color:#3ddc84;"><?= $mant ?></div>
            <div class="mini-stat-lbl">Mantenimiento</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(255,214,10,.15);color:#ffd60a;">🔧</div>
            <div class="mini-stat-val" style="color:#ffd60a;"><?= $rep_cnt ?></div>
            <div class="mini-stat-lbl">Reparación</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="mini-stat">
            <div class="mini-stat-icon" style="background:rgba(230,57,70,.15);color:#ff6b6b;">🔴</div>
            <div class="mini-stat-val" style="color:#ff6b6b;"><?= $urg ?></div>
            <div class="mini-stat-lbl">Urgentes</div>
        </div>
    </div>
</div>

<div class="toreto-table-card">
    <div class="toreto-table-header">
        <span><i class="bi bi-table me-2" style="color:var(--tr-orange);"></i>Listado de Vehículos</span>
        <span style="color:var(--tr-muted);font-size:.82rem;"><?= $total ?> registros</span>
    </div>
    <div class="table-responsive">
        <table class="table toreto-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Marca / Modelo</th>
                    <th>Año</th>
                    <th>Taller Asignado</th>
                    <th>Tipo Servicio</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($datos)): ?>
                <?php foreach ($datos as $v): ?>
                <?php
                    $svc = $v['tipo_servicio'] ?? '';
                    if      ($svc === 'Mantenimiento')                      { $bc='bg-mant'; }
                    elseif  (in_array($svc,['Reparacion','Reparación']))    { $bc='bg-rep'; }
                    elseif  ($svc === 'Urgente')                            { $bc='bg-urg'; }
                    else                                                    { $bc='bg-pend'; }
                ?>
                <tr>
                    <td><span class="orden-id"><?= $v['id'] ?></span></td>
                    <td><span class="placa-badge"><?= esc($v['placa']) ?></span></td>
                    <td>
                        <span style="font-weight:600;color:#fff;"><?= esc($v['marca']) ?></span>
                        <span style="color:var(--tr-muted);"> <?= esc($v['modelo']) ?></span>
                    </td>
                    <td><span class="badge bg-pend"><?= esc($v['anio']) ?></span></td>
                    <td>
                        <?php if (!empty($v['taller_nombre'])): ?>
                            <i class="bi bi-building-gear me-1" style="color:var(--tr-muted);font-size:.85rem;"></i>
                            <?= esc($v['taller_nombre']) ?>
                        <?php else: ?>
                            <span style="color:var(--tr-muted);font-size:.82rem;">Sin asignar</span>
                        <?php endif; ?>
                    </td>
                    <td><span class="badge <?= $bc ?> px-3 py-2"><?= esc($svc) ?: 'N/A' ?></span></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">
                    <div class="empty-state">
                        <div style="font-size:3rem;opacity:.3;margin-bottom:.75rem;">🚗</div>
                        <div style="font-size:1rem;font-weight:600;color:#fff;margin-bottom:.3rem;">Sin vehículos registrados</div>
                        <div style="font-size:.83rem;color:var(--tr-muted);margin-bottom:1rem;">Registra tu primer vehículo</div>
                        <a href="<?= base_url('vehiculo/nuevo') ?>" class="btn btn-toreto"><i class="bi bi-plus-lg me-1"></i> Nuevo Vehículo</a>
                    </div>
                </td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
