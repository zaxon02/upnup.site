<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PaykeeperController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clientid = $request->input('clientid');
        $result = $request->input('result');

        if ($result == 'success') {
            $user = User::findOrFail($clientid);
            $user->subscribed_at = now();
            $user->save();
            return view('paykeeper.success');
        }

        return view('paykeeper.fail');
    }
}
