@csrf

               <div class="row text-center"> 
            <div class="form-group col-md-6">
              <label for="">Designation</label>
              <input type="text"  value ="{{ old('designation') ??  $produit->designation }}" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
            @error('designation')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">Prix</label>
              <input type="number" value ="{{ old('prix') ?? $produit->prix }}" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('prix')
              <small class="text-danger">
                {{ $message }}
            </small>
          @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">Description</label>
              <input type="text" value ="{{ old('description') ?? $produit->description }}" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
          @error('description')
              <small class="text-danger">
                  {{ $message }}
              </small>
          @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="pays_source">Pays source</label>
                <select class="form-control" name="pays_source" id="">
                  <option value="{{ $produit->pays_source }}" selected> {{ $produit->pays_source }}</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Mali">Mali</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Like</label>
                <input type="number" name="like" id="" value ="{{ $produit->like }}" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('like')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror  
            </div>
            <div class="form-group col-md-6">
                    <label for="">Poids</label>
                    <input type="number" name="poids" value ="old('poids') ?? {{ $produit->poids }}" id="" class="form-control">
            @error('poids')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>

            <div class="input-group col-md-6">
                <div class="custom-file">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Telecharger</span>
                      </div>
                  <input type="file" name="image" class="custom-file-input" value ="old('image') ?? {{ $produit->image }}" id="image">
                  <label class="custom-file-label" for="inputGroupFile01">Choisir image</label>
                </div>
            </div>
              <div class="col-md-4">
                @error('image')
                  <small class="text-danger">
                      {{ $message }}
                  </small>
                @enderror

              </div>

            {{-- <div class="custom-file input-group col-md-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                  </div>
                <input type="file" name="image" value ="old('image') ?? {{ $produit->image }}" id="image" class="custom-file-input">
                <label for="image" class="custom-file-label">Image</label>
            </div> --}}
            <br><br><br>
                <button type="submit" class="btn btn-primary btn-block text-center">{{ $btnTexte }}</button>
                
            </div>