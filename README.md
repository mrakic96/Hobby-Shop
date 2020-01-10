# RWA Project (Laravel v6.x)

- [Deployani RWA Project](http://studenti.sum.ba/projekti/fsre/2019/g16)

**Kako koristiti ovaj projekt**

- Klonirajte ga sa githuba
- Preimenujte `.env.example` datoteku u `.env` u vašem root projectu i popunite podatke za bazu podataka.
- U terminalu upišite `composer install`
- Nakon toga `php artisan key:generate` 
- `php artisan migrate`
- `php artisan db:seed` da se pošalju seederi
- Pokrenite aplikaciju sa `php artisan serve`

**Važno**
- Za našu checkout formu koristimo Stripe
- Kako bi završili testni checkout postavite ključeve sa vašeg Stripe računa na `STRIPE_KEY` i `STRIPE_SECRET` u `.env` datoteci
- Stavite vaš STRIPE_SECRET ključ u `js/checkout.js` na liniji 2 kako bi se prikazalo input polje za karticu
- [Informacije za Stripe ključeve](https://stripe.com/docs/keys)

- Naše mail konfiguracije su postavljene na Mailgun kako bi testirali potvrde nakon završene kupovine
- Koristimo [mailgun](https://mail.com/) api ključeve u našoj `.env` datoteci
- Polja za popuniti: `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAILGUN_DOMAIN`, `MAILGUN_SECRET`
- Transakcija ce proći i u slučaju da se u formu unese mail koji nije proslijeđen mailgunu

## Admin panel

#### User management

1. Izlistani korisnici:
    - `Admin i moderator mogu vidjeti:`
    - id
    - ime
    - email
    - ulogu
    - button za uređivanje

2. Uređivanje korisničkih informacija:
    - `Admin može urediti:`
    - email
    - ime
    - dodijeliti uloge
    - `Moderator može urediti:`
    - email
    - ime

3. Brisanje korisnika:
    - `Admin je jedini koji može izbrisati korisnika.`


#### Product management

1. Izlistani proizvodi:
    - `Admin i moderator mogu vidjeti:`
    - id
    - ime
    - cijena
    - slika
    - button 

2. Uređivanje informacija proizvoda:
    - `Admin i moderator mogu urediti:`
    - ime
    - detalji
    - opis
    - cijena

3. Brisanje proizvoda:
    - `Admin i moderator mogu izbrisati proizvod.`

4. Kreiranje novog proizvoda:
    - `Admin i moderator mogu kreirati novi proizvoda sa:`
    - ime
    - detalji
    - opis
    - cijena
    - kategorija
    - slika

#### Category management

1. Izlistane kategorije:
    - `Admin i moderator mogu vidjeti:`
    - id
    - ime
    - button

2. Uredi ime kategorije:
    - `Admin i moderator mogu urediti:`
    - ime

3. Kreiranje nove kategorije:
    - `Admin i moderator mogu kreirati novu kategoriju sa:`
    - ime

#### Transaction management

1. Izlistane transakcije:
    - `Admin i moderator mogu vidjeti:`
    - id
    - billing_total
    - količinu kupljenih proizvoda
    - user_id
    - billing_name
    - billing_address
    - billing_city
    - `Admin može vidjeti:`
    - Button za brisanje

2. Brisanje transakcije:
    - `Admin može izbrisati transakciju`

## Application

`<!-- Korisnički profil -->`

#### 'profile' view

- Informacije o trenutno ulogiranom korisniku

#### 'purchases' view

- Korisničke transakcije

#### 'edit-profile' view

- Opcija za uređivanje korisničkih informacija

#### 'change-password' view

- Opcija za mijenjanje korisničke lozinke

`<!-- Proizvodi -->`

#### 'products' view

- Izlistani svi proizvodi iz baze podataka 

#### '/sortbycategory/xxxx' views

- Proizvodi prikazani po kategorijama

#### '/sortbyprice/xxxx' views

- Proizvodi prikazani po cijeni (od manje, od veće)

#### 'view_product' view

- Prikaz jednog proizvoda

#### 'search-results' view

- View se prikazuje nakon što gost/korisnik pretraži proizvode

`<!-- O nama -->`

#### 'about' view

- Osnovne informacije

`<!-- Košarica -->`

#### 'cart' view

- Dodavanje proizvoda u košaricu
- Povećavanje i smanjivanje količine
- Brisanje proizvoda iz košarice
- Ukupna cijena proizvoda
- Ukupna cijena cijele košarice

#### 'checkout' view

- Checkout view se dobije nakon što korisnik pokuša kupiti proizvode
- Prikazana forma za unos podataka kupca
- Guest se redirecta na login ako pokuša kupiti odabrane proizvode




