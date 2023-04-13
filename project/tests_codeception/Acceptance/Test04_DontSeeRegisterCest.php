<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_DontSeeRegisterCest
{
    public function register(AcceptanceTester $I)
    {
        $I->wantTo('Cannot register new user');

        $I->amOnPage("/");

        $I->dontSeeInDatabase('users', ['email' => "foo@abc.pl"]);

        $I->fillField("email", "second.name@email.com");
        $I->fillField("password", "second");
        $I->click("Zaloguj się");

        $I->dontSee("Zarejestruj");

        $I->amOnPage("/create");
        $I->seeCurrentUrlEquals("/");
        $I->dontSee("Załóż konto");
    }
}
