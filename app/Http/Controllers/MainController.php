<?php

namespace App\Http\Controllers;

use App\Exports\ProduitsExport;
use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{

    public function acceuil(){
        $produits = Produit::orderByDesc("id")->take(9)->get();
        return view("welcome", [
            "produits"=>$produits,

        ]);

    }



    public function ajouterProduit()
    //
    {
       
        $produit = Produit::create([
            "designation" => "Cahier",
            "description" => "La description du cahier",
            "prix" => 500
        ]);

        dd($produit);
    }
    public function ajouterProduit2(){

         /*extenciation du produit*/
         $produit = new Produit();

         $produit->designation = "Livre";
 
         $produit->description = "La description du livre";
 
         $produit->prix = 1000;
         
         /*sauvegarder les donnés dans la base de données*/
         $produit->save();
    }

public function updateProduit(Produit $produit)
    {
        dd($produit);
        //$produit= Produit::findOrFail($id);
       // dump($produit);
        $produit->designation = "Chemise";
        $produit->description = "La description de la chemise";
        $produit->prix= 6000;
        $produit->save();
        dd($produit);
    }

    public function updateProduit2($id)
    {
        $produit = Produit::findOrfail($id);
        //dd($produit);
        $resultat=Produit::where("id",$id)->update([
            "designation"=>"Tricot",
            "description"=>"Tricot pour enfant",
            "prix"=>"1500"
        ]);
       dd($resultat);
    }
//supprimer les produits avec les codes en renseignat un id
    public function supprimerProduit($id)
    {
       $resultat=Produit::destroy($id);
       dd($resultat);
    }
//suprimer le produits id= 1
    public function supprimerProduit1()
    {
       $resultat=Produit::destroy(1);
       dd($resultat);
    }

    
    public function createCategory()
    {
        //creer la catégorie vetement
        $category=Category::create([
            "libelle"=>"Bijou",
        ]);
        // creer le produit de la categorie vetement
        $produit = Produit::create([
            "category_id"=>$category->id,
            "designation" => "Collier",
            "description" => "La description du collier",
            "prix" => 4000
        ]);
        //dd($produit);
    }

  public function getProduit(Produit $produit)
  {
      $category= Category::first();

      dd($category, $category->produits);

     //dd($produit->category);
  }

  public function commanderProduit()
  {
      /*$user= User::create([
          "name"=>"SOMBIE Roseline",
          "email"=>"roseline@yahoo.fr",
          "password"=>Hash::make("admin123"),
      ]);*/ 

      $user= User::create([
        "name"=>"SANOU Baba",
        "email"=>"baba@yahoo.fr",
        "password"=>Hash::make("admin123"),
    ]); 
    $user = User::first();
    $produit1 = Produit::first();
    $produit2 = Produit::findOrFail(2);

    //$user->produits()->attach($produit1);

    $user->produits()->attach($produit2);
    
    dd($user->produits);
    
  }
 public function collection()
 {
    $collection1= collect([
        collect([
            "titre"=>"Mon super livre1",
            "prix"=>"5000",
            "description"=>"La description du livre1"
        ]),
        collect([
            "titre"=>"Mon super livre2",
            "prix"=>"10000",
            "description"=>"La description du livre2"
        ]),
        collect([
            "titre"=>"Mon super livre3",
            "prix"=>"20000",
            "description"=>"La description du livre3"
        ]),

    ]);
    //Afficher le titre du premeir livre
   // dd($collection1)->first()->get('titre');

    //Ajouter une nouvelle collection
    $collection1->push([
        "titre"=>"Mon livre4",
        "prix"=>"30000",
        "decription"=>"Description du Mon livre4",
    ]);

    //Compter le nombre de collection
    dd($collection1)->count();

//Filtrer la collection
    $nouvelleCollection = $collection1->filter(function($livre,$key){
        return $livre["prix"]>=10000;

    });
    dd($nouvelleCollection);
 }

 public function exportProduits()
 {
 return Excel::download(new ProduitsExport, "produits.xlsx");

 }

}


