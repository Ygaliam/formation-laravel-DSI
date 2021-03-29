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
                Ajout d'un nouveau produit
            </h1>
        </div> 
            
           <form action="{{ route('produit.enregister') }}" method="post">
                @method("POST")

                @csrf

               <div class="row text-center"> 
            <div class="form-group col-md-6">
              <label for="">Designation</label>
              <input type="text"  value ="{{ old('designation') }}" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
            @error('designation')
            <small class="danger">
                {{ $message }}
            </small>
            @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">Prix</label>
              <input type="number" value ="{{ old('prix') }}" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('prix')
              <small>
                {{ $message }}
            </small>
          @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">Description</label>
              <input type="text" value ="{{ old('description') }}" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
          @error('description')
              <small>
                  {{ $message }}
              </small>
          @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="pays_source">Pays source</label>
                <select class="form-control" name="pays_source" id="">
                  <option value="Burkina Faso" {{ old('pays_source')=='Burkina Faso' ? "selected": '' }}>Burkina Faso</option>
                  <option value="Senegal" {{ old('pays_source')=='Senegal' ? "selected": '' }}>Senegal</option>
                  <option value="Mali" {{ old('pays_source')=='Mali' ? "selected": '' }}>Mali</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Like</label>
                <input type="number" name="like" id="" value ="{{ old('like') }}" class="form-control" placeholder="" aria-describedby="helpId">
                @error('like')
                <small>
                    {{ $message }}
                </small>
            @enderror  
            </div>
              <div class="form-group col-md-6">
                <label for="">Poids</label>
                <input type="number" name="poids" value ="{{ old('poids') }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <button type="submit" class="btn btn-primary btn-block text-center">Valider</button>
              @error('poids')
              <small>
                {{ $message }}
            </small>
          @enderror
            </div>
        </form>
        </div>
    </div>
</div>
</x-master-layout>