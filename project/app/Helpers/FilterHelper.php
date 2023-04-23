<?php

namespace App\Helpers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

trait FilterHelper
{
    use ToHTML;
    use HasEnsure;
    use Get;

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
        $raw_roles = Role::get();
        foreach ($raw_roles as $role) {
            if (!($role->users & 8)) {
                $roles[] = $role;
            }
        }
        if ($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 16) {
            $filter_facility = $this->ensureIsNotNullUser(Auth::user())->facility;
            foreach ($roles as $role) {
                if (!($role->users & 16)) {
                    $final_roles[] = $role->id;
                }
            }
        } else {
            foreach ($roles as $role) {
                $final_roles[] = $role->id;
            }
        }

        return User::where('name', 'like', '%'.$filter_search.'%')
            ->whereIn('role', $final_roles)
            ->when($filter_facility != 'all', function ($query) use ($filter_facility) {
                $query->where('facility', '=', $filter_facility);
            })
            ->when($filter_role != 'all', function ($query) use ($filter_role) {
                $query->where('role', '=', $filter_role);
            })
            ->orWhere(function ($query) use ($filter_search, $filter_facility, $filter_role, $final_roles) {
                $query->where('surname', 'like', '%'.$filter_search.'%')
                    ->whereIn('role', $final_roles)
                    ->when($filter_facility != 'all', function ($query) use ($filter_facility) {
                        $query->where('facility', '=', $filter_facility);
                    })
                    ->when($filter_role != 'all', function ($query) use ($filter_role) {
                        $query->where('role', '=', $filter_role);
                    });
            })
            ->orWhere(function ($query) use ($filter_search, $filter_facility, $filter_role, $final_roles) {
                $query->where('email', 'like', '%'.$filter_search.'%')
                    ->whereIn('role', $final_roles)
                    ->when($filter_facility != 'all', function ($query) use ($filter_facility) {
                        $query->where('facility', '=', $filter_facility);
                    })
                    ->when($filter_role != 'all', function ($query) use ($filter_role) {
                        $query->where('role', '=', $filter_role);
                    });
            })->get();
    }
}
