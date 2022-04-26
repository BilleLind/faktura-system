# faktura-system
 
Et primitiv faktura system for fremvisning af funktionalitet.

Models
    - ordre
    - Faktura
    - User

Med tilhørende migrationer som ved hjælp af foreign keys og Eloquent relationship funktionalitet sammen sætter:
    User (kunden): 
      - til flere ordre.
    ordre:
      - til at tilhøre en kunde.
      - At have en Faktura.
      - Tilhøre flere produkter med et felt "kvantitet".
    Faktura:
      - at tilhøre et produkt.

Hvor et joining table(migration => create_produkt_ordre_table) sammensætter ordrene og produkter med det tilhørende kvantitet.

Dette er så først afprøvet via seeding for relations kontrol gennem Tinker, hvor brugeren også anvendes.

Med alt funktionaltiet værende i FakturaController.php's faktura og gemFaktura funktione.

# Krav
- PHP
- Composer
- Docker

# Opstart
   
1. composer install
2. docker-compose up -d
3. kopier .env.example og skab .env
4. opdater .env med eks.

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=faktura_system
DB_USERNAME=root
DB_PASSWORD=password

5. php artisan migrate
6. php artisan serve

applikationen kan tilgåes på
http://localhost:8000

med faktura funktionaliteten på 
http://localhost:8000/faktura 

Hvor der er lavet minimalt css styling 
