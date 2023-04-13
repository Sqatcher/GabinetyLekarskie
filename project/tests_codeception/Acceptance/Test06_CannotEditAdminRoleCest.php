<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test06_CannotEditAdminRoleCest
{
    public function cannotEditAdmin(AcceptanceTester $I)
    {
        $I->wantTo('Cannot change admin role');

        $I->amOnPage("/");

        $I->seeInDatabase('users', ['role' => "1"]);

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->amOnPage("/allusers");
        $admin = $I->grabFromDatabase('users', 'name', array('role' => '1'));
        $I->dontSeeElement("a:contains($admin)");


        $I->amOnPage("/edituser/1");
        $I->seeCurrentUrlEquals("/");
    }
}
