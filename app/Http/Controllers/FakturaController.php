<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Models\User;
use Illuminate\Http\Request;

class FakturaController extends Controller
{
    
    public function faktura()
    {
        $user = User::find(1);

        /*  */
        $produkter = Produkt::all();


        return view('faktura', ['user' => $user, 'produkter' => $produkter]);
    }

    public function gemFaktura(Request $request)
    {
        return $request;
    }

}
