<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Message;
use App\Events\MessagePosted;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return Message::where(function (Builder $query) use ($user, $request) {
            $query->where('user_id_receiver', $request->useridreceiver)
                ->where('user_id_sender', $user->id);
        })
            ->orWhere(function (Builder $query) use ($user, $request) {
                $query->where('user_id_receiver', $user->id)
                    ->where('user_id_sender', $request->useridreceiver);
            })
            ->get();
        // return App\Models\Message::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $user = Auth::user();
        $message = new Message();
        $message->message = request()->get('message', '');
        $message->user_id_sender = $user->id;
        $message->user_id_receiver = request()->get('useridreceiver', '');
        $message->save();

        broadcast(new MessagePosted($message, $user))->toOthers();
        return ['message' => $message->load('user')];
    }
}
