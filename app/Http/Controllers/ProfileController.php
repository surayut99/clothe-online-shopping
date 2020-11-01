<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Rules\TelNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
        $addresses = DB::table('addresses')->where("user_id", "=", Auth::user()->id);

        return view('pages.profile', [
            'addr' =>  $addresses
        ]);
    }

    public function editProfile(Request $request) {
        // wait to edit picture profile

        $request->validate([
            'name' => ['required', 'max:30', 'string'],
            'telephone' => ['required', 'max:10', new TelNumber]
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('new_name');
        $user->tel = $request->input('new_tel');
        $user->save();
    }

    public function addAddress(Request $request) {

        $request->validate([
            'address' => ['required']
        ]);

        $user = User::findOrFail(Auth::user()->id);

    }
}
