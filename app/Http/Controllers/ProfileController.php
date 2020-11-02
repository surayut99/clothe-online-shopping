<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Owner;
use App\Models\Store;
use App\Models\User;
use App\Rules\TelNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {

        $addresses = DB::table('addresses')->where("user_id", "=", Auth::user()->id)->get();
        $stores = DB::table('stores')->where('user_id', "=", Auth::user()->id)->get();
        return view('pages.profile', [
            'addr' =>  $addresses,
            'stores' => $stores,
        ]);
    }

    public function editProfile(Request $request) {
        $request->validate([
            'name' => ['required', 'max:30', 'string'],
            'telephone' => ['required', 'max:10', new TelNumber]
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('new_name');
        $user->tel = $request->input('new_tel');
        $user->save();

        return redirect()->route('profile');
    }
}
