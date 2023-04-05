<?php


namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_LoginCest_rememberMeCest
{
    public function login(AcceptanceTester $I)
    {
        $I->wantTo("Login with click remember me");

        $I->amOnPage("/");
        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->checkOption("#remember_me");
        $I->click("Zaloguj się");

        $I->click("Wyloguj się");
        $I->amOnPage("/");
        $I->seeInField('email', "first.name@email.com");
    }

}
