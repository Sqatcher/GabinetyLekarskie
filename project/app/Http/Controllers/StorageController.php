<?php

namespace App\Http\Controllers;

use App\Helpers\FilterItemHelper;
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

    /**
     * Display the storage.
     */
    public function show(Request $request): View
    {
        $facilities = array();
        $raw_facilities  = User::select('facility')->groupBy('facility')->get();
        foreach ($raw_facilities as $facility) {
            $facilities[] = $facility->facility;
        }
        $facilities = array_unique($facilities);

        return view('auth.storage')
            ->with('facilities', $facilities)
            ->with('items', $this->filter(new Request()));
    }

    public function filter(Request $request): Response
    {
        $request->validate([
            'filter_facility' => ['string'],
            'filter_search' => ['string'],
        ]);

        $type = 'item';
        return $this->filterProcedure($request, $type);
    }
}
