<?php


namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test11_ManagerEditsUsersCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->haveInDatabase('users', array('name' => "Agent", 'surname' => "Smith", 'email' => "agentS@mail.com",
            'password' => password_hash('NULL', PASSWORD_DEFAULT), 'role' => 2, 'facility' => 1));

        $I->haveInDatabase('users', array('name' => "Alice", 'surname' => "Smith", 'email' => "alice@email.com",
            'password' => hash('md5', 'myPassword'), 'role' => 3, 'facility' => 1));
        $I->haveInDatabase('users', array('name' => "Bob", 'surname' => "Smith", 'email' => "bob@email.com",
            'password' => hash('md5', 'imbob'), 'role' => 3, 'facility' => 1));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $id1 = $I->haveInDatabase('users', array('name' => "John", 'surname' => "Smith", 'email' => "johnyy@email.com",
            'password' => hash('md5', 'janek'), 'role' => 3, 'facility' => 2));
        $I->wantTo('Manager edits their users');

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
        //$I->dontSee("John");

        $I->click("Bob");
        $I->dontSee("Placówka");
        $I->see("Rola");

        $I->fillField("name", "Grzegorz");
        $I->fillField("surname", "Nowak");
        $I->fillField("email", "gnowak@mail.com");
        $I->selectOption('role', "Magazynier");
        $I->click("Edytuj konto");

        $I->seeCurrentUrlEquals("/allusers");

        $I->seeInDatabase("users", ['name' => "John", 'email' => 'johnyy@email.com']);
        $I->seeInDatabase("users", ['name' => "Alice", 'email' => 'alice@email.com']);
        $I->dontSeeInDatabase("users", ['name' => "Bob", 'email' => 'bob@email.com']);
        $I->seeInDatabase("users", ['name' => "Grzegorz", 'surname' => "Nowak", 'email' => 'gnowak@mail.com',
            'role' => "5", 'facility' => "1"]);
        $I->see("Grzegorz");
        $I->see("Nowak");

        $I->amOnPage("/edituser/".$id1);
        $I->seeCurrentUrlEquals("/");
    }
}
