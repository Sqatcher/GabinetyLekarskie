# Gabinety Lekarskie

## Uruchomienie-dev

1. Wejdz do glownego katalogu - "GabinetyLekarskie".
2. Wpisz `source php.env`.
3. Wpisz `run ide`.
4. Kiedy uruchomi sie php-Storm przejdz w terminalu do glownego katalogu "Gabinety Lekarskie", a nastepnie wpisz `./runserver.sh`.

Aleternatywnie:
1. Wejdz do glownego katalogu - "GabinetyLekarskie".
2. Wpisz `source php.env`.
3. Wpisz np. run dev.
4. Uruchom skrypt wpiszujac `./runserver.sh`.
5. Otworz sobie nowe okno w terminalu, mozesz normalnie pracowac np. `source php.env`, a potem `run ide`.

## Analizatory-dev
Po tym jak juz masz uruchomiony serwer, mozesz czy z to w terminalu php storm, czy zwyklym, wpisac `./analizatory.sh`. Styl zostanie automatycznie naprawiony, phpstan oraz cs-fixer zwroci odpowiednie komunikaty o bledach lub ich braku.
