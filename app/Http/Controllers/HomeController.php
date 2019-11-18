<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $me = Auth::user();
        $users = User::all();
        $videos = Video::all()->count();
        $visition = Component::query()->where('name', '=', 'visition_home')->first('value');
        $visition = (int) optional($visition)->value;



        return view('admin.dashboard',
            compact('me', 'users', 'videos', 'visition')
        );
    }
}
