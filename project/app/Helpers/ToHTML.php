<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Collection;

trait ToHTML
{
    public function userCollectionToHTML(Collection $users): string
    {
        $output = '';
        if (count($users) > 0) {
            foreach ($users as $user) {
                /** @var User $user */
                $output .= $this->userToHTML($user);
            }
            return $output;
        }
        return
            "<tr>
                <td class='px-18 py-4' style='padding-left: 10px;'>
                    Brak pracowników pasujących do kryteriów wyszukiwania.
                </td>
            </tr>";
    }

    public function userCollectionToHTMLWithButtons(Collection $users): string
    {
        $output = '';
        if (count($users) > 0) {
            foreach ($users as $user) {
                /** @var User $user */
                $output .= $this->userToHTMLWithButton($user);
            }
            return $output;
        }
        return
            "<tr>
                <td class='px-18 py-4' style='padding-left: 10px;'>
                    Brak pracowników pasujących do kryteriów wyszukiwania.
                </td>
            </tr>";
    }

    public function userToHTML(User $user): string
    {
        return
            "<tr>
                <td class='px-6 py-4'>
                    <a href=\"".url("edituser", $user->id)."\" class='text-indigo-600 hover:text-indigo-900'>"
                        .$user->name
                    ."</a>
                </td>
                <td class='px-6 py-4'>
                    <a href=\"".url("edituser", $user->id)."\" class='text-indigo-600 hover:text-indigo-900'>"
                        .$user->surname
                    ."</a>
                </td>
                <td class='px-6 py-4'>"
                    .$user->email
                ."</td>
            </tr>";
    }

    public function userToHTMLWithButton(User $user): string
    {
        return
            "<tr>
                <td class='px-6 py-4'>
                    <a href=\"".url("edituser", $user->id)."\" class='text-indigo-600 hover:text-indigo-900'>"
            .$user->name
            ."</a>
                </td>
                <td class='px-6 py-4'>
                    <a href=\"".url("edituser", $user->id)."\" class='text-indigo-600 hover:text-indigo-900'>"
            .$user->surname
            ."</a>
                </td>
                <td class='px-6 py-4'>"
            .$user->email
            ."</td>
                <td class='px-6 px-4'>
                    <button onclick='location.href=\"".url("scheduleuser", $user->id)."\"' type='button'>Harmonogram</button>
                </td>
            </tr>";
    }
}
