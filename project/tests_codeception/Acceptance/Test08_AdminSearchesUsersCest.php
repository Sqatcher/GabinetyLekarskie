<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test08_AdminSearchesUsersCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->haveInDatabase('users', array('name' => 'Jan', 'surname' => 'Nowak',
            'email' => 'jan.nowak@email.com', 'password' => hash('md5', 'passWord'), 'role'=> 2,
            'facility' => 2));
        $I->haveInDatabase('users', array('name' => 'John', 'surname' => 'Smith',
            'email' => 'smith@email.com', 'password' => hash('md5', 'passWord2'), 'role'=> 3,
            'facility' => 1));
    }

    // tests
    public function searchUsersAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('Search users');

        $I->amOnPage("/");

        $I->seeInDatabase('users', ['role' => "1"]);

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->amOnPage("/allusers");
        $I->see("Jan");
        $I->see("John");

        /*
        $I->fillField("filter_search", "j");
        $I->submitForm();
        $I->see("Jan");
        $I->see("John");

        $I->fillField("filter_search", "jA");
        $I->see("Jan");
        $I->dontSee("John");

        $I->fillField("filter_search", "");
        $I->see("Jan");
        $I->see("John");
        */

        $I->selectOption("filter_facility", "1");
        $I->dontSee("Jan");
        $I->see("John");

        $I->fillField("filter_search", "S");
        $I->dontSee("Jan");
        $I->dontSee("John");

        $I->selectOption("filter_facility", "wszystkie");
        $I->fillField("filter_search", "");
        $I->selectOption("filter_role", "Kierownik");
        $I->see("Jan");
        $I->dontSee("John");

        $I->selectOption("filter_facility", "2");
        $I->see("Jan");
        $I->dontSee("John");

        $I->selectOption("filter_facility", "1");
        $I->dontSee("Jan");
        $I->dontSee("John");

        $I->amOnPage("/");
        $I->amOnPage("/allusers");
        $I->see("Jan");
        $I->see("John");
    }
}
