<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test15_StorageSeeCest
{
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Check whether manager can check storage');

        $I->amOnPage("/");
        $I->fillField("email", "kierownik@email.com");
        $I->fillField("password", "kierownik");
        $I->click("Zaloguj się");

        $I->seeCurrentUrlEquals("/");
        $I->see("Magazyn");
        $I->click("Magazyn");
        $I->seeCurrentUrlEquals("/storage");
        $I->see("Kraków - Krowodrza");
        $I->see("NAZWA");
        $I->see("ILOŚĆ");
        $I->see("Strzykawka");
        $I->see("Łóżko");
        $I->dontSee("Butelka");
        $I->dontSee("Kroplówka");

        //$I->selectOption("filter_facility", "2");
        //$I->see("Kraków - Centrum");
        //$I->dontsee("Strzykawka");
        //$I->dontsee("Łóżko");
        //$I->see("Butelka");
        //$I->see("Kroplówka");
    }
}
