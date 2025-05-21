<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Používateľská príručka - MyABe-PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.6;
            margin: 2cm;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-top: 30px;
        }
        h3 {
            color: #3d566e;
        }
        .section {
            margin-bottom: 30px;
        }
        .toc {
            margin-bottom: 40px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
        .function-item {
            margin-bottom: 25px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .note {
            background-color: #f8f9fa;
            border-left: 4px solid #3490dc;
            padding: 1rem;
            margin: 1rem 0;
        }
        ol, ul {
            padding-left: 20px;
        }
        .footer {
            font-size: 0.8em;
            text-align: center;
            color: #666;
            margin-top: 50px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<h1>Používateľská príručka - MyABe-PDF</h1>

<div class="toc">
    <h2>Obsah</h2>
    <ul>
        <li><a href="#uvod">Úvod</a></li>
        <li><a href="#zakladne-funkcie">Základné funkcie</a></li>
        <li><a href="#pokrocile-funkcie">Pokročilé funkcie</a></li>
        <li><a href="#api">API prístup</a></li>
        <li><a href="#admin">Admin funkcie</a></li>
        <li><a href="#faq">Často kladené otázky</a></li>
    </ul>
</div>

<div id="uvod" class="section">
    <h2>Úvod</h2>
    <p>Vitajte v používateľskej príručke pre aplikáciu MyABe-PDF. Táto webová aplikácia, vytvorená v Laraveli, ponúka 10 praktických nástrojov na úpravu PDF dokumentov. Aplikácia využíva Laravel Breeze starter kit pre registráciu a prihlasovanie používateľov.</p>
    <p>Aplikácia je dostupná v slovenskom a anglickom jazyku, pričom jazykové nastavenie je možné zmeniť v pravom hornom rohu.</p>
</div>

<div id="zakladne-funkcie" class="section">
    <h2>Základné funkcie</h2>

    <div class="function-item">
        <h3>1. Zlúčenie PDF</h3>
        <ol>
            <li>Kliknite na "Zlúčiť PDF"</li>
            <li>Vyberte súbory pomocou tlačidla "Vyber súbory" (môžete vybrať viacero súborov naraz)</li>
            <li>Po načítaní súborov kliknite na "Zlúčiť"</li>
            <li>Stiahnite si výsledný zlúčený dokument</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>2. Rozdelenie PDF</h3>
        <ol>
            <li>Kliknite na "Rozdeľ PDF"</li>
            <li>Nahrajte súbor, ktorý chcete rozdeliť</li>
            <li>Zadajte rozsahy strán alebo označte miesta rozdelenia</li>
            <li>Kliknite na "Rozdeľ" a stiahnite si výsledné časti</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>3. Odomknutie PDF</h3>
        <ol>
            <li>Kliknite na "Odomkni PDF"</li>
            <li>Nahrajte chránený súbor</li>
            <li>Zadajte heslo (ak ho poznáte)</li>
            <li>Stiahnite si odomknutú verziu dokumentu</li>
        </ol>
    </div>
</div>

<div id="pokrocile-funkcie" class="section">
    <h2>Pokročilé funkcie</h2>

    <div class="function-item">
        <h3>4. Zamknutie PDF</h3>
        <ol>
            <li>Kliknite na "Zamkni PDF"</li>
            <li>Nahrajte súbor</li>
            <li>Nastavte požadované heslo a úroveň ochrany</li>
            <li>Stiahnite si chránený dokument</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>5. Odstránenie strán</h3>
        <ol>
            <li>Vyberte "Odstráň stránky"</li>
            <li>Nahrajte súbor</li>
            <li>Označte stránky, ktoré chcete odstrániť</li>
            <li>Uložte si upravený dokument</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>6. Extrahovanie strán</h3>
        <ol>
            <li>Kliknite na "Extrahuj stránky"</li>
            <li>Nahrajte súbor</li>
            <li>Vyberte stránky, ktoré chcete extrahovať</li>
            <li>Stiahnite si výber</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>7. Pridanie strán</h3>
        <ol>
            <li>Vyberte "Pridaj stránky"</li>
            <li>Nahrajte hlavný dokument</li>
            <li>Pridajte ďalšie stránky z iného súboru</li>
            <li>Určte pozíciu vloženia</li>
            <li>Uložte výsledok</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>8. Vytvorenie PDF</h3>
        <ol>
            <li>Kliknite na "Vytvor PDF"</li>
            <li>Nahrajte zdrojové súbory (Word, Excel, obrázky)</li>
            <li>Upravte poradie a nastavenia</li>
            <li>Vytvorte a stiahnite si nový PDF dokument</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>9. Konverzia PDF do Wordu</h3>
        <ol>
            <li>Vyberte "PDF do Wordu"</li>
            <li>Nahrajte PDF súbor</li>
            <li>Počkajte na dokončenie konverzie</li>
            <li>Stiahnite si Word dokument</li>
        </ol>
    </div>

    <div class="function-item">
        <h3>10. Konverzia JPG na PDF</h3>
        <ol>
            <li>Kliknite na "JPG na PDF"</li>
            <li>Nahrajte jeden alebo viac obrázkov</li>
            <li>Upravte poradie a orientáciu</li>
            <li>Konvertujte a stiahnite si výsledné PDF</li>
        </ol>
    </div>
</div>

<div id="api" class="section">
    <h2>API prístup</h2>
    <div class="function-item">
        <h3>Používanie API kľúčov</h3>

        <p>Pre prístup k API funkciám je potrebné generovať API kľúč:</p>

        <ol>
            <li>V menu prejdite do "Môj profil" a otvorte sekciu "API kľúče"</li>
            <li>Zadajte popisný názov pre váš kľúč</li>
            <li>Kliknite na "VYTVORIŤ KĽÚČ"</li>
            <li>Nový API kľúč sa zobrazí - nezabudnite si ho uložiť, lebo sa zobrazí len raz!</li>
        </ol>

        <p>Po vytvorení kľúča:</p>
        <ul>
            <li>Kľúč môžete kedykoľvek zrušiť</li>
            <li>Pre každú aplikáciu odporúčame vytvoriť samostatný kľúč</li>
            <li>Pri stratení kľúča ho jednoducho zrušte a vytvorte nový</li>
        </ul>

        <div class="note">
            <strong>Upozornenie:</strong> API kľúč je rovnako citlivý ako vaše heslo. Chráňte ho pred zneužitím.
        </div>
    </div>
</div>

<div id="admin" class="section">
    <h2>Admin funkcie</h2>
    <div class="function-item">
        <h3>Prehľad API volaní</h3>

        <ul>
            <li>Prezerať históriu API volaní</li>
            <li>Mazať celu históriu</li>
            <li>Exportovať záznamy do CSV formátu</li>
        </ul>
    </div>
</div>



<div class="footer">
    Dokument vygenerovaný dňa: {{ now()->format('d.m.Y H:i') }}<br>
    Verzia príručky: 3.4.2
</div>
</body>
</html>
