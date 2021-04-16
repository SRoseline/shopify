<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Core\Number;
use App\Models\Produit;
use App\Models\Category;
use App\Mail\ProduitAjoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProduitFormRequest;
use App\Notifications\ModificationProduit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*recuperer les données dans la table produits*/
        //$produits=Produit::all();
        //rechercher un produit avec id=1
        //$produits1=Produit::find(1);
        //rechercher un produit avec id=20 ou echoue
       // $produits1=Produit::findOrFail(20);
        // $premier = Produit::first();
        // dd($premier);
        //dd($produits1);
        /*recuperer l'ensemble des produits dont le produit =500*/
       /* $produits500=Produit::where("prix", 500)->get();*/
       /*rechercher les produit dont le prix=500 et la designation= livre. On utilise un tableau dans ce cas*/
       /*$produits500=Produit::where(["prix"=>500, "designation"=>"Livre"])->get();*/
       /*recuperer l'ensemble des produits dont le prix =500 ou la designation = cahier*/
       //$produits500=Produit::where("prix", ">", 500)-> where ("designation","Livre")->get();
        //dd($produits500);

        //dump($produits);
              
        //dump($produits);

//recuperer tous les produits sur une même page
        //$produits=Produit::all();

        //recuperer tous les 15 produits par page de facon decroissante
        $produits=Produit::orderByDesc("id")->paginate(15);

        return view("front-office.produits.index", [
            "produits"=> $produits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //afficher le formulaire pour ajouter uin produit
     public function create()
    {
        $categories = Category::all();
        $produit = new Produit;
        return view("front-office.produits.create", [
            "categories"=>$categories,
            "produit"=>$produit,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    { 
        // dd($request);

        $imageName = "produit.png";

        if($request->file("image")){

            $imageName = time().$request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("public/uploads/produits", $imageName);
        }
        $request->session()->put("imageName", $imageName);
        

        //conditions de validation sur les champs
        // $request->validate([
        //     "designation"=>"required|min:3|max:50|unique:produits,designation,".$id,
        //     "prix"=>"required|numeric|between:500,100000",
        //     "description"=> "required|max:200",
        //     "category_id"=>"required|numeric",

        // ]);
        //dd($request->designation);
        Produit::create([
            "designation"=>$request->designation,
            "prix"=>$request->prix,
            "category_id"=>$request->category_id,
            "description"=>$request->description,
            "image"=>$imageName,
        ]);

        //Recuperer le premeier utilisateur
        $user = User::first();
        //envoyer le mail au premier utilisateur
        Mail::to($user)->send(new ProduitAjoute);
        //rediriger sur la page des produits et retourner une notification à l'utilisateur
        return redirect()->route('produits.index')->with("statut","Produit ajouter avec succès !");

        //dd($produit);

    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
       
        return view("front-office.produits.show", [
            "produit"=> $produit
       ]);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
      
        $categories = Category::all();

       return view("front-office.produits.edit", [

        "produit"=>$produit,
        "categories"=>$categories,
        
       ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
  //conditions de validation sur les champs
        // $request->validate([
        //     "designation"=>"required|min:3|max:50|unique:produits,designation,".$id,
        //     "prix"=>"required|numeric|between:500,100000",
        //     "description"=> "required|max:200",
        //     "category_id"=>"required|numeric",

        // ]);

        Produit::where("id", $id)->update ([
            "designation"=>$request->designation,
            "prix"=>$request->prix,
            "category_id"=>$request->category_id,
            "description"=>$request->description,

        ]);
//definir un utilisateur
        $user=User::first();
        $user->notify(new ModificationProduit);

        

        //rediriger sur la page des produits et retourner une notification à l'utilisateur
      
        return redirect()->route('produits.index')->with("statut","Produit modifié avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);
        return redirect()->route('produits.index')->with("statut","Produit supprimé avec succès !");
    }
}
