<?php

namespace App\Http\Controllers\API;

use App\Models\Component;
use App\Models\Role;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
//use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);


        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function videos()
    {
        $user = Auth::user();
        $premium_user = $user->role->name == 'premium_user';

        $roles = Role::all()->map(function($role){
            return $role->name;
        })->filter()->toArray();
        if(!in_array($user->role->name, $roles))
            return response()->json(['succes' => false], 300);

        $video = Video::all();
        $videos = collect($video)
            ->map(function($item){
                if($item['status'])
                    return $item;
            })->filter()
            ->map(function($item) use($premium_user){
                if(!$premium_user and $item['premium'])
                    $item['src'] = '#';
                return $item;
            });


        return response()
            ->json(['success' => !empty($videos), 'data' => $videos], 300);
    }


    public function components()
    {
        $components = Component::all();
        return response()->json(['success' => true, 'data' => $components], 200);
    }

    public function component()
    {
        $request = request();
        $components = new Component;
        $component = $components->where('name', '=', $request->name)->first();
        if(!$component)
            return response()->json(['success' => false], 404);

        return response()->json(['success' => true, 'data' => $component], 200);
    }
}
