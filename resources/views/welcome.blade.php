<x-master-layout>
<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="height:100vh; background-size: cover; background-image: url(https://picsum.photos/200/300);">
  
   <div class="container-fluid">
      <div class="row  justify-content-center align-items-center d-flex text-center h-100">
        <div class="col-12 col-md-8  h-50 ">
            <h1 class="display-2  text-light mb-2 mt-5"><strong>BIENVENUE SUR SHOPIFY</strong> </h1>
            <p class="lead  text-light mb-5">Accédez à tous nos produits à coûts defiant toutes concurrence</p>
<p><a href="{{ route("produits.index") }}" class="btn bg-danger shadow-lg btn-round text-light btn-lg btn-rised">Consulter nos produits</a></p>
					
					<div class="btn-container-wrapper p-relative d-block  zindex-1">
						<a class="btn btn-link btn-lg   mt-md-3 mb-4 scroll align-self-center text-light" href="http://bootstraptor.com">
						    {{-- <i class="fa fa-angle-down fa-4x text-light"></i> --}}
						    </a>   
					</div>   
        </div>
		 
      </div>
    </div>
    </section>

  <div class="container">  

    <div class="row">

        <div class="col-md-12 d-flex justify-content-center mt-4 mb-4">
            <h1>Nos Derniers produits ! </h1>
        </div>

        {{-- <div class="col-md-12"> --}}
            @foreach ($produits as $produit )

                <div class="col-md-4">
                        <div class="card text-center">
                        <img width="200" class="card-img-top" src="{{ $produit->image ? asset('storage/uploads/produits/'.$produit->image): 'https://picsum.photos/100/100'}}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $produit->designation }}</h4>
                            <p class="card-text">{{ $produit->description }}</p>
                        </div>
                        </div>
                </div>       
                    
            @endforeach
        {{-- </div> --}}

    </div>

</div>

</x-master-layout>