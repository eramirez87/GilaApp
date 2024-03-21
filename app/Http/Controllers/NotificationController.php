<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function create()
    {
        $categories = Category::get();
        return view("notification",compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => ['required'],
            'category_id' => ['required'],
            'message' => ['required'],
        ]);
        if($validate){
            $input = $request->except('_token');
            Notification::create($input);
            Session::flash('message', 'Se ha enviado la notificacion.');
            return redirect()->route('notification.create');
        }
    }

    public function send()
    {
        $cola = Notification::where('send',false)->take(1)->get();
        foreach( $cola as $notificacion){
            $categoria = $notificacion->category_id;
            $id_usuarios = DB::table('users_categories')->where('category_id',$categoria)->pluck('user_id');
            foreach($id_usuarios as $user_id){
                $currUser = User::find($user_id);
                dump($currUser->channels);
                die;
            }
        }
        die;
    }

    public function emulateLog($aData=[]){

    }
}

