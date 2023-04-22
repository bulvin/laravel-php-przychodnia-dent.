#  Przychodnia dent.

Projekt aplikacji internetowej to przychodnia dentystyczna. Istnieje administrator, który zarządza
zasobami aplikacji – dentyści, oferowane usługi, pacjenci, wizyty. Administrator może wykonywać
operacje CRUD'owe, czyli np. dodawać, usuwać, edytować i wyświetlać wizyty. Podobnie z resztą
zasobów. Do jednej wizyty jest możliwość wyboru
wielu usług oferowanych przez przychodnię. Niezalogowany użytkownik ma dostęp do strony
głównej, gdzie ma udostępnione oferowane usługi (nazwa, opis, cena) oraz widzi dentystów,
którzy przyjmują w przychodni (imię, nazwisko, specjalizacje i kontakt do niego)

# Technologie

PHP 8.1, Laravel, MariaDB, CSS Bootstrap

# Uruchomienie lokalne

Należy mieć pobrany pakiet XAMPP w wersji 8.1 – zawiera PHP w wersji 8.1 i bazę danych MariaDB.
Również trzeba pobrać composera.
Następnie stworzyć folder przychodnia i wypakować aplikację do tego folderu. Utworzyć bazę danych przychodnia w PhpMyAdmin – po wejściu w XAMPPA   włączyć  usługi
  MySQL i Apache i kliknąć MySQL admin Można otworzyć
konsolę systemową i wykonywać następujące polecenia:

```bash
  cd przychodnia
  composer install --no-interaction
  php artisan storage:link
  php artisan migrate
  php artisan db:seed
  php artisan serve
  
```
 http://127.0.0.1:8000
