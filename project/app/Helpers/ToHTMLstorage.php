<?php

namespace App\Helpers;

use App\Models\Item;
use Illuminate\Support\Collection;

trait ToHTMLstorage
{
    public function itemCollectionToHTML(Collection $items): string
    {
        $output = '';
        if (count($items) > 0) {
            foreach ($items as $item) {
                /** @var Item $item */
                $output .= $this->itemToHTML($item);
            }
            return $output;
        }
        return
            "<tr>
                <td class='px-18 py-4' style='padding-left: 10px;'>
                    Brak przedmiotów pasujących do kryteriów wyszukiwania.
                </td>
            </tr>";
    }

    public function itemToHTML(Item $item): string
    {
        return
            "<tr>
                <td class='px-6 py-4'>
                    $item->name
                </td>
                <td class='px-6 py-4'>
                    $item->count
                </td>
            </tr>";
    }
}
