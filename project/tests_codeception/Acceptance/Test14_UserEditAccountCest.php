<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test14_UserEditAccountCest
{
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('User wants to edit account information');

        $I->amOnPage("/");
        $I->fillField("email", "third.name@email.com");
        $I->fillField("password", "third");
        $I->click("Zaloguj się");

        $I->amOnPage("/profile");
        $I->see("Imię");
        $I->see("Nazwisko");
        $I->see("Email");

        $I->fillField('name', "");
        $I->fillField('surname', "");
        $I->fillField('email', "");
        $I->click("Zapisz");

        $I->see("Pole imię jest wymagane");
        $I->see("Pole nazwisko jest wymagane");
        $I->see("Adres email musi zawierać znak '@', a po nim adres domeny.");

        $I->fillField('name', "Janet");
        $I->fillField('surname', "Jones");
        $I->fillField('email', "second.name@email.com");
        $I->click("Zapisz");

        $I->see("Ten email jest już zajęty");
        $I->dontSee("Pole imię jest wymagane");
        $I->dontSee("Pole nazwisko jest wymagane");

        $I->fillField('email', "janet.jonesemail.com");
        $I->click("Zapisz");
        $I->see("Adres email musi zawierać znak '@', a po nim adres domeny.");

        $I->fillField('email', "janet.jones@email.com");
        $I->click("Zapisz");
        $I->dontsee("Ten email jest już zajęty");
        $I->dontsee("Adres email musi zawierać znak '@', a po nim adres domeny.");
        $I->dontSee("Pole imię jest wymagane");
        $I->dontSee("Pole nazwisko jest wymagane");

        $I->fillField('current_password', 'third1');
        $I->click('#click_password');
        $I->see("Hasło jest niepoprawne.");

        $I->fillField('current_password', 'third');
        $I->fillField('password', 'third1');
        $I->fillField('repeat_password', 'third1');
        $I->click('#click_password');

        $I->dontSee("Hasło jest niepoprawne.");
        $I->see('hasło musi mieć przynajmniej 8 znaków.');
        $I->see('hasło musi zawierać małą i dużą literę.');
        $I->see('hasło musi zawierać znak specjalny.');

        $I->fillField('current_password', 'third');
        $I->fillField('password', 'Qwerty1@');
        $I->fillField('repeat_password', 'Qwerty12');
        $I->click('#click_password');

        $I->see('powtórz hasło i hasło muszą być takie same.');
        $I->dontSee("Hasło jest niepoprawne.");
        $I->dontsee('hasło musi mieć przynajmniej 8 znaków.');
        $I->dontsee('hasło musi zawierać małą i dużą literę.');
        $I->dontsee('hasło musi zawierać znak specjalny.');

        $I->fillField('current_password', 'third');
        $I->fillField('password', 'Qwerty1@');
        $I->fillField('repeat_password', 'Qwerty1@');
        $I->click('#click_password');

        $I->dontsee('powtórz hasło i hasło muszą być takie same.');
        $I->dontSee("Hasło jest niepoprawne.");
        $I->dontsee('hasło musi mieć przynajmniej 8 znaków.');
        $I->dontsee('hasło musi zawierać małą i dużą literę.');
        $I->dontsee('hasło musi zawierać znak specjalny.');
    }
}
