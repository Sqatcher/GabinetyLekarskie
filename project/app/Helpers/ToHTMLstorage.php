<?php

namespace App\Helpers;

use App\Models\Item;
use Illuminate\Support\Collection;

trait ToHTMLstorage
{
    public function itemCollectionToHTMLst(Collection $items, bool $add_form): string
    {
        $output = '';
        if (count($items) > 0) {
            foreach ($items as $item) {
                /** @var Item $item */
                $output .= $this->itemToHTML($item, $add_form);
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

    public function itemToHTML(Item $item, bool $add_form): string
    {
        $form = "<form method='POST' action='".url('update_item', $item->id)."'>
                        <input type='hidden' name='_token' value='".csrf_token()."' />
                        <input type='number' id='add' name='add' style='width: 100px; display: inline-block;'/>
                        <div style='margin-left: 10px; display: inline-block; border: #0c5460 solid 1px; border-radius: 20px; padding: 10px; width: fit-content; background-color: #edf3fc; box-shadow: #6b7280 1px 1px 1px;'>
                            <input type='submit' style='font-weight: bold' value='+'/>
                        </div>
                    </form>";
        if(!$add_form){
          $form = '';
        }
        return
            "<tr>
                <td class='px-6 py-4'>
                    $item->name
                </td>
                <td class='px-6 py-4'>
                    $item->count
                </td>
                <td class='px-20 py-4'>
                    $form
                </td>
            </tr>";
    }
}
