<?= $this->extend('plantilla') ?>
<?= $this->section('content') ?>

<!-- HERO -->
<div class="row align-items-center mb-5" style="min-height:260px;">
    <div class="col-lg-7">
        <p class="text-uppercase" style="color:var(--tr-orange);font-size:.82rem;letter-spacing:3px;font-weight:600;">
            <i class="bi bi-tools me-1"></i> Bienvenido al sistema
        </p>
        <h1 style="font-family:'Rajdhani',sans-serif;font-size:clamp(2.2rem,5vw,3.5rem);font-weight:700;line-height:1.1;">
            GESTIÓN PROFESIONAL<br>
            <span style="background:linear-gradient(135deg,#e63946,#f4801a);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                TALLERES TORETO
            </span>
        </h1>
        <p class="mt-3 mb-4" style="color:var(--tr-muted);max-width:480px;line-height:1.7;">
            Plataforma completa para administrar talleres, vehículos, órdenes de servicio y repuestos.
            Todo en un solo lugar, rápido y eficiente.
        </p>
        <div class="d-flex flex-wrap gap-2">
            <a href="<?= base_url('orden') ?>" class="btn btn-toreto px-4">
                <i class="bi bi-plus-circle me-2"></i>Nueva Orden
            </a>
            <a href="<?= base_url('vehiculo/deku') ?>" class="btn btn-ghost px-4">
                <i class="bi bi-car-front me-2"></i>Ver Vehículos
            </a>
        </div>
    </div>
    <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center">
        <div style="font-size:9rem;opacity:.15;filter:drop-shadow(0 0 40px #e63946);">🔧</div>
    </div>
</div>

<!-- STATS -->
<div class="row g-3 mb-5">
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(230,57,70,.15);">🏭</div>
            <div class="stat-number" style="color:#e63946;"><?= $stats['talleres'] ?></div>
            <div class="stat-label">Talleres</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(244,128,26,.15);">🚗</div>
            <div class="stat-number" style="color:#f4801a;"><?= $stats['vehiculos'] ?></div>
            <div class="stat-label">Vehículos</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(32,201,151,.15);">📋</div>
            <div class="stat-number" style="color:#20c997;"><?= $stats['ordenes'] ?></div>
            <div class="stat-label">Órdenes</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-2" style="background:rgba(255,214,10,.15);">🔩</div>
            <div class="stat-number" style="color:#ffd60a;"><?= $stats['repuestos'] ?></div>
            <div class="stat-label">Repuestos</div>
        </div>
    </div>
</div>

<!-- ACCESOS RÁPIDOS -->
<div class="row g-3 mb-5">
    <div class="col-12">
        <h5 style="font-family:'Rajdhani',sans-serif;letter-spacing:1px;color:var(--tr-muted);font-size:.9rem;text-transform:uppercase;">
            Accesos Rápidos
        </h5>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('taller') ?>" class="text-decoration-none">
            <div class="card-toreto p-4 text-center h-100" style="transition:transform .25s,box-shadow .25s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 10px 30px rgba(230,57,70,.25)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">
                <div style="font-size:2.5rem;margin-bottom:.75rem;">🏭</div>
                <div style="font-family:'Rajdhani',sans-serif;font-size:1.1rem;font-weight:700;color:#fff;">Talleres</div>
                <p style="font-size:.8rem;color:var(--tr-muted);margin:0;">Administrar talleres registrados</p>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('vehiculo/deku') ?>" class="text-decoration-none">
            <div class="card-toreto p-4 text-center h-100" style="transition:transform .25s,box-shadow .25s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 10px 30px rgba(244,128,26,.25)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">
                <div style="font-size:2.5rem;margin-bottom:.75rem;">🚗</div>
                <div style="font-family:'Rajdhani',sans-serif;font-size:1.1rem;font-weight:700;color:#fff;">Vehículos</div>
                <p style="font-size:.8rem;color:var(--tr-muted);margin:0;">Ver y registrar vehículos</p>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('orden') ?>" class="text-decoration-none">
            <div class="card-toreto p-4 text-center h-100" style="transition:transform .25s,box-shadow .25s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 10px 30px rgba(32,201,151,.25)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">
                <div style="font-size:2.5rem;margin-bottom:.75rem;">📋</div>
                <div style="font-family:'Rajdhani',sans-serif;font-size:1.1rem;font-weight:700;color:#fff;">Órdenes</div>
                <p style="font-size:.8rem;color:var(--tr-muted);margin:0;">Gestionar órdenes de servicio</p>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= base_url('repuesto') ?>" class="text-decoration-none">
            <div class="card-toreto p-4 text-center h-100" style="transition:transform .25s,box-shadow .25s;"
                 onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 10px 30px rgba(255,214,10,.2)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">
                <div style="font-size:2.5rem;margin-bottom:.75rem;">🔩</div>
                <div style="font-family:'Rajdhani',sans-serif;font-size:1.1rem;font-weight:700;color:#fff;">Repuestos</div>
                <p style="font-size:.8rem;color:var(--tr-muted);margin:0;">Inventario de repuestos</p>
            </div>
        </a>
    </div>
</div>

<!-- ACERCA DE + CONTACTO -->
<div class="row g-4 mb-5">
    <!-- ACERCA DE -->
    <div class="col-lg-8">
        <div class="card-toreto h-100">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-info-circle" style="color:var(--tr-orange);"></i>
                Acerca de Talleres Toreto
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 style="font-family:'Rajdhani',sans-serif;color:var(--tr-orange);letter-spacing:1px;">¿Quiénes somos?</h5>
                        <p style="color:var(--tr-muted);line-height:1.8;font-size:.92rem;">
                            <strong style="color:var(--tr-light);">Talleres Toreto</strong> es una red de talleres automotrices
                            comprometida con brindar servicios de alta calidad. Nuestro sistema de gestión digitaliza
                            y optimiza cada proceso, desde el ingreso del vehículo hasta la entrega final.
                        </p>
                        <p style="color:var(--tr-muted);line-height:1.8;font-size:.92rem;">
                            Contamos con personal técnico certificado y herramientas de diagnóstico de última generación
                            para garantizar que tu vehículo quede en perfectas condiciones.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5 style="font-family:'Rajdhani',sans-serif;color:var(--tr-orange);letter-spacing:1px;">Nuestros Servicios</h5>
                        <ul class="list-unstyled" style="color:var(--tr-muted);font-size:.9rem;">
                            <li class="mb-2"><i class="bi bi-check-circle me-2" style="color:#3ddc84;"></i>Mantenimiento preventivo y correctivo</li>
                            <li class="mb-2"><i class="bi bi-check-circle me-2" style="color:#3ddc84;"></i>Reparación de motor y transmisión</li>
                            <li class="mb-2"><i class="bi bi-check-circle me-2" style="color:#3ddc84;"></i>Diagnóstico electrónico computarizado</li>
                            <li class="mb-2"><i class="bi bi-check-circle me-2" style="color:#3ddc84;"></i>Frenos, suspensión y dirección</li>
                            <li class="mb-2"><i class="bi bi-check-circle me-2" style="color:#3ddc84;"></i>Servicio de emergencia urgente 24/7</li>
                            <li class="mb-2"><i class="bi bi-check-circle me-2" style="color:#3ddc84;"></i>Repuestos originales y alternativos</li>
                        </ul>
                    </div>
                </div>
                <hr style="border-color:rgba(230,57,70,.2);margin:1.5rem 0;">
                <div class="row g-3 text-center">
                    <div class="col-4">
                        <div style="font-size:2rem;margin-bottom:.4rem;">⚡</div>
                        <div style="font-family:'Rajdhani',sans-serif;font-size:1rem;font-weight:700;color:#fff;">Rapidez</div>
                        <div style="font-size:.78rem;color:var(--tr-muted);">Entrega en tiempo récord</div>
                    </div>
                    <div class="col-4">
                        <div style="font-size:2rem;margin-bottom:.4rem;">🛡️</div>
                        <div style="font-family:'Rajdhani',sans-serif;font-size:1rem;font-weight:700;color:#fff;">Garantía</div>
                        <div style="font-size:.78rem;color:var(--tr-muted);">Trabajos garantizados</div>
                    </div>
                    <div class="col-4">
                        <div style="font-size:2rem;margin-bottom:.4rem;">💎</div>
                        <div style="font-family:'Rajdhani',sans-serif;font-size:1rem;font-weight:700;color:#fff;">Calidad</div>
                        <div style="font-size:.78rem;color:var(--tr-muted);">Estándares premium</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACTO -->
    <div class="col-lg-4">
        <div class="card-toreto h-100">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-headset" style="color:var(--tr-orange);"></i>
                Contáctanos
            </div>
            <div class="card-body p-4">
                <p style="color:var(--tr-muted);font-size:.85rem;line-height:1.6;margin-bottom:1.4rem;">
                    ¿Necesitas agendar un servicio o tienes alguna consulta? Comunícate con nosotros.
                </p>

                <div style="color:var(--tr-muted);font-size:.7rem;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:.6rem;">
                    <i class="bi bi-telephone-fill me-1" style="color:var(--tr-orange);"></i> Teléfonos
                </div>
                <a href="tel:+50361284141" class="d-flex align-items-center gap-3 mb-2 text-decoration-none"
                   style="background:rgba(230,57,70,.08);border:1px solid rgba(230,57,70,.22);border-radius:10px;padding:.65rem 1rem;transition:all .2s;"
                   onmouseover="this.style.background='rgba(230,57,70,.2)';this.style.borderColor='rgba(230,57,70,.5)'"
                   onmouseout="this.style.background='rgba(230,57,70,.08)';this.style.borderColor='rgba(230,57,70,.22)'">
                    <span style="font-size:1.4rem;">📱</span>
                    <div>
                        <div style="font-family:'Rajdhani',sans-serif;font-size:1.2rem;font-weight:700;color:#ff9999;letter-spacing:1px;">6128-4141</div>
                        <div style="font-size:.7rem;color:var(--tr-muted);">Brayan Fiero</div>
                    </div>
                </a>
                <a href="tel:+50379174192" class="d-flex align-items-center gap-3 mb-3 text-decoration-none"
                   style="background:rgba(230,57,70,.08);border:1px solid rgba(230,57,70,.22);border-radius:10px;padding:.65rem 1rem;transition:all .2s;"
                   onmouseover="this.style.background='rgba(230,57,70,.2)';this.style.borderColor='rgba(230,57,70,.5)'"
                   onmouseout="this.style.background='rgba(230,57,70,.08)';this.style.borderColor='rgba(230,57,70,.22)'">
                    <span style="font-size:1.4rem;">📱</span>
                    <div>
                        <div style="font-family:'Rajdhani',sans-serif;font-size:1.2rem;font-weight:700;color:#ff9999;letter-spacing:1px;">7917-4192</div>
                        <div style="font-size:.7rem;color:var(--tr-muted);">William Adiel</div>
                    </div>
                </a>

                <div style="color:var(--tr-muted);font-size:.7rem;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:.6rem;">
                    <i class="bi bi-envelope-fill me-1" style="color:var(--tr-orange);"></i> Correos Electrónicos
                </div>
                <a href="mailto:brayanfieroa@gmail.com" class="d-flex align-items-center gap-2 mb-2 text-decoration-none"
                   style="background:rgba(244,128,26,.08);border:1px solid rgba(244,128,26,.2);border-radius:10px;padding:.6rem 1rem;transition:all .2s;"
                   onmouseover="this.style.background='rgba(244,128,26,.2)';this.style.borderColor='rgba(244,128,26,.5)'"
                   onmouseout="this.style.background='rgba(244,128,26,.08)';this.style.borderColor='rgba(244,128,26,.2)'">
                    <i class="bi bi-envelope-at-fill" style="color:var(--tr-orange);font-size:1.1rem;flex-shrink:0;"></i>
                    <span style="font-size:.8rem;color:#f0c090;word-break:break-all;">brayanfieroa@gmail.com</span>
                </a>
                <a href="mailto:willianadiel23@gmail.com" class="d-flex align-items-center gap-2 mb-3 text-decoration-none"
                   style="background:rgba(244,128,26,.08);border:1px solid rgba(244,128,26,.2);border-radius:10px;padding:.6rem 1rem;transition:all .2s;"
                   onmouseover="this.style.background='rgba(244,128,26,.2)';this.style.borderColor='rgba(244,128,26,.5)'"
                   onmouseout="this.style.background='rgba(244,128,26,.08)';this.style.borderColor='rgba(244,128,26,.2)'">
                    <i class="bi bi-envelope-at-fill" style="color:var(--tr-orange);font-size:1.1rem;flex-shrink:0;"></i>
                    <span style="font-size:.8rem;color:#f0c090;word-break:break-all;">willianadiel23@gmail.com</span>
                </a>

                <hr style="border-color:rgba(230,57,70,.15);margin:0 0 .8rem;">
                <div style="color:var(--tr-muted);font-size:.78rem;text-align:center;">
                    <i class="bi bi-clock me-1" style="color:var(--tr-orange);"></i>
                    Lunes a Sábado &nbsp;·&nbsp; 8:00 AM – 6:00 PM
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ÚLTIMAS ÓRDENES -->
<?php if (!empty($ultimas_ordenes)): ?>
<div class="toreto-table-card mb-4">
    <div class="toreto-table-header">
        <span><i class="bi bi-clock-history me-2" style="color:var(--tr-orange);"></i>Últimas Órdenes</span>
        <a href="<?= base_url('orden') ?>" class="btn btn-ghost btn-sm">Ver todas</a>
    </div>
    <div class="table-responsive">
        <table class="table toreto-table mb-0">
            <thead>
                <tr><th>#</th><th>Placa</th><th>Diagnóstico</th><th>Estado</th><th>Total</th></tr>
            </thead>
            <tbody>
            <?php foreach($ultimas_ordenes as $o): ?>
            <tr>
                <td><span class="orden-id">#<?= $o['id'] ?></span></td>
                <td><span class="placa-badge"><?= esc($o['placa'] ?? '—') ?></span></td>
                <td class="diag-cell"><?= esc(mb_strimwidth($o['diagnostico'] ?? '', 0, 45, '…')) ?></td>
                <td>
                    <?php
                        $est = strtolower($o['estado'] ?? '');
                        if      (str_contains($est,'complet')) { $cls='bg-comp'; }
                        elseif  (str_contains($est,'proceso')) { $cls='bg-proc'; }
                        else                                   { $cls='bg-pend'; }
                    ?>
                    <span class="badge <?= $cls ?> px-3 py-2"><?= esc($o['estado']) ?></span>
                </td>
                <td><span class="monto">$<?= number_format($o['total'] ?? 0, 2) ?></span></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<?= $this->endSection() ?>
