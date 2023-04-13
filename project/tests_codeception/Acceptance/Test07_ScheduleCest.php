<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test07_ScheduleCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage("/");

        $I->dontSeeInDatabase('users', ['email' => "foo@abc.pl"]);

        $I->fillField("email", "first.name@email.com");
        $I->fillField("password", "first");
        $I->click("Zaloguj się");
        $dateStart = str(date("d-m-Y H:i:s"));
        $dateEnd = strtotime("+1 hours", strtotime($dateStart));
        $dateEnd = str(date("d-m-Y H:i:s", $dateEnd));

        $I->haveInDatabase('schedules', array('schedule_owner' => 'test_07_pracownik', 'owner_type' => '1',
            'date_start' => $dateStart, "date_end" => $dateEnd, "type" => '1'));
        $I->haveInDatabase('schedules', array('schedule_owner' => 'test_07_sala', 'owner_type' => '2',
            'date_start' => $dateStart, "date_end" => $dateEnd, "type" => '1'));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->see("Harmonogramy");
        $I->click("Harmonogramy");
        $I->seeCurrentUrlEquals("/schedules");

        $I->see("Sale");
        $I->see("Pracownicy");

        $I->seeElement("#calendar", );


        $I->click("#RoomButton");
        $I->see("test_07_sala");
        $I->dontSee("test_07_pracownik");

        $I->click('#UserButton');
        $I->see("test_07_pracownik");
        $I->dontSee("test_07_sala");

        $I->click(".fc-prev-button");
        $I->dontSee("test_07_pracownik");

        $I->click("#RoomButton");
        $I->click(".fc-next-button");
        $I->click(".fc-next-button");
        $I->dontSee("test_07_sala");

        $I->click(".fc-today-button");
        $I->see("test_07_sala");
        $I->dontSee("test_07_pracownik");
    }
}
