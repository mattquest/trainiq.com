<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Session;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Log', [
            'performed_sessions' => $user->sessions()->where('performed_date', '!=', null)->get(),
            'movements' => Movement::all()
        ]);
    }
}
