<?php

namespace App\Helpers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

trait FilterItemHelper
{
    use ToHTMLstorage;
    use HasEnsure;

    public function filterProcedure(Request $request, string $type): Response
    {
        $user_role = $this->getRole($this->ensureIsNotNullUser(Auth::user())->role);

        $collection = $this->filterHelper($request, $type);

        $add_form = 0;
        if ($user_role->storage & 8) {
            $add_form = 1;
        }
        elseif (isset($collection[0]))
        {
            if ($user_role->storage & 4 and $this->ensureIsNotNullUser(Auth::user())->facility == $collection[0]->facility_id ) {
                $add_form = 1;
            }
        }

        return match ($type) {
            'item' => Response($this->itemCollectionToHTMLst($collection, $add_form)),
            default => Response('<h2>Filter problem in filter procedure</h2>'),
        };
    }

    private function filterHelper(Request $request, string $type): Collection
    {
        if ($type == 'item') {
            /** @var string $filter_facility */
            $filter_facility = $request->filter_facility ?? (session($type . '_filter_facility') ?? Auth::user()->facility);

            /** @var string $filter_search */
            $filter_search = $request->filter_search ?? (session($type . '_filter_search') ?? "%");
            session([ $type . "_filter_facility" => $filter_facility,
                $type ."_filter_search" => $filter_search]);
            return $this->getItems($filter_facility, $filter_search);
        }

        return new Collection();
    }

    private function getItems(string $filter_facility, string $filter_search): Collection
    {
        return Item::where('name', 'like', '%'.$filter_search.'%')
            ->when($filter_facility != 'all', function ($query) use ($filter_facility) {
                $query->where('facility_id', '=', $filter_facility);
            })->get();
    }
}
