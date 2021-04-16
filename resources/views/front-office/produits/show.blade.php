<x-master-layout>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-8 offset-2">
                    <h4 class="text-center my-2 text-primary">Détails du produit</h4>
                    <div class="card-content">
                        <div class="card-img">
                            <img src="{{ $produit->image ? asset('storage/uploads/produits/'.$produit->image): 'https://picsum.photos/100/100'}}" alt="">
                          
                        </div>
                        <div class="card-desc">
                            <h3>{{ $produit->designation }}</h3>
                            <p>{{ $produit->description }}</p>
                                <a href="#">{{ formatPrixBf($produit->prix) }}</a>   
                        </div>
                    </div>
                </div>

            </div>
        </div>

</x-master-layout>