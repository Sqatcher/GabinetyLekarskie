<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test13_ManagerRegisterUsersCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->haveInDatabase('users', array('name' => "Agent", 'surname' => "Smith", 'email' => "agentS@mail.com",
            'password' => password_hash('NULL', PASSWORD_DEFAULT), 'role' => 2, 'facility' => 1));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Manager deletes their users');

        $I->amOnPage("/");

        $I->fillField("email", "agentS@mail.com");
        $I->fillField("password", "NULL");
        $I->click("Zaloguj się");

        $I->amOnPage('/register');

        $I->dontSee("Placówka");
        $I->fillField("name", "Katarzyna");
        $I->fillField("surname", "Kasprowicz");
        $I->fillField("email", "kk@email.com");
        $I->selectOption('role', "Magazynier");
        $I->fillField("password", "Qwerty1@");
        $I->fillField("repeat_password", "Qwerty1@");
        $I->click("Załóż konto");

        $I->seeCurrentUrlEquals("/allusers");

        $I->seeInDatabase("users", ['name' => "Katarzyna", 'email' => 'kk@email.com', 'facility' =>1]);
        $I->see("Katarzyna");
        $I->see("Kasprowicz");
    }
}

