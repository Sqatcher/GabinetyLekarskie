<?php


namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test16_ChangeRolePriviligesCest
{
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Change roles priviliges (as admin)');


        $I->amOnPage("/");
        $I->fillField("email", "administrator@email.com");
        $I->fillField("password", "administrator");
        $I->click("Zaloguj się");

        $I->click('Uprawnienia');
        $I->amOnPage('/roles');

        for($i=2; $i<=6; ++$i){
            $I->checkOption('input[id="see_user'.$i.'"]');
            $I->checkOption('input[id="create_user'.$i.'"]');
            $I->checkOption('input[id="create_facility_user'.$i.'"]');
            $I->checkOption('input[id="edit_user'.$i.'"]');
            $I->checkOption('input[id="edit_facility_user'.$i.'"]');

            $I->checkOption('input[id="see_schedules'.$i.'"]');
            $I->checkOption('input[id="create_schedules'.$i.'"]');
            $I->checkOption('input[id="create_facility_schedules'.$i.'"]');
            $I->checkOption('input[id="edit_schedules'.$i.'"]');
            $I->checkOption('input[id="edit_facility_schedules'.$i.'"]');

            $I->checkOption('input[id="see_facility_storage'.$i.'"]');
            $I->checkOption('input[id="see_storage'.$i.'"]');
            $I->checkOption('input[id="edit_facility_storage'.$i.'"]');
            $I->checkOption('input[id="edit_storage'.$i.'"]');
        }

        $I->fillField("current_password", "administrator");
        $I->click('Zapisz');


        $role = ['Kierownik', 'Pracownik', 'Księgowy', 'Magazynier', 'Recepcjonista'];
        foreach($role as $rola) {
            $I->seeInDatabase("roles", ['name' => $rola, 'users' => 31]);
            $I->seeInDatabase("roles", ['name' => $rola, 'schedules' => 31]);
            $I->seeInDatabase("roles", ['name' => $rola, 'storage' => 15]);
        }



        $I->amOnPage('/roles');

        for($i=2; $i<=6; ++$i){
            $I->uncheckOption('input[id="see_user'.$i.'"]');
            $I->uncheckOption('input[id="create_user'.$i.'"]');
            $I->uncheckOption('input[id="create_facility_user'.$i.'"]');
            $I->uncheckOption('input[id="edit_user'.$i.'"]');
            $I->uncheckOption('input[id="edit_facility_user'.$i.'"]');

            $I->uncheckOption('input[id="see_schedules'.$i.'"]');
            $I->uncheckOption('input[id="create_schedules'.$i.'"]');
            $I->uncheckOption('input[id="create_facility_schedules'.$i.'"]');
            $I->uncheckOption('input[id="edit_schedules'.$i.'"]');
            $I->uncheckOption('input[id="edit_facility_schedules'.$i.'"]');

            $I->uncheckOption('input[id="see_facility_storage'.$i.'"]');
            $I->uncheckOption('input[id="see_storage'.$i.'"]');
            $I->uncheckOption('input[id="edit_facility_storage'.$i.'"]');
            $I->uncheckOption('input[id="edit_storage'.$i.'"]');
        }

        $I->fillField("current_password", "administrator");
        $I->click('Zapisz');


        $role = ['Kierownik', 'Pracownik', 'Księgowy', 'Magazynier', 'Recepcjonista'];
        foreach($role as $rola) {
            $I->seeInDatabase("roles", ['name' => $rola, 'users' => 0]);
            $I->seeInDatabase("roles", ['name' => $rola, 'schedules' => 0]);
            $I->seeInDatabase("roles", ['name' => $rola, 'storage' => 0]);
        }
    }
}
