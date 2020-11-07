<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Owner;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Rules\TelNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $addresses = Address::where("user_id", "=", Auth::user()->id)
                    ->orderBy("default", "desc")
                    ->get();
        $store = Store::where('user_id', "=", Auth::user()->id)->first();

        return view('profile.index', [
            'addrs' =>  $addresses,
            'store' => $store,
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

    private function showWaitPurchase() {
        return view('profile.user_product.wait');
    }

    private function showPurchased() {
        return view('profile.user_product.purchased');
    }

    private function showDeliveried() {
        return view('profile.user_product.deliveried');
    }

    private function showHistory() {
        return view('profile.user_product.history');
    }

    public function showUserProduct($opt) {
        $view = null;

        switch ($opt) {
            case "wait":
                $view = $this->showWaitPurchase();
            break;
            case "purchased":
                $view = $this->showPurchased();
            break;
            case "deliveried":
                $view = $this->showDeliveried();
            break;
            case "history":
                $view = $this->showHistory();
            break;
            default:
                $view = $this->index();
        }

        return $view;
    }
}
