# Gabinety Lekarskie

## Uruchomienie - dev

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

## Analizatory - dev
Po tym jak juz masz uruchomiony serwer, mozesz czy z to w terminalu php storm, czy zwyklym, wpisac `./analizatory.sh`. Styl zostanie automatycznie naprawiony, phpstan oraz cs-fixer zwroci odpowiednie komunikaty o bledach lub ich braku.

## Test-coverage - dev
Kiedy masz uruchomiony server, skorzystaj ze skryptu wpisujac `./test-coverage.sh` w glownym katalogu. Powinines otrzymac wyniki w konsoli oraz po 10 sekundach powinna otworzyc sie strona z plikiem html, gdzie takze mozesz przegladac informacje. Mozesz tam zobaczyc, ktore ile linii kodu jest pokrytych testami oraz ktore konkretnie. 

## Tworzenie testów - dev

Aby utworzyć Acceptance test wpisz:
```
vendor/bin/codecept generate:cest Acceptance Test<numer>_<nazwa>
```

Aby sprawdzić działanie wpisz:
```
vendor/bin/codecept run
```

## Code-review sprawdzanie ręczne - dev

Zrób u siebie w repozytorium najpierw `git checkout master` oraz `git pull`, następnie wpisz `git checkout <nazwa_branchy_do_sprawdzenia>`, a potem `git pull`. Teraz uruchom serwer, sprawdź czy zmiany są dobre, aby następnie móc jeszcze sprawdzić kod na stronie githuba (o ile wcześniej tego nie zrobiłeś) i dać approve albo odpowiedni komentarz przy pull-requeście

## Tworzenie nowych featurów np. testów - dev

Zrób u siebie w repozytrium `git checkout master`, a następnie `git pull`. Teraz wpisz `git branch <kod_twojego_taska_z_jiry>`, a następnie `git checkout <kod_twojego_taska_z_jiry`. Teraz możesz wykonać swoje zadanie. W trakcie możesz robić commity `git add .` oraz `git commit -m <krótki_opis>`. Kiedy już wykonasz swoje zadanie oraz dokonasz commitów, możesz zrobić `git checkout master`, `git pull`, `git checkout  <kod_twojego_taska_z_jiry>` i `git merge master`. Następnie rozwiązać konflikty, a jeśli ich nie ma to `git push`. Tam może ci się wyświetlić informacja, że należy uzupełnić tę komendę o flagę --set-upstream. Tam w komunikacie będzie napisane co należy dokładnie wpisać.

### Łatwiejsza wersja tworzenia nowych featurów np. story - dev
`git checkout master`, a następnie `git pull`. Jak klikniesz w story na jirze, to po prawej stronie w sekcji programowanie powinno być napisane "utwórz gałąź". Jak na to najedziesz to na prawo od tej nazwy będzie strzałka, możesz na nią kliknąć i wyświetli Ci się komenda, która utworzy gałąź. Wklejasz ją do siebie do terminala. Następnie tworzysz kod, robisz commita (`git add .` oraz `git commit -m <krótki_opis>`), jak skończysz możesz zrobić `git push`. Tam może ci się wyświetlić informacja, że należy uzupełnić tę komendę o flagę --set-upstream. Tam w komunikacie będzie napisane co należy dokładnie wpisać. Na stronie możesz otworzyć pull requesta, a konflikty rozwiązać w web editorze. Jeśli rozwiązujesz konflikty w web editorze musisz od razu wszystkie rozwiązać.
