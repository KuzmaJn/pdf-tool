<style>
    /* Používateľská príručka */
    .manual-container {
        max-width: 900px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .manual-title {
        color: #2c3e50;
        margin-bottom: 2rem;
        text-align: center;
    }

    .manual-toc {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 5px;
        margin-bottom: 2rem;
    }

    .manual-section {
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #eee;
    }

    .manual-footer {
        text-align: right;
        font-size: 0.9rem;
        color: #6c757d;
    }
    .manual-actions {
        text-align: center;
        margin: 2rem 0;
    }

    .btn-primary {
        background-color: #3490dc;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary:hover {
        background-color: #2779bd;
    }

    .fas {
        margin-right: 0.5rem;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Manual') }}
        </h2>
    </x-slot>

    <div class="container manual-container">
        <h1 class="manual-title">Používateľská príručka - IGA GUI</h1>

        <div class="manual-toc">
            <h2>Obsah</h2>
            <ul>
                <li><a href="#uvod">Úvod</a></li>
                <li><a href="#registracia">Registrácia a prihlásenie</a></li>
                <li><a href="#zakladne-funkcie">Základné funkcie</a></li>
                <li><a href="#pokrocile-funkcie">Pokročilé funkcie</a></li>
                <li><a href="#faq">Často kladené otázky</a></li>
            </ul>
        </div>

        <section id="uvod" class="manual-section">
            <h2>Úvod</h2>
            <p>Vitajte v používateľskej príručke pre IGA GUI. Táto príručka vás prevedie základnými aj pokročilými funkciami našej aplikácie.</p>
        </section>

        <section id="registracia" class="manual-section">
            <h2>Registrácia a prihlásenie</h2>
            <p>Popis procesu registrácie a prihlásenia...</p>
            <!-- Pridajte screenshoty a podrobné kroky -->
        </section>

        <!-- Ďalšie sekcie podľa potreby -->

        <div class="manual-footer">
            <p>Posledná aktualizácia: {{ now()->format('d.m.Y') }}</p>
        </div>
        <div class="manual-actions">
            <a href="{{ route('manual.download') }}" class="btn btn-primary">
                <i class="fas fa-file-pdf"></i> Stiahnuť PDF verziu
            </a>
        </div>
    </div>

</x-app-layout>
