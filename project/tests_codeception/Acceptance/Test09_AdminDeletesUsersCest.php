<?php


namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test09_AdminDeletesUsersCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->haveInDatabase('users', array('name' => "Agent", 'surname' => "Smith", 'email' => "agentS@mail.com",
            'password' => hash('md5', 'NULL'), 'role' => 2, 'facility' => 1));
        $I->haveInDatabase('users', array('name' => "John", 'surname' => "Smith", 'email' => "johnyy@email.com",
            'password' => hash('md5', 'janek'), 'role' => 3, 'facility' => 2));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Admin deletes users');

        $I->amOnPage("/");

        $I->seeInDatabase('users', ['role' => "1"]);

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");

        $I->amOnPage('/allusers');
        $I->see("Agent");
        $I->see("John");

        $I->seeInDatabase("users", ['name' => "John", 'email' => 'johnyy@email.com']);
        $I->seeInDatabase("users", ['name' => "Agent", 'email' => 'agentS@mail.com']);
        $I->click("John");
        $I->click("Usuń");
        $I->dontSeeInDatabase("users", ['name' => "John", 'email' => 'johnyy@email.com']);
        $I->seeInDatabase("users", ['name' => "Agent", 'email' => 'agentS@mail.com']);

        $I->seeCurrentUrlEquals("/allusers");
        $I->see("Agent");
        $I->dontSee("John");
    }
}
