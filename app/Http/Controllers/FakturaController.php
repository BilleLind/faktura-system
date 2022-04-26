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

        $produkter = Produkt::take(5)->get();

        return view('faktura', ['user' => $user, 'produkter' => $produkter]);
    }

    public function gemFaktura(Request $request)
    {
        /* For at sikre at muligheden for "på lager" check samt at pris og produkt id er korrekt */
        $produkter = Produkt::find($request->produkter);

        $ordre = ordre::create([
            'status' => 'igangværende',
            'total_pris' => 0,
            'moms' => 25,
            'fragt' => 39,
            'user_id' => $request->id
        ]);
        /* 
            Her sikres der at produkterne bliver tilknyttet den specifikke ordre samtidig med at den totale pris bliver udregnet
        */
        for ($index=0; $index < count($produkter); $index++) {
            if (! empty($produkter[$index])) {
                $ordre->total_pris += $produkter[$index]->pris;
                $ordre->produkter()->attach($produkter[$index], ['kvantitet' => $request->kvantitet[$index]]);
            }
        }
    
        $ordre->save();
        /* eftersom navn og addresse er tilsendt til den tidligere view, genanvendes dette. Jeg havde lidt problemer med at få samlet navn og addresse under et  user array */
        $pdf = PDF::loadView('pdfs.faktura', ['ordre' => $ordre, 'produkter' => $ordre->produkter, 'navn' => $request->navn, 'addresse' => $request->addresse]);

        return $pdf->stream('pdfs.faktura');
        
    }

}
