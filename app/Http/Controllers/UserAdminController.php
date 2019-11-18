<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $me = Auth::user();
        $users = User::all()->whereNotIn('id', [$me->id]);

        return view('users.index',
            compact('me','users')
        );
    }

    public function premium($id)
    {
        $user = new User;
        $user_f = $user->where('id', '=', $id)->first();
        if(!$user_f) return redirect()->back();
        if($user_f->isModerator() || $user_f->isAdmin()) return redirect()->back();

        if($user_f->isPremium())
            $user_f->role_id = 1;
        else
            $user_f->role_id = 2;

        $user_f->save();
        return redirect()->back()->with('message', 'Пользователь обновлен!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $me = Auth::user();

        return view('users.create',
            compact('me')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flashOnly(['name', 'email']); # Сохранение данных
        if($request->submit_btn == 'restart')
            return redirect()->route('users.edit', $request->user_id)->with('message', 'Страница сброшена');
        $user = new User;
        $password = null;
        $user_f = $user->where('id', '=', $request->user_id)->first();


        if(!$user_f) {
            $user_f = new User;
            if($user_f->where('email', '=', $request->email)->get()->isNotEmpty())
                return redirect()->back()->with('message', 'Ошибка! Такая почта уже существует');

            if(!$request->password)
                $request->password = str_random(8);
            else
                $password = $request->password;

        }

        $user_f->email = $request->email;
        $user_f->name = $request->name;
        $user_f->role_id = $request->status_user?:1;
        if($request->password)
            $password = $request->password;
        if($password)
            $user_f->password = Hash::make($password);

        $user_f->save();

        if($request->send_to_email_data){
            Mail::send(['text'=>'msg.user_data'], ['user' => $user_f], function($message)  use($user_f){
                $message->to($user_f->email, 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            });
            dd(1);
        }

        if($request->submit_btn == 'save_and_leave')
            return redirect()->route('users.index')->with('message', 'Изменения вступили в силу');
        if($request->submit_btn == 'save_and_stay')
            return redirect()->route('users.edit', $user_f->id)->with('message', 'Изменения вступили в силу');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $me = Auth::user();
        $user = User::query()->where('id', '=', $id)->first();
        if(!$user)return redirect()->back()->with('message', 'Ошибка!!! Отредактируйте пользователя позже');

        return view('users.edit', compact('me', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
