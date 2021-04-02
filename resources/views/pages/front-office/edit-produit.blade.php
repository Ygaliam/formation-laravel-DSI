<x-master-layout>
<br>

<div class="container">
    <div class="row text-center">
        @if (session('EnregProduit'))   
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button> 
            {{ session('EnregProduit')}}
        </div>
        @endif
        <div class="col-md-12">  
            <h1>
                Modification d'un produit
            </h1>
        </div> 
            
           <form action="{{ route('produit.update', $produit->id) }}" method="post" enctype="multipart/form-data">
                @method("PUT")

                @include('pages.partials._produit-form', ["btnTexte" => "Modifier"])
        </form>
        </div>
    </div>
</div>
</x-master-layout>