<x-master-layout>
        <div class="container">
        
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">AJOUTER UN NOUVEAU PRODUIT</h1>                       
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset -md-3">
                            <form method="post" action="{{ route ('produits.store') }}" enctype="multipart/form-data">
                              
                                @method("POST") <!---insister sur l'envoi -->
                            
                                {{-- idem commenter ce code car il est identique à celui qui se trouve dans le edit.blade.php    --}}
                                {{-- @csrf <!---PERMET DE SECURISER LE FORMULAIRE -->
                                    
                                <div class="form-group">
                                      <label for="">Désignation</label>
                                      <input value= "{{ old("designation") }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                      @error("designation")

                                        <small class="text-danger">{{ $message }}</small>

                                      @enderror

                                </div>
        
                                <div class="form-group">
                                    <label for="">Prix</label>
                                    <input value= "{{ old("prix") }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                   
                                    @error("prix")

                                    <small class="text-danger">{{ $message }}</small>

                                  @enderror
                                </div>                
                                <div class="form-group">
                                    <label for="category_id">Catégorie</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                       @foreach ($categories as $categorie)
                                       <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                           
                                       @endforeach
                                    </select>
                                    @error("category_id")

                                    <small class="text-danger">{{ $message }}</small>

                                  @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">
                                        
                                        {{ old("description") }}
                                    
                                    </textarea>
                                    @error("decription")

                                    <small class="text-danger">{{ $message }}</small>

                                  @enderror
                                    </div>                           
                                </div> 
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Valider</button>                           --}}

                                @include('partials._produit-form')

                            </form>
                    </div>
                </div>
        </div>
</x-master-layout>