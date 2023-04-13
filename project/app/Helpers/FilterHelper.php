<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

trait FilterHelper
{
    use ToHTML;
    public function filterProcedure(Request $request, string $type): Response
    {
        $collection = $this->filterHelper($request, $type);

        return match ($type) {
            'user' => Response($this->userCollectionToHTML($collection)),
            default => Response('<h2>Filter problem in filter procedure</h2>'),
        };
    }

    private function filterHelper(Request $request, string $type, int|string $anime_id = ''): Collection
    {

        if ($type == 'user') {
            /** @var string $filter_facility */
            $filter_facility = $request->filter_facility ?? (session($type . '_filter_facility') ?? "all");

            /** @var string $filter_role */
            $filter_role = $request->filter_role ?? (session($type . '_filter_role') ?? "all");

            /** @var string $filter_search */
            $filter_search = $request->filter_search ?? (session($type . '_filter_search') ?? "%");
            session([ $type . "_filter_facility" => $filter_facility,
                $type . "_filter_role" => $filter_role,
                $type ."_filter_search" => $filter_search]);
            return $this->getUsers($filter_facility, $filter_role, $filter_search);
        }

        return new Collection();
    }

    private function getUsers(string $filter_facility, string $filter_role, string $filter_search): Collection
    {

        return User::where('name', 'like', '%'.$filter_search.'%')
            ->where('role', '>=', 2)
            ->when($filter_facility != 'all', function ($query) use($filter_facility) {
                $query->where('facility', '=', $filter_facility);
            })
            ->when($filter_role != 'all', function ($query) use($filter_role) {
                $query->where('role', '=', $filter_role);
            })
            ->orWhere(function($query) use($filter_search, $filter_facility, $filter_role) {
                $query->where('surname', 'like', '%'.$filter_search.'%')
                    ->where('role', '>=', 2)
                    ->when($filter_facility != 'all', function ($query) use($filter_facility) {
                        $query->where('facility', '=', $filter_facility);
                    })
                    ->when($filter_role != 'all', function ($query) use($filter_role) {
                        $query->where('role', '=', $filter_role);
                    });
            })
            ->orWhere(function($query) use($filter_search, $filter_facility, $filter_role) {
                $query->where('email', 'like', '%'.$filter_search.'%')
                    ->where('role', '>=', 2)
                    ->when($filter_facility != 'all', function ($query) use($filter_facility) {
                        $query->where('facility', '=', $filter_facility);
                    })
                    ->when($filter_role != 'all', function ($query) use($filter_role) {
                        $query->where('role', '=', $filter_role);
                    });
            })->get();
    }
}
