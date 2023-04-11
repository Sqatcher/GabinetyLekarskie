<?php


namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_DontSeeRegisterCest
{
    public function login(AcceptanceTester $I)
    {
        $I->wantTo('Login new user');

        $I->amOnPage("/");

        $I->dontSeeInDatabase('users', ['email' => "foo@abc.pl"]);

        $I->fillField("email", "second.name@email.com");
        $I->fillField("password", "second");
        $I->click("Zaloguj się");

        $I->dontSee("Zarestruj");
    }
}
