<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Ratisabilla Snack' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f5efe5;
            --surface: #fffdf9;
            --surface-strong: #fff7ee;
            --text: #24140d;
            --muted: #75594b;
            --accent: #a94f2a;
            --accent-dark: #6d2d14;
            --accent-soft: #ecd3c6;
            --gold: #d79d3d;
            --line: rgba(62, 29, 18, 0.10);
            --shadow: 0 24px 50px rgba(67, 33, 18, 0.10);
            --radius-xl: 28px;
            --radius-lg: 20px;
            --radius-md: 14px;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(215, 157, 61, 0.22), transparent 30%),
                radial-gradient(circle at right center, rgba(169, 79, 42, 0.10), transparent 24%),
                var(--bg);
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Lora', Georgia, serif;
            font-weight: 700;
            margin: 0;
            line-height: 1.08;
        }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }
        .container { width: min(1140px, calc(100% - 32px)); margin: 0 auto; }
        .eyebrow { padding: 12px 0 0; color: var(--muted); font-size: 0.92rem; }
        .nav { display: flex; align-items: center; justify-content: space-between; padding: 18px 0 24px; gap: 16px; flex-wrap: wrap; }
        .brand { font-size: 1.35rem; font-weight: 700; letter-spacing: 0.04em; font-family: 'Lora', Georgia, serif; }
        .brand small { display: block; font-size: 0.72rem; color: var(--muted); letter-spacing: 0.16em; text-transform: uppercase; }
        .nav-links, .actions, .badge-row { display: flex; gap: 10px; flex-wrap: wrap; }
        .pill, button.pill {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 11px 18px; border-radius: 999px; border: 1px solid var(--line);
            background: rgba(255,255,255,0.82); color: var(--text); font-weight: 700; cursor: pointer;
        }
        .pill.primary { background: var(--accent); color: #fff7f0; border-color: var(--accent); }
        .pill.secondary { background: #fff; }
        .pill.ghost { background: transparent; }
        .hero, .panel {
            background: linear-gradient(180deg, rgba(255,255,255,0.96), rgba(255,247,236,0.92));
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
        }
        .hero { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 28px; padding: 34px; }
        .hero-badge, .mini-badge, .tag {
            display: inline-block;
            border-radius: 999px;
            font-size: 0.84rem;
        }
        .hero-badge {
            padding: 8px 14px;
            background: rgba(223, 159, 52, 0.16);
            color: var(--accent-dark);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .mini-badge {
            padding: 8px 12px;
            background: rgba(215, 157, 61, 0.14);
            color: var(--accent-dark);
        }
        h1 { font-size: clamp(2.4rem, 4vw, 4.6rem); margin-top: 16px; }
        .lead { font-size: 1.04rem; line-height: 1.8; color: var(--muted); max-width: 58ch; }
        .metrics, .grid { display: grid; gap: 18px; }
        .metrics { grid-template-columns: repeat(3, 1fr); margin-top: 24px; }
        .metric, .card {
            background: rgba(255,255,255,0.88);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
        }
        .metric { padding: 18px; }
        .metric strong { display: block; font-size: 1.75rem; margin-bottom: 6px; }
        .split-grid { display: grid; gap: 18px; grid-template-columns: 1.15fr 0.85fr; }
        .hero-card {
            align-self: stretch;
            padding: 24px;
            background: linear-gradient(160deg, #5f2d18, #8e3f1b 55%, #d17d27);
            color: #fff8ef;
            border-radius: var(--radius-xl);
            overflow: hidden;
        }
        .list-clean { margin: 0; padding: 0; list-style: none; }
        .list-clean li { padding: 14px 0; border-bottom: 1px solid var(--line); }
        .section { padding: 42px 0; }
        .section-title { display: flex; justify-content: space-between; align-items: end; gap: 16px; margin-bottom: 22px; }
        .section-title p, .muted { margin: 0; color: var(--muted); }
        .cards { grid-template-columns: repeat(3, 1fr); }
        .card { overflow: hidden; box-shadow: var(--shadow); }
        .card-body { padding: 18px; }
        .detail-grid { display: grid; grid-template-columns: 1fr 1fr; }
        .detail-metrics { grid-template-columns: repeat(3, 1fr); margin: 22px 0; }
        .thumb { height: 220px; background: #f1ddc7; object-fit: cover; width: 100%; }
        .tag { padding: 6px 10px; background: rgba(191,91,44,0.1); color: var(--accent-dark); }
        .price { font-size: 1.3rem; font-weight: 700; color: var(--accent-dark); }
        .panel { padding: 24px; }
        .panel.soft { background: linear-gradient(180deg, rgba(255,252,247,0.95), rgba(250,242,232,0.95)); }
        .summary-box {
            padding: 18px;
            border-radius: var(--radius-lg);
            background: var(--surface-strong);
            border: 1px solid var(--line);
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px 16px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
        th { background: rgba(223,159,52,0.14); }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .form-group.full { grid-column: 1 / -1; }
        input, textarea, select {
            width: 100%;
            padding: 13px 14px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: #fffdf8;
            font: inherit;
            color: var(--text);
        }
        textarea { min-height: 140px; resize: vertical; }
        .flash { margin-bottom: 18px; padding: 14px 16px; border-radius: 14px; background: rgba(70, 148, 87, 0.14); border: 1px solid rgba(70, 148, 87, 0.22); color: #1d5d2b; }
        .error-list { margin: 0 0 18px; padding: 14px 18px 14px 34px; border-radius: 14px; background: rgba(181, 55, 55, 0.08); border: 1px solid rgba(181, 55, 55, 0.16); }
        footer { padding: 32px 0 48px; color: var(--muted); }
        @media (max-width: 920px) {
            .hero, .cards, .form-grid, .metrics, .detail-grid, .detail-metrics, .split-grid { grid-template-columns: 1fr; }
            .section-title { align-items: start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <header class="container">
        <div class="eyebrow">Snack khas Solo untuk oleh-oleh, hampers, dan pesanan keluarga</div>
        <nav class="nav">
            <a class="brand" href="{{ route('home') }}">
                Ratisabilla Snack
                <small>Oleh-oleh Solo</small>
            </a>
            <div class="nav-links">
                <a class="pill" href="{{ route('home') }}">Beranda</a>
                <a class="pill" href="{{ route('catalog.index') }}">Katalog</a>
                <a class="pill" href="{{ route('transactions.index') }}">Transaksi</a>
                <a class="pill ghost" href="{{ route('products.index') }}">Dashboard Produk</a>
                <a class="pill primary" href="{{ route('transactions.create') }}">Pesan Sekarang</a>
            </div>
        </nav>
    </header>

    <main class="container">
        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @yield('content')
    </main>

    <footer class="container">
        <p>Ratisabilla Snack menghadirkan katalog camilan khas Solo, pemesanan praktis, dan layanan oleh-oleh yang siap dikirim atau diambil langsung di toko.</p>
    </footer>
</body>
</html>
