<?php

// vendor/bin/codecept generate:cest Acceptance Test01_LoginCest

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test01_LoginCest
{
    public function login(AcceptanceTester $I)
    {
        $I->wantTo('Login new user');

        $I->amOnPage("/");

        $I->seeCurrentUrlEquals('/');

        $I->click("Zaloguj się");
        $I->see("Pole email jest wymagane");
        $I->see("Pole Hasło jest wymagane");


        $I->fillField("email", "foo");
        $I->click("Zaloguj się");
        $I->see("Adres email musi zawierać znak '@', a po nim adres domeny.");

        $I->fillField("email", "foo@abc.pl");
        $I->click("Zaloguj się");
        $I->see("Pole Hasło jest wymagane");

        $I->fillField("email", "foo@abc.pl");
        $I->fillField("password", "foo");
        $I->click("Zaloguj się");
        $I->see("Błędny email lub hasło.");

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->see("Witaj!");
    }
}
