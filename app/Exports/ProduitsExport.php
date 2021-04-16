<?php

namespace App\Exports;

use App\Models\Produit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

// //pour retourner une collection//

//  class ProduitsExport implements FromCollection
// {
// // //     /**
// // //     * @return \Illuminate\Support\Collection
// // //     */
//         // // Pour retourner une collection    
// // //     // public function collection()
// // //     // {
// // //     //     return Produit::all();
        
// // //     // }
// }
// // 
// pour retourner une vue

class ProduitsExport implements FromView
{
    public function view():View
    {
        // return Produit::all();
        return view('partials._list-produits',[
            'produits'=> Produit::where ("prix", ">",5000)->get()
        ]);
    }

}