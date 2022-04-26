<?php

namespace App\Http\Controllers;

use App\Models\ordre;
use App\Models\Produkt;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $produkter = Produkt::find($request->produkter);

        $ordre = ordre::create([
            'status' => 'igangværende',
            'total_pris' => 0,
            'moms' => 25,
            'fragt' => 39,
            'user_id' => $request->id
        ]);

        for ($index=0; $index < count($produkter); $index++) {
            if (! empty($produkter[$index])) {
                $ordre->total_pris += $produkter[$index]->pris;
                $ordre->produkter()->attach($produkter[$index], ['kvantitet' => $request->kvantitet[$index]]);
            }
        }

        $pdf = PDF::loadView('pdfs.faktura', ['ordre' => $ordre, 'produkter' => $ordre->produkter, 'navn' => $request->navn, 'addresse' => $request->addresse]);

        return $pdf->stream('pdfs.faktura');
        
    }

}
