<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test05_EditUserCest
{
    public function editUser(AcceptanceTester $I)
    {
        $I->wantTo('I want to edit user data');

        $I->amOnPage("/");

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->click("Użytkownicy");
        $I->click("Second");

        $I->fillField("name", "Piotr");
        $I->fillField("surname", "Nowak");
        $I->fillField("email", "foo@abc.com");
        $I->selectOption('facility', 'F5');
        $I->selectOption('role', 'Magazynier');
        $I->click("Edytuj konto");

        $I->seeCurrentUrlEquals("/allusers");
        $I->click("Użytkownicy");

        $I->seeElement("a:contains('Piotr')");
        $I->seeElement("a:contains('Nowak')");

        $I->seeInDatabase('users', ['name' => "Piotr", 'surname' => 'Nowak', 'email' => "foo@abc.com", 'facility' => '5', 'role' => "5"]);
    }
}
