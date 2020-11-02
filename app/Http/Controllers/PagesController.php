<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $rec_images = [
            "เสื้อผู้ชาย" => 'storage/pictures/male_clothe.png',
            "เสื้อผู้หญิง" => 'storage/pictures/female_clothe.png',
            "รองเท้าผู้ชาย" => 'storage/pictures/male_shoe.png',
            "รองเท้าผู้หญิง" => 'storage/pictures/female_shoes.png',
            "กระเป๋า" => 'storage/pictures/bag.png'
        ];
        return view('pages.home',[
            'rec_images' => $rec_images,
        ]);
    }
}
