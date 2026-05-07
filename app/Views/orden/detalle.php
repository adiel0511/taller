<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="page-title"><i class="bi bi-clipboard2-data me-2" style="color:var(--tr-orange);"></i>Orden <span>#<?= $orden['id'] ?></span></h2>
    <a href="<?= base_url('orden') ?>" class="btn btn-ghost"><i class="bi bi-arrow-left me-1"></i> Volver</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label mb-1">Placa del Vehículo</div>
            <div style="font-family:'Rajdhani',sans-serif;font-size:1.8rem;font-weight:700;color:#ff9999;letter-spacing:2px;">
                <?= esc($orden['placa']) ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label mb-1">Estado</div>
            <?php
                $est=strtolower($orden['estado']??'');
                $badge=match(true){str_contains($est,'complet')=>'bg-comp',str_contains($est,'proceso')=>'bg-proc',default=>'bg-pend'};
            ?>
            <span class="badge <?= $badge ?> px-4 py-2 mt-1" style="font-size:.95rem;"><?= esc($orden['estado']) ?></span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-label mb-1">Total</div>
            <div class="stat-number" style="color:#ffd60a;">$<?= number_format($orden['total'] ?? 0, 2) ?></div>
        </div>
    </div>
</div>

<div class="card-toreto mb-4">
    <div class="card-header"><i class="bi bi-file-text me-2" style="color:var(--tr-orange);"></i>Diagnóstico</div>
    <div class="card-body p-4" style="color:var(--tr-muted);line-height:1.8;">
        <?= nl2br(esc($orden['diagnostico'])) ?>
        <div class="row mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,.06);">
            <div class="col-6"><span style="color:var(--tr-muted);font-size:.8rem;">INICIO</span><br><strong><?= esc($orden['fecha_inicio'] ?? '—') ?></strong></div>
            <div class="col-6"><span style="color:var(--tr-muted);font-size:.8rem;">FIN ESTIMADO</span><br><strong><?= esc($orden['fecha_fin'] ?? '—') ?></strong></div>
        </div>
    </div>
</div>

<!-- Agregar más repuestos -->
<div class="card-toreto">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-gear-wide-connected me-2" style="color:var(--tr-orange);"></i>Agregar Repuestos</span>
    </div>
    <div class="card-body p-4">
        <form action="<?= base_url('orden/guardar_repuestos') ?>" method="post">
            <input type="hidden" name="orden_id" value="<?= $orden['id'] ?>">
            <table class="table table-t mb-2" id="tabla-repuestos">
                <thead><tr><th>Repuesto</th><th class="text-center" style="width:130px;">Cantidad</th><th class="text-center" style="width:80px;">Quitar</th></tr></thead>
                <tbody id="contenedor-filas"></tbody>
            </table>
            <template id="fila-template">
                <tr>
                    <td>
                        <select name="repuesto_id[]" class="form-select form-select-sm" required>
                            <option value="">Seleccione...</option>
                            <?php foreach($catalogo as $r): ?>
                            <option value="<?= $r['id'] ?>"><?= esc($r['nombre']) ?> — $<?= number_format($r['precio'],2) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td class="text-center"><input type="number" name="cantidad[]" class="form-control form-control-sm text-center" value="1" min="1" required></td>
                    <td class="text-center"><button type="button" class="btn btn-del btn-sm" onclick="eliminarFila(this)"><i class="bi bi-x-lg"></i></button></td>
                </tr>
            </template>
            <div class="d-flex gap-2 mt-3">
                <button type="button" class="btn btn-ghost" onclick="agregarFila()"><i class="bi bi-plus-circle me-1"></i>Añadir otro</button>
                <button type="submit" class="btn btn-toreto"><i class="bi bi-floppy2 me-2"></i>Guardar repuestos</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
function agregarFila(){const t=document.getElementById('fila-template').content.cloneNode(true);document.getElementById('contenedor-filas').appendChild(t);}
function eliminarFila(btn){if(document.querySelectorAll('#contenedor-filas tr').length>1)btn.closest('tr').remove();else alert('Al menos un repuesto.');}
window.onload=agregarFila;
</script>
<?= $this->endSection() ?>
