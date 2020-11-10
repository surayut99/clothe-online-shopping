<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProductController extends Controller
{
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
                $view = redirect()->route('profile');
        }

        return $view;
    }
}
