<x-app-layout>
    <div class="container manual-container">

        <h1 class="manual-title">Používateľská príručka - MyABe-PDF</h1>
        <div class="manual-actions">
            <a href="{{ route('manual.download') }}" class="download-btn btn-primary">
                <i class="fas fa-file-pdf"></i> Stiahnuť PDF verziu
            </a>
        </div>
        <br>
        <div class="manual-toc">
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

        <section id="uvod" class="manual-section">
            <h2>Úvod</h2>
            <p>Vitajte v používateľskej príručke pre aplikáciu MyABe-PDF. Táto webová aplikácia, vytvorená v Laraveli, ponúka 10 praktických nástrojov na úpravu PDF dokumentov. Aplikácia využíva Laravel Breeze starter kit pre registráciu a prihlasovanie používateľov.</p>
            <p>Aplikácia je dostupná v slovenskom a anglickom jazyku, pričom jazykové nastavenie je možné zmeniť v pravom hornom rohu.</p>
        </section>

        <section id="zakladne-funkcie" class="manual-section">
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
        </section>

        <section id="pokrocile-funkcie" class="manual-section">
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
        </section>

        <section id="api" class="manual-section">
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

                <p class="text-warning"><strong>Upozornenie:</strong> API kľúč je rovnako citlivý ako vaše heslo. Chráňte ho pred zneužitím.</p>
            </div>
        </section>

        <section id="admin" class="manual-section">
            <h2>Admin funkcie</h2>
            <div class="function-item">
                <h3>Prehľad API volaní</h3>

                <ul>
                    <li>Prezerať históriu API volaní</li>
                    <li>Mazať celu históriu</li>
                    <li>Exportovať záznamy do CSV formátu</li>
                </ul>
            </div>
        </section>


        <div class="manual-footer">
            <p>Posledná aktualizácia: {{ now()->format('d.m.Y') }}</p>
        </div>
    </div>

    <style>
        .manual-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            position: relative;
        }

        .language-switcher {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .language-switcher .active {
            background-color: #3490dc;
            color: white;
        }

        .manual-title {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            padding-top: 10px;
        }

        .manual-toc {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .manual-section {
            margin-bottom: 40px;
        }

        .function-item, .faq-item {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .function-item h3, .faq-item h3 {
            color: #3490dc;
            margin-top: 0;
        }

        .manual-footer {
            text-align: center;
            margin-top: 50px;
            color: #6c757d;
            font-size: 0.9em;
        }

        ol, ul {
            padding-left: 20px;
        }

        .download-btn {
            background: #1976d2; color: #fff; border: none; padding: 12px 24px;
            border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold;
            transition: background 0.2s; 
        }

        .download-btn:hover {
            background: #155a8a;
        }
    </style>
</x-app-layout>
