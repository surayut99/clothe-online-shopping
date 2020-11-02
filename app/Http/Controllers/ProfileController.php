<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\TelNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
        $addresses = DB::table('addresses')
                    ->where("user_id", "=", Auth::user()->id)
                    ->orderBy("default", "desc")
                    ->get();

        return view('pages.profile', [
            'addrs' =>  $addresses
        ]);
    }

    public function editProfile(Request $request) {
        $request->validate([
            'new_name' => ['required', 'max:30', 'string'],
            'new_tel' => ['required', 'max:10', new TelNumber]
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('new_name');
        $user->telephone = $request->input('new_tel');
        $user->save();

        return redirect()->route('profile');
    }
}
