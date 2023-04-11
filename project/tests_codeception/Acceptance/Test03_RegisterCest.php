<?php


namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_RegisterCest
{
    public function login(AcceptanceTester $I)
    {
        $I->wantTo('Login new user');

        $I->amOnPage("/");

        $I->dontSeeInDatabase('users', ['email' => "foo@abc.pl"]);

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->see("Zarejestruj");
        $I->click("Zarestruj");

        $I->click("Załóż konto");
        $I->see("Pole imię jest wymagane");
        $I->see("Pole nazwisko jest wymagane");
        $I->see("Pole email jest wymagane");
        $I->see("Pole placówka jest wymagane");
        $I->see("Pole role jest wymagane");
        $I->see("Pole hasło jest wymagane");
        $I->see("Pole powtórz hasło jest wymagane");

        $I->fillField("imię", "Jan");
        $I->fillField("nazwisko", "Kowalski");
        $I->fillField("email", "foo@abc.pl");
        $I->selectOption('facility','F1');
        $I->selectOption('role','Recepcjonista');
        $I->fillField("password", "Qwerty1@3");
        $I->fillField("password_repeat", "Qwerty1@3");

        $I->click("Załóż konto");
        $I->dontSee("Pole imię jest wymagane");
        $I->dontSee("Pole nazwisko jest wymagane");
        $I->dontSee("Pole email jest wymagane");
        $I->dontSee("Pole placówka jest wymagane");
        $I->dontSee("Pole role jest wymagane");
        $I->dontSee("Pole hasło jest wymagane");
        $I->dontSee("Pole powtórz hasło jest wymagane");

        $I->seeInDatabase('users', ['email' => "foo@abc.pl"]);
    }
}
