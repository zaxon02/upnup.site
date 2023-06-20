<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaykeeperRequest;
use App\Models\User;

class PaykeeperController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PaykeeperRequest $request)
    {
        $clientid = $request->input('clientid');
        $result = $request->input('result');

        if ($result == 'success') {
            $user = User::findOrFail($clientid);
            $user->subscribed_at = now();
            $user->givePermissionTo('view premium posts');
            $user->save();
            return view('paykeeper.success');
        }

        return view('paykeeper.fail');
    }
}
