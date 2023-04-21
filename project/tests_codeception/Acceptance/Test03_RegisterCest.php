<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_RegisterCest
{
    public function register(AcceptanceTester $I)
    {
        $I->wantTo('Register new user');

        $I->amOnPage("/");

        $I->dontSeeInDatabase('users', ['email' => "foo@abc.pl"]);

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->see("Zarejestruj");
        $I->click("Zarejestruj");

        $I->click("Załóż konto");
        $I->see("Pole imię jest wymagane");
        $I->see("Pole nazwisko jest wymagane");
        $I->see("Pole email jest wymagane");
        $I->see("Pole placówka jest wymagane");
        $I->see("Pole rola jest wymagane");
        $I->see("Pole hasło jest wymagane");
        $I->see("Pole powtórz hasło jest wymagane");

        $I->amOnPage("/allusers");
        $I->seeElement("a:contains('Second')");
        $I->dontSeeElement("a:contains('Jan')");
        $I->dontSeeElement("a:contains('Kowalski')");

        $I->amOnPage("/create");

        $I->fillField("name", "Jan");
        $I->click("Załóż konto");

        $I->dontSee("Pole imię jest wymagane");
        $I->see("Pole nazwisko jest wymagane");
        $I->see("Pole email jest wymagane");
        $I->see("Pole placówka jest wymagane");
        $I->see("Pole rola jest wymagane");
        $I->see("Pole hasło jest wymagane");
        $I->see("Pole powtórz hasło jest wymagane");

        #$I->fillField("name", "Jan");
        $I->fillField("surname", "Kowalski");
        $I->fillField("email", "foo@abc.pl");
        $I->selectOption('facility', 'Kraków - Krowodrza');
        $I->selectOption('role', 'Recepcjonista');
        $I->fillField("password", "Qwerty1@3");
        $I->fillField("repeat_password", "Qwerty1@3");

        $I->click("Załóż konto");
        $I->dontSee("Pole imię jest wymagane");
        $I->dontSee("Pole nazwisko jest wymagane");
        $I->dontSee("Pole email jest wymagane");
        $I->dontSee("Pole placówka jest wymagane");
        $I->dontSee("Pole role jest wymagane");
        $I->dontSee("Pole hasło jest wymagane");
        $I->dontSee("Pole powtórz hasło jest wymagane");

        $I->seeInDatabase('users', ['email' => "foo@abc.pl"]);

        $I->click("Użytkownicy");
        $I->seeElement("a:contains('Jan')");
        $I->seeElement("a:contains('Kowalski')");
    }
}
