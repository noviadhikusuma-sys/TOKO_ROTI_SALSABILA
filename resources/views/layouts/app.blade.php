<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Rati Salsabila Snack' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0b10;
            --bg-soft: #12141c;
            --surface: rgba(20, 22, 32, 0.88);
            --surface-strong: rgba(28, 31, 44, 0.96);
            --surface-highlight: rgba(255, 255, 255, 0.04);
            --text: #f5efe4;
            --muted: #bbaea1;
            --accent: #ff8a3d;
            --accent-dark: #ffd3a4;
            --accent-soft: rgba(255, 138, 61, 0.18);
            --gold: #f7bd61;
            --line: rgba(255, 255, 255, 0.10);
            --shadow: 0 28px 70px rgba(0, 0, 0, 0.38);
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
                radial-gradient(circle at top left, rgba(255, 138, 61, 0.24), transparent 24%),
                radial-gradient(circle at top right, rgba(247, 189, 97, 0.18), transparent 18%),
                radial-gradient(circle at 50% 120%, rgba(96, 67, 255, 0.14), transparent 28%),
                var(--bg);
            min-height: 100vh;
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
        .eyebrow { padding: 14px 0 0; color: rgba(255, 211, 164, 0.82); font-size: 0.88rem; letter-spacing: 0.08em; text-transform: uppercase; }
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px;
            gap: 16px;
            flex-wrap: wrap;
            margin: 18px 0 24px;
            background: rgba(15, 17, 26, 0.72);
            border: 1px solid var(--line);
            border-radius: 999px;
            backdrop-filter: blur(16px);
            box-shadow: var(--shadow);
        }
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            font-family: 'Lora', Georgia, serif;
        }
        .brand small { display: block; font-size: 0.72rem; color: rgba(255, 211, 164, 0.68); letter-spacing: 0.16em; text-transform: uppercase; }
        .brand-copy { display: flex; flex-direction: column; gap: 2px; }
        .brand-logo {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.28);
            background: #fff6ee;
            flex-shrink: 0;
        }
        .nav-links, .actions, .badge-row { display: flex; gap: 10px; flex-wrap: wrap; }
        .pill, button.pill {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 11px 18px; border-radius: 999px; border: 1px solid var(--line);
            background: rgba(255,255,255,0.04); color: var(--text); font-weight: 700; cursor: pointer;
            backdrop-filter: blur(10px);
            transition: transform 180ms ease, border-color 180ms ease, background 180ms ease, box-shadow 180ms ease;
        }
        .pill:hover, button.pill:hover { transform: translateY(-1px); border-color: rgba(255, 138, 61, 0.45); box-shadow: 0 10px 24px rgba(0, 0, 0, 0.22); }
        .pill.primary { background: linear-gradient(135deg, #ff8a3d, #ffb25b); color: #21140a; border-color: rgba(255, 178, 91, 0.78); }
        .pill.secondary { background: rgba(255,255,255,0.09); }
        .pill.ghost { background: transparent; }
        .hero, .panel {
            background: linear-gradient(180deg, rgba(22, 24, 36, 0.95), rgba(15, 17, 27, 0.92));
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }
        .hero { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 28px; padding: 34px; }
        .hero-badge, .mini-badge, .tag {
            display: inline-block;
            border-radius: 999px;
            font-size: 0.84rem;
        }
        .hero-badge {
            padding: 8px 14px;
            background: rgba(255, 138, 61, 0.14);
            color: var(--gold);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .mini-badge {
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.08);
            color: #fff5ea;
        }
        h1 { font-size: clamp(2.4rem, 4vw, 4.6rem); margin-top: 16px; }
        .lead { font-size: 1.04rem; line-height: 1.8; color: var(--muted); max-width: 58ch; }
        .metrics, .grid { display: grid; gap: 18px; }
        .metrics { grid-template-columns: repeat(3, 1fr); margin-top: 24px; }
        .metric, .card {
            background: linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.03));
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
        }
        .metric { padding: 18px; }
        .metric strong { display: block; font-size: 1.75rem; margin-bottom: 6px; color: #fff7ef; }
        .split-grid { display: grid; gap: 18px; grid-template-columns: 1.15fr 0.85fr; }
        .hero-card {
            align-self: stretch;
            padding: 24px;
            background:
                radial-gradient(circle at top, rgba(255, 211, 164, 0.22), transparent 30%),
                linear-gradient(160deg, #201526, #4d2519 55%, #c25a20);
            color: #fff8ef;
            border-radius: var(--radius-xl);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.12);
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
        .thumb {
            height: 220px;
            background: linear-gradient(160deg, rgba(255, 138, 61, 0.14), rgba(96, 67, 255, 0.12));
            object-fit: cover;
            width: 100%;
        }
        .tag { padding: 6px 10px; background: rgba(255, 138, 61, 0.12); color: #ffd7a8; }
        .price { font-size: 1.3rem; font-weight: 700; color: #ffd8ad; }
        .panel { padding: 24px; }
        .panel.soft { background: linear-gradient(180deg, rgba(31, 34, 49, 0.95), rgba(21, 24, 36, 0.95)); }
        .summary-box {
            padding: 18px;
            border-radius: var(--radius-lg);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--line);
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px 16px; border-bottom: 1px solid var(--line); text-align: left; vertical-align: top; }
        th { background: rgba(255, 138, 61, 0.12); color: #ffe5c6; }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .form-group.full { grid-column: 1 / -1; }
        input, textarea, select {
            width: 100%;
            padding: 13px 14px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.05);
            font: inherit;
            color: var(--text);
        }
        input::placeholder, textarea::placeholder { color: rgba(245, 239, 228, 0.42); }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: rgba(255, 138, 61, 0.55);
            box-shadow: 0 0 0 4px rgba(255, 138, 61, 0.12);
        }
        textarea { min-height: 140px; resize: vertical; }
        .flash { margin-bottom: 18px; padding: 14px 16px; border-radius: 14px; background: rgba(70, 148, 87, 0.16); border: 1px solid rgba(117, 220, 145, 0.26); color: #d8ffe1; }
        .error-list { margin: 0 0 18px; padding: 14px 18px 14px 34px; border-radius: 14px; background: rgba(181, 55, 55, 0.12); border: 1px solid rgba(255, 117, 117, 0.18); color: #ffd3d3; }
        footer { padding: 32px 0 48px; color: var(--muted); }
        .pagination { display: flex; flex-wrap: wrap; gap: 10px; }
        .pagination * { color: var(--text); }
        ::selection { background: rgba(255, 138, 61, 0.35); color: #fff7ef; }
        @media (max-width: 920px) {
            .hero, .cards, .form-grid, .metrics, .detail-grid, .detail-metrics, .split-grid { grid-template-columns: 1fr; }
            .section-title { align-items: start; flex-direction: column; }
            .nav { border-radius: 24px; }
        }
    </style>
</head>
<body>
    <header class="container">
        <div class="eyebrow">Snack khas Solo untuk oleh-oleh, hampers, dan pesanan keluarga</div>
        <nav class="nav">
            <a class="brand" href="{{ route('home') }}">
                <img class="brand-logo" src="{{ asset('images/brand/salsa-logo.png') }}" alt="Logo Rati Salsabila Snack">
                <span class="brand-copy">
                    <span>Rati Salsabila Snack</span>
                    <small>Oleh-oleh Solo</small>
                </span>
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
        <p>Rati Salsabila Snack menghadirkan katalog camilan khas Solo, pemesanan praktis, dan layanan oleh-oleh yang siap dikirim atau diambil langsung di toko.</p>
    </footer>
</body>
</html>
