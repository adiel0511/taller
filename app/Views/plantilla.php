<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔧 Talleres Toreto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --tr-red:#e63946; --tr-orange:#f4801a; --tr-dark:#0d0d0d;
            --tr-card:#1a1a2e; --tr-light:#e0e0e0; --tr-muted:#8899aa;
            --fire:linear-gradient(135deg,#e63946 0%,#f4801a 100%);
        }
        /* ── BASE ── */
        body{font-family:'Inter',sans-serif;background:var(--tr-dark);color:var(--tr-light);min-height:100vh;
            background-image:radial-gradient(ellipse at 10% 20%,rgba(230,57,70,.08) 0%,transparent 50%),
            radial-gradient(ellipse at 90% 80%,rgba(244,128,26,.06) 0%,transparent 50%);}

        /* ── SPLASH ── */
        #splash{position:fixed;inset:0;z-index:9999;background:#0d0d0d;display:flex;flex-direction:column;
            align-items:center;justify-content:center;animation:splashOut .6s ease 2.8s forwards;}
        @keyframes splashOut{to{opacity:0;pointer-events:none;}}
        .splash-logo{font-family:'Rajdhani',sans-serif;font-size:clamp(2.5rem,8vw,5rem);font-weight:700;
            background:var(--fire);-webkit-background-clip:text;-webkit-text-fill-color:transparent;
            background-clip:text;letter-spacing:3px;animation:logoIn .7s cubic-bezier(.22,1,.36,1) .2s both;}
        .splash-sub{font-size:1rem;color:var(--tr-muted);letter-spacing:6px;text-transform:uppercase;animation:logoIn .7s ease .6s both;}
        .splash-bar{margin-top:2rem;width:220px;height:3px;background:#222;border-radius:10px;overflow:hidden;animation:logoIn .5s ease 1s both;}
        .splash-fill{height:100%;width:0;background:var(--fire);border-radius:10px;animation:barFill 1.5s ease 1.1s forwards;}
        .splash-icon{font-size:4rem;margin-bottom:1rem;animation:spinOnce 2s linear 1s;}
        @keyframes barFill{to{width:100%;}}
        @keyframes logoIn{from{opacity:0;transform:translateY(24px);}to{opacity:1;transform:translateY(0);}}
        @keyframes spinOnce{0%{transform:rotate(0deg) scale(1);}50%{transform:rotate(180deg) scale(1.15);}100%{transform:rotate(360deg) scale(1);}}

        /* ── NAVBAR ── */
        .navbar-toreto{background:rgba(13,13,13,.97);border-bottom:2px solid rgba(230,57,70,.35);backdrop-filter:blur(12px);}
        .brand-name{font-family:'Rajdhani',sans-serif;font-size:1.45rem;font-weight:700;
            background:var(--fire);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:2px;}
        .nav-link-t{color:var(--tr-light)!important;font-weight:500;padding:.42rem .8rem!important;border-radius:8px;
            transition:all .22s ease;font-size:.87rem;letter-spacing:.4px;}
        .nav-link-t:hover,.nav-link-t.active{background:rgba(230,57,70,.18)!important;color:var(--tr-orange)!important;}
        .navbar-toggler{border-color:rgba(230,57,70,.4);}

        /* ── CARDS GENÉRICAS ── */
        .card-toreto{background:var(--tr-card);border:1px solid rgba(230,57,70,.15);border-radius:14px;box-shadow:0 4px 24px rgba(0,0,0,.4);}
        .card-toreto .card-header{background:rgba(230,57,70,.1);border-bottom:1px solid rgba(230,57,70,.2);
            border-radius:14px 14px 0 0!important;font-family:'Rajdhani',sans-serif;font-weight:600;font-size:1.1rem;letter-spacing:1px;}

        /* ── STAT CARDS (home) ── */
        .stat-card{background:var(--tr-card);border:1px solid rgba(230,57,70,.14);border-radius:14px;
            padding:1.4rem 1.6rem;transition:transform .25s,box-shadow .25s;}
        .stat-card:hover{transform:translateY(-4px);box-shadow:0 8px 30px rgba(230,57,70,.2);}
        .stat-icon{width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;}
        .stat-number{font-family:'Rajdhani',sans-serif;font-size:2.2rem;font-weight:700;line-height:1;}
        .stat-label{color:var(--tr-muted);font-size:.82rem;letter-spacing:.4px;}

        /* ── MINI STATS (tablas) ── */
        .mini-stat{background:var(--tr-card);border:1px solid rgba(230,57,70,.14);border-radius:12px;
            padding:1rem 1.2rem;display:flex;flex-direction:column;align-items:center;text-align:center;
            transition:transform .22s,box-shadow .22s;}
        .mini-stat:hover{transform:translateY(-3px);box-shadow:0 6px 20px rgba(230,57,70,.18);}
        .mini-stat-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;
            justify-content:center;font-size:1.2rem;margin-bottom:.6rem;}
        .mini-stat-val{font-family:'Rajdhani',sans-serif;font-size:1.9rem;font-weight:700;line-height:1;color:var(--tr-orange);}
        .mini-stat-lbl{font-size:.75rem;color:var(--tr-muted);margin-top:.2rem;letter-spacing:.4px;}

        /* ── TABLE CARD ── */
        .toreto-table-card{background:var(--tr-card);border:1px solid rgba(230,57,70,.14);border-radius:16px;
            overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.35);}
        .toreto-table-header{padding:1rem 1.4rem;display:flex;align-items:center;justify-content:space-between;
            background:rgba(230,57,70,.07);border-bottom:1px solid rgba(230,57,70,.14);
            font-family:'Rajdhani',sans-serif;font-weight:600;font-size:1rem;color:#fff;letter-spacing:.5px;}

        /* ── TABLE ROWS ── */
        .toreto-table{color:var(--tr-light)!important;border-color:transparent!important;margin:0;}
        .toreto-table thead tr{background:rgba(15,15,30,.8);}
        .toreto-table thead th{color:var(--tr-muted)!important;font-size:.75rem;letter-spacing:1.5px;
            text-transform:uppercase;border:none!important;padding:.85rem 1rem;font-weight:600;white-space:nowrap;}
        .toreto-table tbody tr{border-bottom:1px solid rgba(255,255,255,.04)!important;transition:background .15s;}
        .toreto-table tbody tr:hover{background:rgba(230,57,70,.06)!important;}
        .toreto-table tbody tr:last-child{border-bottom:none!important;}
        .toreto-table td{vertical-align:middle;padding:.8rem 1rem;border:none!important;color:#c8d0e0;}

        /* ── TABLE CELL STYLES ── */
        .orden-id{font-family:'Rajdhani',sans-serif;font-size:1rem;font-weight:700;color:var(--tr-orange);}
        .placa-badge{display:inline-block;background:rgba(230,57,70,.15);color:#ff9999;
            border:1px solid rgba(230,57,70,.3);border-radius:6px;padding:.2rem .7rem;
            font-weight:700;letter-spacing:1.5px;font-size:.82rem;}
        .diag-cell{color:var(--tr-muted)!important;font-size:.88rem;max-width:200px;
            overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
        .date-cell{color:var(--tr-muted)!important;font-size:.83rem;white-space:nowrap;}
        .monto{font-family:'Rajdhani',sans-serif;font-size:1.05rem;font-weight:700;color:#ffd60a;}
        .precio-cell{font-family:'Rajdhani',sans-serif;font-size:1rem;font-weight:600;color:#e0e0e0;}
        .stock-num{font-family:'Rajdhani',sans-serif;font-size:1.15rem;font-weight:700;}
        .rep-icon{display:inline-flex;width:30px;height:30px;border-radius:8px;align-items:center;
            justify-content:center;background:rgba(244,128,26,.12);color:var(--tr-orange);font-size:.9rem;}

        /* ── ACTION BUTTONS ── */
        .btn-icon{display:inline-flex;align-items:center;justify-content:center;
            width:32px;height:32px;border-radius:8px;border:none;cursor:pointer;
            text-decoration:none;transition:all .18s;font-size:.85rem;}
        .btn-icon-view{background:rgba(13,132,96,.2);color:#20c997;}
        .btn-icon-view:hover{background:rgba(13,132,96,.4);color:#fff;transform:scale(1.1);}
        .btn-icon-del{background:rgba(230,57,70,.15);color:#ff6b6b;}
        .btn-icon-del:hover{background:rgba(230,57,70,.35);color:#fff;transform:scale(1.1);}

        /* ── EMPTY STATE ── */
        .empty-state{padding:3.5rem 1rem;text-align:center;}

        /* ── BADGES ── */
        .bg-comp{background:rgba(25,200,90,.18)!important;color:#3ddc84!important;border:1px solid #3ddc8460!important;}
        .bg-proc{background:rgba(13,132,96,.22)!important;color:#20c997!important;border:1px solid #20c99760!important;}
        .bg-urg {background:rgba(230,57,70,.2)!important;color:#ff6b6b!important;border:1px solid #ff6b6b60!important;}
        .bg-pend{background:rgba(108,117,125,.25)!important;color:#adb5bd!important;border:1px solid #adb5bd40!important;}
        .bg-rep {background:rgba(255,193,7,.18)!important;color:#ffd60a!important;border:1px solid #ffd60a60!important;}
        .bg-mant{background:rgba(25,200,90,.18)!important;color:#3ddc84!important;border:1px solid #3ddc8460!important;}

        /* ── GENERAL BUTTONS ── */
        .btn-toreto{background:var(--fire);border:none;color:#fff;font-weight:600;border-radius:8px;
            padding:.48rem 1.2rem;transition:all .22s ease;letter-spacing:.4px;}
        .btn-toreto:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(230,57,70,.38);color:#fff;}
        .btn-ghost{background:transparent;border:1px solid rgba(230,57,70,.4);color:var(--tr-orange);
            border-radius:8px;padding:.38rem .95rem;font-size:.8rem;transition:all .2s;}
        .btn-ghost:hover{background:rgba(230,57,70,.12);border-color:var(--tr-orange);color:#fff;}
        .btn-del{background:transparent;border:1px solid rgba(220,53,69,.35);color:#ff6b6b;
            border-radius:8px;padding:.38rem .85rem;font-size:.78rem;transition:all .2s;}
        .btn-del:hover{background:rgba(220,53,69,.14);color:#fff;}

        /* ── FORMS ── */
        .form-control,.form-select{background:rgba(255,255,255,.06)!important;border:1px solid rgba(255,255,255,.12)!important;
            color:#e0e0e0!important;border-radius:8px!important;}
        .form-control:focus,.form-select:focus{border-color:var(--tr-orange)!important;
            box-shadow:0 0 0 3px rgba(244,128,26,.18)!important;background:rgba(255,255,255,.09)!important;}
        .form-label{color:var(--tr-muted);font-size:.8rem;font-weight:500;letter-spacing:.4px;text-transform:uppercase;}
        .form-select option,.form-control option{background:#1a1a2e;}

        /* ── PAGE HEADER ── */
        .page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;
            padding-bottom:1rem;border-bottom:1px solid rgba(230,57,70,.2);}
        .page-title{font-family:'Rajdhani',sans-serif;font-size:1.7rem;font-weight:700;color:#fff;margin:0;letter-spacing:1px;}
        .page-title span{color:var(--tr-orange);}

        /* ── FOOTER ── */
        .toreto-footer{background:rgba(0,0,0,.35);border-top:1px solid rgba(230,57,70,.14);
            padding:1.1rem 0;margin-top:3rem;color:var(--tr-muted);font-size:.82rem;}
        .footer-brand{font-family:'Rajdhani',sans-serif;font-weight:700;background:var(--fire);
            -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}

        /* ── MISC ── */
        .alert-t{background:rgba(230,57,70,.14);border:1px solid rgba(230,57,70,.3);color:#ff9999;border-radius:10px;}
        ::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-track{background:#111;}
        ::-webkit-scrollbar-thumb{background:rgba(230,57,70,.4);border-radius:4px;}
        .fade-in-up{animation:fadeUp .5s ease both;}
        @keyframes fadeUp{from{opacity:0;transform:translateY(18px);}to{opacity:1;transform:translateY(0);}}
    </style>
</head>
<body>

<!-- SPLASH -->
<div id="splash">
    <div class="splash-icon">⚙️</div>
    <div class="splash-logo">TALLERES TORETO</div>
    <div class="splash-sub">Sistema de Gestión Automotriz</div>
    <div class="splash-bar"><div class="splash-fill"></div></div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-toreto sticky-top">
    <div class="container">
        <a class="navbar-brand brand-name" href="<?= base_url('/') ?>">⚙️ TORETO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <i class="bi bi-list text-white fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item"><a href="<?= base_url('/') ?>"              class="nav-link nav-link-t"><i class="bi bi-house-door me-1"></i>Inicio</a></li>
                <li class="nav-item"><a href="<?= base_url('taller') ?>"          class="nav-link nav-link-t"><i class="bi bi-building-gear me-1"></i>Talleres</a></li>
                <li class="nav-item"><a href="<?= base_url('vehiculo/deku') ?>"   class="nav-link nav-link-t"><i class="bi bi-car-front me-1"></i>Vehículos</a></li>
                <li class="nav-item"><a href="<?= base_url('orden') ?>"           class="nav-link nav-link-t"><i class="bi bi-clipboard2-check me-1"></i>Órdenes</a></li>
                <li class="nav-item"><a href="<?= base_url('repuesto') ?>"        class="nav-link nav-link-t"><i class="bi bi-gear-wide-connected me-1"></i>Repuestos</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4 fade-in-up">
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-t mb-3"><i class="bi bi-exclamation-triangle me-2"></i><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<?= $this->renderSection('content') ?>
</div>

<footer class="toreto-footer text-center">
    <div class="container">
        <span class="footer-brand">TALLERES TORETO</span>
        <span class="mx-2">·</span>Sistema de Gestión Automotriz<span class="mx-2">·</span>© <?= date('Y') ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Ocultar splash
    setTimeout(() => { document.getElementById('splash').style.display = 'none'; }, 3500);
    // Marcar nav activo
    const path = location.pathname;
    document.querySelectorAll('.nav-link-t').forEach(l => {
        const lp = new URL(l.href).pathname;
        if (lp !== '/' && path.startsWith(lp)) l.classList.add('active');
        else if (lp === '/' && path === '/') l.classList.add('active');
    });
});
</script>
<?= $this->renderSection('script') ?>
</body>
</html>
