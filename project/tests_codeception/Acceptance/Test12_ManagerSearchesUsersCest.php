<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test12_ManagerSearchesUsersCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->haveInDatabase('users', array('name' => "Agent", 'surname' => "Smith", 'email' => "agentS@mail.com",
            'password' => password_hash('NULL', PASSWORD_DEFAULT), 'role' => 2, 'facility' => 1));

        $I->haveInDatabase('users', array('name' => "Alice", 'surname' => "Smith", 'email' => "alice@email.com",
            'password' => hash('md5', 'myPassword'), 'role' => 3, 'facility' => 1));
        $I->haveInDatabase('users', array('name' => "Bob", 'surname' => "Smith", 'email' => "bob@email.com",
            'password' => hash('md5', 'imbob'), 'role' => 4, 'facility' => 1));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $id1 = $I->haveInDatabase('users', array('name' => "John", 'surname' => "Smith", 'email' => "johnyy@email.com",
            'password' => hash('md5', 'janek'), 'role' => 2, 'facility' => 1));
        $I->wantTo('Manager searches their users');

        $I->amOnPage("/");

        $I->fillField("email", "agentS@mail.com");
        $I->fillField("password", "NULL");
        $I->click("Zaloguj się");

        $I->amOnPage('/allusers');
        $I->seeInDatabase("users", ['name' => "John", 'email' => 'johnyy@email.com']);
        $I->seeInDatabase("users", ['name' => "Alice", 'email' => 'alice@email.com']);
        $I->seeInDatabase("users", ['name' => "Bob", 'email' => 'bob@email.com']);
        $I->see("Alice");
        $I->see("Bob");
        $I->dontSee("John");

        $I->fillField("filter_search", "mail");
        $I->see("Alice");
        $I->see("Bob");

        $I->fillField("filter_search", "Al");
        $I->see("Alice");
        $I->dontSee("Bob");

        $I->fillField("filter_search", "");
        $I->see("Alice");
        $I->see("Bob");


        $I->dontSee("Obiekt");

        $I->selectOption("filter_role", "Pracownik");
        $I->see("Alice");
        $I->dontSee("Bob");

        $I->amOnPage("/");
        $I->amOnPage("/allusers");
        $I->see("Alice");
        $I->see("Bob");
    }
}
