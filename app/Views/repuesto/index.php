<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title">
        <i class="bi bi-gear-wide-connected me-2" style="color:var(--tr-orange);"></i>
        Repuestos <span>Inventario</span>
    </h2>
    <a href="<?= base_url('repuesto/nuevo') ?>" class="btn btn-toreto">
        <i class="bi bi-plus-lg me-1"></i> Nuevo Repuesto
    </a>
</div>

<?php
    $total_rep   = count($datos);
    $disponibles = count(array_filter($datos, fn($r) => ($r['stock'] ?? 0) > 5));
    $bajo_stock  = count(array_filter($datos, fn($r) => ($r['stock'] ?? 0) > 0 && ($r['stock'] ?? 0) <= 5));
    $agotados    = count(array_filter($datos, fn($r) => ($r['stock'] ?? 0) == 0));
    $valor_inv   = array_sum(array_map(fn($r) => ($r['precio'] ?? 0) * ($r['stock'] ?? 0), $datos));
?>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(230,57,70,.15);">🔩</div>
            <div class="stat-number" style="color:#e63946;"><?= $total_rep ?></div>
            <div class="stat-label">Total repuestos</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(25,200,90,.15);">✅</div>
            <div class="stat-number" style="color:#3ddc84;"><?= $disponibles ?></div>
            <div class="stat-label">Disponibles</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(255,214,10,.15);">⚠️</div>
            <div class="stat-number" style="color:#ffd60a;"><?= $bajo_stock ?></div>
            <div class="stat-label">Stock bajo</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(255,255,255,.06);">💲</div>
            <div class="stat-number" style="color:#ffd60a;font-size:1.4rem;">$<?= number_format($valor_inv, 0) ?></div>
            <div class="stat-label">Valor inventario</div>
        </div>
    </div>
</div>

<div class="toreto-table-card">
    <div class="toreto-table-header">
        <span><i class="bi bi-table me-2" style="color:var(--tr-orange);"></i>Catálogo de Repuestos</span>
        <span style="color:var(--tr-muted);font-size:.82rem;"><?= $total_rep ?> registros</span>
    </div>
    <div class="table-responsive">
        <table class="table toreto-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio Unit.</th>
                    <th>Stock</th>
                    <th>Valor Total</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($datos)): ?>
                <?php foreach ($datos as $r): ?>
                <?php
                    $stock  = $r['stock']  ?? 0;
                    $precio = $r['precio'] ?? 0;
                    if      ($stock > 5) { $sc='bg-comp'; $sl='✓ Disponible'; }
                    elseif  ($stock > 0) { $sc='bg-rep';  $sl='⚠ Stock bajo'; }
                    else                 { $sc='bg-urg';  $sl='✗ Agotado'; }
                ?>
                <tr>
                    <td><span class="orden-id"><?= $r['id'] ?></span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="rep-icon">⚙</span>
                            <span style="font-weight:600;color:#fff;"><?= esc($r['nombre']) ?></span>
                        </div>
                    </td>
                    <td><span class="precio-cell">$<?= number_format($precio, 2) ?></span></td>
                    <td>
                        <span class="stock-num <?= $stock==0?'text-danger':($stock<=5?'text-warning':'text-success') ?>">
                            <?= $stock ?>
                        </span>
                        <span style="color:var(--tr-muted);font-size:.75rem;"> unid.</span>
                    </td>
                    <td><span class="monto">$<?= number_format($precio * $stock, 2) ?></span></td>
                    <td><span class="badge <?= $sc ?> px-3 py-2"><?= $sl ?></span></td>
                    <td>
                        <a href="<?= base_url('repuesto/eliminar/'.$r['id']) ?>"
                           class="btn-icon btn-icon-del"
                           onclick="return confirm('¿Eliminar «<?= esc($r['nombre']) ?>»?')"
                           title="Eliminar">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">
                    <div class="empty-state">
                        <div style="font-size:3rem;opacity:.3;margin-bottom:.75rem;">🔩</div>
                        <div style="font-size:1rem;font-weight:600;color:#fff;margin-bottom:.3rem;">Sin repuestos registrados</div>
                        <div style="font-size:.83rem;color:var(--tr-muted);margin-bottom:1rem;">Agrega repuestos al catálogo</div>
                        <a href="<?= base_url('repuesto/nuevo') ?>" class="btn btn-toreto">
                            <i class="bi bi-plus-lg me-1"></i> Nuevo Repuesto
                        </a>
                    </div>
                </td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
