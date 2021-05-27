<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $lastFile = $files->first();

        $mycontracts = Contract::where('user_id', Auth::user()->id)
            // ->orWhere('signer_two_mail', Auth::user()->email)
            ->get();

            $myinvitations = Auth::user()->contracts;

        return view('home', compact('files', 'lastFile', 'myinvitations'));
    }
}
