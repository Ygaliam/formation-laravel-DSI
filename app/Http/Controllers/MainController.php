<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use App\Mail\NouveauProduitAjoutee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProduitFormRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NouveauProduitNotification;

class MainController extends Controller
{
    // fonction pour retourner une page 
public function afficheAccueil()
{
    //dd(Auth::user()->role->role);
    return view('pages.front-office.welcome',
    [
        'nomSite' => "Service en ligne",
        'nomMinistere' => "Ministère laravel au Burkina Faso"
    ]
    );
}

// fonction pour retourner une page avec des params recemment entrées
public function afficheProcedure($param)
{
    return view('pages.front-office.procedure',
    [
        'parametre' => $param
    ]);
}
//Fonction pour créer un nouveau produit
 public function ajoutProduit() 
        {
            $produit = New Produit();

            $produit->uuid = Str::uuid();
            $produit->designation = 'Tomate';
            $produit->description = 'Lorem est aller au village et il ya eu beaucoup de dommage';
            $produit->prix = '1000';
            $produit->like = '21';
            $produit->pays_source = 'Burkina Faso';
            $produit->poids = '45.10';

            $produit->save();
            
        }
    
        //Fonction pour créer un nouveau produit - Deuxieme produit
    public function ajoutProduitEncore() 
        {
            Produit::create(
                [
                    'uuid'     =>  Str::uuid(),
                    'designation'     =>'Mangue',
                    'description'     =>'Lorem est aller au village et il ya eu beaucoup de dommage',
                    'prix'            => '1500',
                    'like'            => '63',
                    'pays_source'     => 'Senegal',
                    'poids'           => '89.5',
                ]
                );
        }

        //Fonction pour afficher les produits
        public function getList()
        {
            //$listproduit = Produit::all();
            // dump($listproduit);

            // Sceller les deux entités: Produit et User
            $produit = Produit::first();

            $user = User::first();

            // $produit->users()->attach($user->id);
            // $produit->users()->attach($user);



            $users = $produit->users;

            $produit = $user->produits;

            // if ($users instanceof)

            //dd($produit, $users);

            return view("pages.front-office.list-produits", [
                "lesproduits" => Produit::paginate(3),
                "lescommandes" => Commande::paginate(3)
            ]);
        }

        //Fonction pour modifier un produit
        public function modifierProduit($id)
        {
            $produitModifier = Produit::where("id", $id)->update([
                "designation" => "Papaye",
                "description" => "La description de papaye"
            ]);

            dd($produitModifier);
        }

        //Fonction pour supprimer un produit
        public function supprimerProduit($id)
        {
            // 1ere facon
            // $produit = Produit::find($id);
            // dump($produit);
            // $produit->delete();

            //2ieme facon
            Produit::where("id", $id)->delete();
            // return redirect()->back();
            // return redirect()->route('accueil');
            return redirect()->back()->with('statut','Supprimer avec succes');

            //Pour supprimer en masse utiliser le destroy
            //$produit = Produit::destroy($id);

        }

        public function ajoutercommande($id)
        {
            $commande = new Commande();
            $commande->produit_id=$id;
            $commande->uuid=Str::uuid();
            $commande->save();
            // dump($commande);
            return redirect()->back()->with('statutC','Commande ajouté avec succes');
        }
        
        public function supCommande($id)
        {
            Commande::where("id", $id)->delete();
            return redirect()->back()->with('statutSupprimer','Commande supprimer avec succes');

        }

        public function ajouterProduit()
        {
            $produit = new Produit;
           return view('pages.front-office.ajouter-produit', ["produit"=>$produit]);
        }

        public function enregisterProduit( ProduitFormRequest $request)
        {
            // dd($request);
            // dd($request->all());

            // $request->validate([
            //     "designation"   => "required|min:5|max:100",
            //     "prix"          => "required|digits_between:2, 5",
            //     "description"   => "required|min:2|max:200",
            //     "like"          => "required|digits_between:1, 2",
            //     "poids"         => "required|digits_between:1, 2",
            //     "pays_source"   => "required|min:3|max:255"
            // ]);

            //dd("time()");

            //dd($request->file("image")->getClientOriginalName());

        $imageName = time()."_".$request->file("image")->getClientOriginalName();

        //dd($imageName);

        $request->file("image")->storeAs("public/produits-image", $imageName);

        $produit = Produit::create([

            'uuid' => Str::uuid(),

            'designation' =>$request->designation,

            'prix' =>$request->prix,

            'description' =>$request->description,

            'pays_source' =>$request->pays_source,

            'like' =>$request->like,

            'poids' =>$request->poids,

            'image' =>$imageName
        ]);

        // $user = User::first();

        // Mail::to($user)->send(new NouveauProduitAjoutee($produit));

            // $user = User::first();
            
            // Notification::send($user, new NouveauProduitNotification($produit));

        return redirect()->back()->with('EnregProduit','Enregistrement Produit avec succes');
}

    public function editProduit(Produit $produit)
    {
        // $produit = Produit::find($id);
         $produit = Produit::findOrfail($produit->id);
        //dd($produit);

        return view('pages.front-office.edit-produit', [
            'produit' => $produit,
        ]);
    }

    public function updateProduit($id, ProduitFormRequest $request)
    {
        $imageName = "default-image.png";

        if($request->file("image")){
        $imageName = time()."_".$request->file("image")->getClientOriginalName();

        $request->file("image")->storeAs("public/produits-image", $imageName);

    }

        $produitModif = Produit::where("id", $id)->update([
            'designation' =>$request->designation,

            'prix' =>$request->prix,

            'description' =>$request->description,

            'pays_source' =>$request->pays_source,

            'like' =>$request->like,

            'poids' =>$request->poids,

            'image' => $imageName
        ]);

        return redirect()->route('a.liste')->with('statut','Produit modifier avec succes');

    }

    public function excelExport()
    {
        return Excel::download(new ProduitsExport, "Produits.xls");
    }

     public function sendMail($produit)
     {
         $user = User::first();

         Mail::to($user)->send(new NouveauProduitAjoutee($produit));

         dd('Le mail a bien été envoyé !!');
     }

}