<?php

namespace App\Http\Controllers;
use App\ImagesProducts;
use App\Products;
use App\Users;
use Request;

class SearchController extends Controller
{
    public function searchUser()
    {
        $message = 'Не чего не найдено.';
        $q = Request::get('q');
        if ($q != "") {
            $user = Users::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->orWhere('age', 'LIKE', '%' . $q . '%')->get();
            $images = ImagesProducts::all();
//        dd($user);
            if (count($user) > 0)
                return view('showResultUser', compact($images))->withDetails($user)->withQuery($q);

            else

                return view('showResultUser')->withMessage('Нечего не найдено!');
        }
        return view('showResultUser');

    }
    public function searchProduct()
    {
        $q = Request::get('q');
        if ($q != "") {
            $products = Products::where('name_products', 'LIKE', '%' . $q . '%')->orWhere('name_descriptions', 'LIKE', '%' . $q . '%')->get();
//        dd($user);
            if (count($products) > 0)
                return view('showResultProduct')->withDetails($products)->withQuery($q);

            else

                return view('showResultProduct')->withMessage('Нечего не найдено!');
        }
        return view('showResultProduct');
    }
}

