<x-master-layout>
 <div class="container">
     <div class="row">
         <div class="col-md-9">
            <h3>Listes des produits</h3>
             
            @if (session('statut'))   
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button> 
                {{ session('statut')}}
            </div>
            @endif
            @if ( $lesproduits->count() > 0 )
            <div class="class text-right">
                <a class="btn btn-success" href="{{ route ('produit.ajout') }}" role="button">Ajouter
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 20px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                      </svg>
                  </a>
                <a class="btn btn-primary" href="{{ route ('excel.export') }}" role="button">Exporter en Excel
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                      </svg>
                  </a>
                  
            </div><br>
            <table class="table table-hover">
               <thead>
                   <tr>
                       <td>Designation</td>
                       <td>Prix</td>
                       <td>Pays d'origine</td>
                       <td>Actions</td>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($lesproduits as $produit)
                   <tr>
                       <td>{{ $produit->designation }}</td>
                       <td>{{ $produit->prix }} XOF</td>
                       <td>{{ $produit->pays_source }}</td>
                       <td class="d-flex"> 
                           {{-- <a href="{{ route ('deleteListe', $produit->id) }}" class="btn btn-danger mr-2" >
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                             </svg>
                           </a> --}}
                           <a href="#" onClick="deleteConfirm('{{'produitItem'.$produit->id}}', '{{ $produit->designation }}')" class="btn btn-danger mr-2">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg></a>
                          <form id="{{'produitItem'.$produit->id}}" action="{{ route('deleteListe', $produit->id) }}" method="GET" style="display:none;">
                            @csrf
                          </form>
                           <a href="{{ route ('ajoutercommande', $produit->id) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                           </a>
                           <a href="{{ route ('produit.modifier', $produit->id) }}" class="btn btn-primary ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                           </a>
                        </td>
                   </tr>
                   @endforeach
               </tbody>
           </table> {{ $lesproduits->links() }}

            @else
            <div class="alert alert-danger" role="alert">
                <strong>Aucun produit disponible</strong>
            </div>
            

            @endif
         </div>
         <div class="col-md-3">
            <h3>Listes des Commandes</h3>
             
            @if (session('statutC'))   
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button> 
                {{ session('statutC')}}
            </div>
            @endif
            @if ( $lescommandes->count() > 0 )

            <table class="table table-hover">
               <thead>
                   <tr>
                       <td>Designation</td>
                       <td>Prix</td>
                       <td>Pays d'origine</td>
                       <td>Actions</td>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($lescommandes as $commande)
                   <tr>
                       <td>{{ $commande->produit->designation }}</td>
                       <td>{{ $commande->produit->prix }} XOF</td>
                       <td>{{ $commande->produit->pays_source}}</td>
                       <td> <a href="{{ route ('deleteCommande', $commande->id) }}" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 25px;">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                             </svg>
                           </a></td>
                   </tr>
                   @endforeach
               </tbody>
           </table> {{ $lescommandes->links() }}
            @else
            <div class="alert alert-danger" role="alert">
                <strong>Aucune commande disponible</strong>
            </div>
            @endif
         </div>
     </div>
 </div>
</x-master-layout>