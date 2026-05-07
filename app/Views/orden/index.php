<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title">
        <i class="bi bi-clipboard2-check me-2" style="color:var(--tr-orange);"></i>
        Órdenes <span>de Servicio</span>
    </h2>
    <a href="<?= base_url('orden/nuevo') ?>" class="btn btn-toreto">
        <i class="bi bi-plus-lg me-1"></i> Nueva Orden
    </a>
</div>

<?php
    $total_ordenes = count($datos);
    $pendientes    = count(array_filter($datos, fn($o) => str_contains(strtolower($o['estado']??''), 'pend')));
    $en_proceso    = count(array_filter($datos, fn($o) => str_contains(strtolower($o['estado']??''), 'proceso')));
    $completadas   = count(array_filter($datos, fn($o) => str_contains(strtolower($o['estado']??''), 'complet')));
    $facturado     = array_sum(array_column($datos, 'total'));
?>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(230,57,70,.15);">📋</div>
            <div class="stat-number" style="color:#e63946;"><?= $total_ordenes ?></div>
            <div class="stat-label">Total órdenes</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(108,117,125,.15);">⏳</div>
            <div class="stat-number" style="color:#adb5bd;"><?= $pendientes ?></div>
            <div class="stat-label">Pendientes</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(32,201,151,.15);">🔧</div>
            <div class="stat-number" style="color:#20c997;"><?= $en_proceso ?></div>
            <div class="stat-label">En proceso</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(255,214,10,.15);">💰</div>
            <div class="stat-number" style="color:#ffd60a;font-size:1.5rem;">$<?= number_format($facturado, 0) ?></div>
            <div class="stat-label">Total facturado</div>
        </div>
    </div>
</div>

<div class="toreto-table-card">
    <div class="toreto-table-header">
        <span><i class="bi bi-table me-2" style="color:var(--tr-orange);"></i>Listado de Órdenes</span>
        <span style="color:var(--tr-muted);font-size:.82rem;"><?= $total_ordenes ?> registros</span>
    </div>
    <div class="table-responsive">
        <table class="table toreto-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Diagnóstico</th>
                    <th>Estado</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($datos)): ?>
                <?php foreach ($datos as $o): ?>
                <?php
                    $est = strtolower($o['estado'] ?? '');
                    if      (str_contains($est,'complet')) { $bc='bg-comp'; $bl='✓ Completado'; }
                    elseif  (str_contains($est,'proceso')) { $bc='bg-proc'; $bl='⚙ En proceso'; }
                    elseif  (str_contains($est,'urgente')) { $bc='bg-urg';  $bl='🔴 Urgente'; }
                    else                                   { $bc='bg-pend'; $bl='⏳ Pendiente'; }
                ?>
                <tr>
                    <td><span class="orden-id">#<?= $o['id'] ?></span></td>
                    <td><span class="placa-badge"><?= esc($o['placa'] ?? '—') ?></span></td>
                    <td class="diag-cell" title="<?= esc($o['diagnostico'] ?? '') ?>">
                        <?= esc(mb_strimwidth($o['diagnostico'] ?? '', 0, 40, '…')) ?>
                    </td>
                    <td><span class="badge <?= $bc ?> px-3 py-2"><?= $bl ?></span></td>
                    <td class="date-cell"><?= esc($o['fecha_inicio'] ?? '—') ?></td>
                    <td class="date-cell"><?= esc($o['fecha_fin']    ?? '—') ?></td>
                    <td><span class="monto">$<?= number_format($o['total'] ?? 0, 2) ?></span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?= base_url('orden/ver/'.$o['id']) ?>"
                               class="btn-icon btn-icon-view" title="Ver detalle">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="<?= base_url('orden/eliminar/'.$o['id']) ?>"
                               class="btn-icon btn-icon-del"
                               onclick="return confirm('¿Eliminar orden #<?= $o['id'] ?>?')"
                               title="Eliminar">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">
                    <div class="empty-state">
                        <div style="font-size:3rem;opacity:.3;margin-bottom:.75rem;">📋</div>
                        <div style="font-size:1rem;font-weight:600;color:#fff;margin-bottom:.3rem;">Sin órdenes registradas</div>
                        <div style="font-size:.83rem;color:var(--tr-muted);margin-bottom:1rem;">Crea tu primera orden de servicio</div>
                        <a href="<?= base_url('orden/nuevo') ?>" class="btn btn-toreto">
                            <i class="bi bi-plus-lg me-1"></i> Nueva Orden
                        </a>
                    </div>
                </td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
