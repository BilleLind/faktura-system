# faktura-system

Et primitiv faktura system for fremvisning af funktionalitet.

Models - ordre - Faktura - User

Med tilhørende migrationer som ved hjælp af foreign keys og Eloquent relationship funktionalitet sammen sætter:
User (kunden): - til flere ordre.
ordre: - til at tilhøre en kunde. - At have en Faktura. - Tilhøre flere produkter med et felt "kvantitet".
Faktura: - at tilhøre et produkt.

Hvor et joining table(migration => create_produkt_ordre_table) sammensætter ordrene og produkter med det tilhørende kvantitet.

Dette er så først afprøvet via seeding for relations kontrol gennem Tinker, hvor brugeren også anvendes.

Med alt funktionaltiet værende i FakturaController.php's faktura og gemFaktura funktione.

# Krav

-   Docker
-   linux distro
    -   wsl integration til docker

# Opstart

skab .env og indsæt følgende felter, eventuelt ændre port, database, username og password til egne preferencer.

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=faktura_system
DB_USERNAME=root
DB_PASSWORD=password

1. åben en wsl/linux distro og skab en relation til sail
   alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
2. migrate og kør database seeding
   sail artisan migrate --seed
3. tilgå applikaitonen på
   http://localhost:8000/faktura
