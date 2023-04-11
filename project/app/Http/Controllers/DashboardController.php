<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Przejdź na stronę główną
     */
    public function strona_glowna(Request $request): RedirectResponse
    {
        // i zrób coś

        return Redirect::to('/');
    }
}
