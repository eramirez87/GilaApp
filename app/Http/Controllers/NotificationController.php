<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Category;
use App\Models\User;
use App\Models\Log;

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
        $cola = Notification::where('send',false)->get();
        foreach( $cola as $notificacion){
            $categoria = $notificacion->category_id;
            $usuarios = User::select('id')->with(['categories' => function($q)use($categoria){
                $q->where('category_id',$categoria);
            }])->get();
            foreach($usuarios as $usuario){
                $this->emulateLog($notificacion,$usuario);
            }
            Notification::find($notificacion->id)->update(['send'=>true]);
        }
    }

    public function emulateLog($n,$u){
        //Se manda una notificacacion por cada canal del usuario de la notificacion
        $user = User::find($u->id);
        foreach($user->channels as $channel){
            Log::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'channel' => $channel->name,
                'message' => $n->message,
            ]);
        }
    }
}

