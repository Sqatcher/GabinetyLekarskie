<?php

namespace App\Http\Controllers;

use App\Helpers\FilterItemHelper;
use App\Helpers\Get;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StorageController extends Controller
{
    use FilterItemHelper;
    use Get;

    /**
     * Display the storage.
     */
    //to jest tak jakby allusers
    public function show(Request $request): View | RedirectResponse
    {
//      Jak nie ma dostępu do widoku swojej, czyli tak na prawdę w ogóle to wywalamy
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->storage) & 1) {
            return Redirect::to('/');
        }

        session(["item_filter_search" => '%']);

        $facilities = array();
        $raw_users  = User::select('facility')->groupBy('facility')->get();
        foreach ($raw_users as $user) {
            $facilities[] = $this->getFacility($user->facility);
        }
        $facilities = array_unique($facilities);

        $user_role = $this->getRole($this->ensureIsNotNullUser(Auth::user())->role);

        return view('auth.storage')
            ->with('facilities', $facilities)
            ->with('items', $this->filter(new Request()))
            ->with('user_role', $user_role);
    }

    public function filter(Request $request): RedirectResponse | Response
    {
//      Jak nie ma dostępu do widoku swojej, czyli tak na prawdę w ogóle to wywalamy
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->storage & 1)) {
            return Redirect::to('/');
        }

        $request->validate([
            'filter_facility' => ['string'],
            'filter_search' => ['string'],
        ]);

        $type = 'item';
        return $this->filterProcedure($request, $type);
    }
}
