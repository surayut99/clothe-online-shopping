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

        return view('profile.index', [
            'addrs' =>  $addresses
        ]);
    }

    public function showEditProfile() {
        return view('profile.edit_profile');
    }

    public function editProfile(Request $request) {
        $request->validate([
            'new_name' => ['required', 'max:30', 'string'],
            'new_tel' => ['required', 'max:10', new TelNumber]
        ]);

        print_r($request->input());
        print_r($request->file());

        $img = $request->file('inpImg');
        $filename = Auth::user()->id . "." . $img->getClientOriginalExtension();
        $path = 'storage/pictures/avatars';

        $img->move($path, $filename);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('new_name');
        $user->telephone = $request->input('new_tel');
        $user->profile_photo_path = $path . "/" . $filename;
        $user->save();

        return redirect()->route('profile');
    }
}
