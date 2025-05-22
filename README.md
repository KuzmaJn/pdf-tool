# Simple PDF editor developed in Laravel and Python
## Ako spustiť Laravel app PDF-tool lokálne?

Nainštaluj Docker a Docker Compose
Uisti sa, že máš nainštalovaný a spustený Docker (verzia ≥ 20.10) a Docker Compose.

Uisti sa, že máš nainštalované Php, composer a Laravel.

Naklonuj svoj projekt
```
git clone https://github.com/KuzmaJn/pdf-tool.git
cd tvoj-repo
```

Skopíruj .env a vygeneruj APP_KEY
(otvor .env a doplň DB_*, MAIL_*, atď.)

```
cp .env.example .env
./vendor/bin/sail artisan key:generate
```
Publikuj Sail konfigurácie

skopíruje docker-compose.yml, Dockerfile, atď.
```
./vendor/bin/sail artisan sail:publish
```
Nainštaluj závislosti
(v kontajneri)
```
./vendor/bin/sail up -d                    # spustí kontajnery na pozadí
./vendor/bin/sail composer install         # PHP balíčky
```
Spusti migrácie a seedy
```
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan storage:link    # link na ukladanie vytvorenie tmp suborov
./vendor/bin/sail artisan db:seed         # ak používaš seedy
```

Pristup k aplikácii
Otvor v prehliadači:

http://localhost


## Disclaimer

Na prihlasovací formulár sme použili open source starter kit dostupný na [Laravel Docs](https://laravel.com/docs/11.x/starter-kits)
