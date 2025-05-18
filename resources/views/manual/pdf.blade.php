<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #2c3e50; text-align: center; }
        .section { margin-bottom: 20px; }
        .toc { margin-bottom: 30px; }
        .footer { font-size: 0.8em; text-align: right; color: #666; }
    </style>
</head>
<body>
<h1>{{ $title }}</h1>

<div class="toc">
    <h2>Obsah</h2>
    <ul>
        <li>Úvod</li>
        <li>Registrácia a prihlásenie</li>
        <li>Základné funkcie</li>
        <!-- Pridajte ďalšie položky -->
    </ul>
</div>

<div class="section">
    <h2>Úvod</h2>
    <p>Vitajte v používateľskej príručke pre IGA GUI...</p>
</div>

<!-- Ďalšie sekcie -->

<div class="footer">
    Dokument vygenerovaný dňa: {{ now()->format('d.m.Y H:i') }}
</div>
</body>
</html>
