<style>
    .manual-container {
        max-width: 900px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        line-height: 1.6;
    }

    .manual-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .manual-title {
        color: #2c3e50;
        margin: 0;
    }

    .download-pdf {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .manual-toc {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 5px;
        margin-bottom: 2rem;
    }

    .toc-title {
        margin-top: 0;
        color: #2c3e50;
    }

    .toc-list {
        padding-left: 1.5rem;
    }

    .toc-list li {
        margin-bottom: 0.5rem;
    }

    .toc-list a {
        color: #3490dc;
        text-decoration: none;
    }

    .toc-list a:hover {
        text-decoration: underline;
    }

    .manual-section {
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #eee;
    }

    .manual-section h2 {
        color: #2c3e50;
        margin-top: 0;
    }

    .manual-section h3 {
        color: #3d566e;
    }

    .operation-guide {
        margin-bottom: 2rem;
    }

    .manual-image {
        margin: 1.5rem 0;
        text-align: center;
    }

    .manual-image img {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .image-caption {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 0.5rem;
    }

    .note {
        background-color: #f8f9fa;
        border-left: 4px solid #3490dc;
        padding: 1rem;
        margin: 1rem 0;
    }

    .faq-item {
        margin-bottom: 1.5rem;
    }

    .faq-item h3 {
        margin-bottom: 0.5rem;
        color: #3d566e;
    }

    .manual-footer {
        text-align: center;
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 3rem;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    @media (max-width: 768px) {
        .manual-container {
            padding: 1rem;
        }

        .manual-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }
</style>

<x-app-layout>
    <div class="manual-container">
        <div class="manual-header">
            <h1 class="manual-title">Používateľská príručka - PDF Editor</h1>
            <a href="{{ route('manual.download') }}" class="btn btn-primary download-pdf">
                <i class="fas fa-file-pdf"></i> Stiahnuť PDF verziu
            </a>
        </div>

        <div class="manual-toc card">
            <h2 class="toc-title">Obsah</h2>
            <ol class="toc-list">
                <li><a href="#uvod">Úvod</a></li>
                <li><a href="#registracia">Registrácia a prihlásenie</a></li>
                <li><a href="#zakladne-operacie">Základné operácie</a>
                    <ol>
                        <li><a href="#merge">Spájanie PDF</a></li>
                        <li><a href="#split">Rozdelenie PDF</a></li>
                        <li><a href="#unlock">Odomknutie PDF</a></li>
                        <li><a href="#rotate">Otočenie stránky</a></li>
                        <li><a href="#remove">Odstránenie stránky</a></li>
                    </ol>
                </li>
                <li><a href="#pokrocile-funkcie">Pokročilé funkcie</a>
                    <ol>
                        <li><a href="#extract">Extrahovanie stránky</a></li>
                        <li><a href="#pagenumber">Pridanie číslovania</a></li>
                        <li><a href="#create">Vytvorenie PDF</a></li>
                        <li><a href="#pdf2word">Konverzia na Word</a></li>
                        <li><a href="#jpg2pdf">Konverzia obrázkov na PDF</a></li>
                    </ol>
                </li>
                <li><a href="#admin">Administrátorský mód</a></li>
                <li><a href="#faq">Časté otázky</a></li>
            </ol>
        </div>

        <div class="manual-content">
            <section id="uvod" class="manual-section">
                <h2>1. Úvod</h2>
                <p>Vitajte v používateľskej príručke pre <strong>PDF Editor</strong> - výkonného nástroja na úpravu PDF dokumentov. Táto aplikácia ponúka 10 rôznych operácií s PDF súbormi.</p>
                <div class="manual-image">
                    <img src="{{ asset('images/manual/main-interface.png') }}" alt="Hlavné rozhranie aplikácie" class="img-fluid">
                    <p class="image-caption">Obrázok 1: Hlavné rozhranie aplikácie</p>
                </div>
            </section>

            <section id="registracia" class="manual-section">
                <h2>2. Registrácia a prihlásenie</h2>
                <h3>2.1 Registrácia</h3>
                <ol>
                    <li>Kliknite na "Registrovať" v pravom hornom rohu</li>
                    <li>Vyplňte požadované údaje (e-mail, heslo)</li>
                    <li>Potvrďte registráciu kliknutím na odkaz v overovacom e-maile</li>
                </ol>

                <h3>2.2 Prihlásenie</h3>
                <ol>
                    <li>Zadajte svoje prihlasovacie údaje</li>
                    <li>Kliknite na "Prihlásiť sa"</li>
                </ol>
                <div class="manual-image">
                    <img src="{{ asset('images/manual/login-screen.png') }}" alt="Prihlasovacia obrazovka" class="img-fluid">
                    <p class="image-caption">Obrázok 2: Prihlasovacia obrazovka</p>
                </div>
            </section>

            <section id="zakladne-operacie" class="manual-section">
                <h2>3. Základné operácie</h2>

                <article id="merge" class="operation-guide">
                    <h3>3.1 Spájanie PDF súborov</h3>
                    <ol>
                        <li>Vyberte operáciu "Spojiť PDF"</li>
                        <li>Nahrajte 2 alebo viac PDF súborov</li>
                        <li>Zadajte názov výstupného súboru</li>
                        <li>Kliknite na "Spustiť operáciu"</li>
                        <li>Stiahnite si výsledný súbor</li>
                    </ol>
                    <div class="manual-image">
                        <img src="{{ asset('images/manual/merge-interface.png') }}" alt="Rozhranie pre spájanie PDF" class="img-fluid">
                        <p class="image-caption">Obrázok 3: Rozhranie pre spájanie PDF</p>
                    </div>
                </article>

                <article id="split" class="operation-guide">
                    <h3>3.2 Rozdelenie PDF</h3>
                    <ol>
                        <li>Vyberte operáciu "Rozdeliť PDF"</li>
                        <li>Nahrajte PDF súbor</li>
                        <li>Zvoľte možnosť rozdelenia:
                            <ul>
                                <li><strong>Na jednotlivé strany</strong> - vytvorí samostatné PDF pre každú stranu</li>
                                <li><strong>Podľa rozsahu</strong> - zadajte rozsah strán (napr. 1-3,5,7-9)</li>
                            </ul>
                        </li>
                        <li>Kliknite na "Spustiť"</li>
                    </ol>
                </article>

                <article id="unlock" class="operation-guide">
                    <h3>3.3 Odomknutie PDF</h3>
                    <ol>
                        <li>Vyberte operáciu "Odomknúť PDF"</li>
                        <li>Nahrajte chránený PDF súbor</li>
                        <li>Zadajte heslo</li>
                        <li>Kliknite na "Odomknúť"</li>
                    </ol>
                    <div class="note">
                        <strong>Poznámka:</strong> Táto funkcia funguje len pre PDF súbory chránené heslom, nie pre digitálne podpisané dokumenty.
                    </div>
                </article>

                <article id="rotate" class="operation-guide">
                    <h3>3.4 Otočenie stránky</h3>
                    <ol>
                        <li>Vyberte operáciu "Otočiť stránku"</li>
                        <li>Nahrajte PDF súbor</li>
                        <li>Zadajte číslo stránky, ktorú chcete otočiť</li>
                        <li>Zvoľte uhol otočenia (90°, 180° alebo 270°)</li>
                        <li>Kliknite na "Otočiť"</li>
                    </ol>
                </article>

                <article id="remove" class="operation-guide">
                    <h3>3.5 Odstránenie stránky</h3>
                    <ol>
                        <li>Vyberte operáciu "Odstrániť stránku"</li>
                        <li>Nahrajte PDF súbor</li>
                        <li>Zadajte číslo stránky na odstránenie</li>
                        <li>Kliknite na "Odstrániť"</li>
                    </ol>
                </article>
            </section>

            <section id="pokrocile-funkcie" class="manual-section">
                <h2>4. Pokročilé funkcie</h2>

                <article id="extract" class="operation-guide">
                    <h3>4.1 Extrahovanie stránky</h3>
                    <ol>
                        <li>Vyberte operáciu "Extrahovať stránku"</li>
                        <li>Nahrajte PDF súbor</li>
                        <li>Zadajte číslo stránky na extrahovanie</li>
                        <li>Kliknite na "Extrahovať"</li>
                    </ol>
                </article>

                <article id="pagenumber" class="operation-guide">
                    <h3>4.2 Pridanie číslovania strán</h3>
                    <ol>
                        <li>Vyberte operáciu "Pridať číslovanie"</li>
                        <li>Nahrajte PDF súbor</li>
                        <li>Zvoľte pozíciu číslovania (napr. spodný stred)</li>
                        <li>Zadajte začiatočné číslo (zvyčajne 1)</li>
                        <li>Kliknite na "Pridať"</li>
                    </ol>
                </article>

                <article id="create" class="operation-guide">
                    <h3>4.3 Vytvorenie PDF</h3>
                    <ol>
                        <li>Vyberte operáciu "Vytvoriť PDF"</li>
                        <li>Zadajte textový obsah</li>
                        <li>Zadajte názov výstupného súboru</li>
                        <li>Kliknite na "Vytvoriť"</li>
                    </ol>
                </article>

                <article id="pdf2word" class="operation-guide">
                    <h3>4.4 Konverzia PDF na Word</h3>
                    <ol>
                        <li>Vyberte operáciu "PDF na Word"</li>
                        <li>Nahrajte PDF súbor</li>
                        <li>Zadajte názov výstupného súboru</li>
                        <li>Kliknite na "Konvertovať"</li>
                    </ol>
                    <div class="note">
                        <strong>Poznámka:</strong> Formátovanie môže byť pri konverzii mierne zmenené.
                    </div>
                </article>

                <article id="jpg2pdf" class="operation-guide">
                    <h3>4.5 Konverzia obrázkov na PDF</h3>
                    <ol>
                        <li>Vyberte operáciu "JPG na PDF"</li>
                        <li>Nahrajte jeden alebo viac obrázkov</li>
                        <li>Zvoľte orientáciu stránky (na výšku alebo na šírku)</li>
                        <li>Zadajte názov výstupného súboru</li>
                        <li>Kliknite na "Konvertovať"</li>
                    </ol>
                </article>
            </section>

            <section id="admin" class="manual-section">
                <h2>5. Administrátorský mód</h2>
                <p>Administrátori majú prístup k:</p>
                <ul>
                    <li>Zoznamu všetkých používateľov</li>
                    <li>Štatistikám používania</li>
                    <li>Možnosti blokovania používateľov</li>
                    <li>Nastaveniam aplikácie</li>
                </ul>
                <div class="manual-image">
                    <img src="{{ asset('images/manual/admin-panel.png') }}" alt="Administrátorský panel" class="img-fluid">
                    <p class="image-caption">Obrázok 4: Administrátorský panel</p>
                </div>
            </section>

            <section id="faq" class="manual-section">
                <h2>6. Časté otázky</h2>

                <div class="faq-item">
                    <h3>Aké veľké PDF súbory môžem spracovávať?</h3>
                    <p>Maximálna veľkosť súboru je 10 MB pre základných používateľov a 50 MB prémiových používateľov.</p>
                </div>

                <div class="faq-item">
                    <h3>Je možné vrátiť zmeny?</h3>
                    <p>Nie, všetky operácie sú finálne. Odporúčame si vždy uložiť pôvodnú verziu dokumentu.</p>
                </div>

                <div class="faq-item">
                    <h3>Ktoré formáty obrázkov podporuje konverzia na PDF?</h3>
                    <p>Aplikácia podporuje formáty JPG, PNG a BMP.</p>
                </div>

                <div class="faq-item">
                    <h3>Ako sa stať prémiovým používateľom?</h3>
                    <p>Prémiové účty sú dostupné po zakúpení predplatného v sekcii "Nastavenia účtu".</p>
                </div>
            </section>
        </div>

        <div class="manual-footer">
            <p>Posledná aktualizácia: {{ now()->format('d.m.Y') }}</p>
            <p>© 2023 PDF Editor App. Všetky práva vyhradené.</p>
        </div>
    </div>

</x-app-layout>
