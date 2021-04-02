<!doctype html>
<html lang="fr">
  <head>
    <title>Formation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    {{-- <link href="{{ asset('css/old.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
  <body>
      <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-success">
                <a class="navbar-brand ml-5" href="/">Formation pratique DSI</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse d-flex justify-conetent-between" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('accueil') }}">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('procedure', "Burkina Faso Ouaga") }}">La procédure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('a.liste') }}">Gestion Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('produit.ajout') }}">Ajout produit</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                    </form>
                    <ul class="navbar-nav mt-2 mt-lg-0 mr-5">
                        @guest  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('login')}}">Se connecter</a>
                                <a class="dropdown-item" href="{{ route('register')}}">Créer un compte</a>
                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('deconnexion').submit();">Deconnexion</a>
                                <form id="deconnexion" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest 
                    </ul>
                </div>    
            </nav>
      </header>
      <br/>
      <main>
        {{ $slot }}
        
      </main>
      <br/>
      <footer class="bg-success">
          <div class="container">
              <div class="row">
                  <br/>
                  <div class="col-md-3"><img style="height: 150px" class="mt-3" src="https://fracademic.com/pictures/frwiki/67/Coat_of_arms_of_Burkina_Faso.svg" alt=""></div>
                  <div class="col-md-3">
                      <div class="strong">ANNUAIRE OFFICIEL</div>


                    La Présidence du Faso
                    Le Gouvernement
                    Les Membres du Gouvernement
                    Assemblée Nationale
                    Les Institutions
                    Service d'Information de l'Etat
                    Le PNDES
                    LE BURKINA FASO
                </div>
                <div class="col-md-3">
                    
                    A la découverte du Burkina Faso
                    Investir au Burkina
                    Le Burkina dans le monde
                    Open Data Burkina Faso
                    La Santé
                    L' Education
                    Les TIC</div>
              <div class="col-md-3">
                <div class="strong">CONTACT</div>


                (+226) 25 30 66 30
                (+226) 25 30 41 10
                contact@servicepublic.gov.bf
                
                #Restez connecté(e)
                
                  
              </div>
         <div class="row">
             <div class="col-md-12 text-center">
             <small>
                 @<i class="fa fa-copyright" aria-hidden="true">Copyright - Ministère de l'Energie</i>
             </small>
         </div>
              </div>
          </div>
        </div>
      </footer>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>