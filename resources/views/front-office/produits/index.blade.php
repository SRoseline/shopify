<x-master-layout>
<div class="container">

        <div class="row">
            <div class="col-md-12">

                {{-- 2eme façon de generer un message flash de succès seulement lorsqu'il y a un ajout de produit --}}
               @if (session('statut'))
               
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 <strong></strong> {{ session('statut') }}
               </div>
               @endif
            <h1 class="text-center">TOUS NOS PRODUITS</h1>
             </div>
             {{-- 1er façon de generer un message flash --}}
             {{-- {{ session("statut") }} --}}
             


             <div>
                 <a href="{{ route('produits.create') }}" class="btn btn-success btn -sm">
                     <i class="fas fa-plus    "></i> AJOUTER
                 </a>

                 <a href="{{ route('export') }}" class="btn btn-primary btn -sm">
                    <i class="fas fa-download   "></i> EXPORTER
                </a>

             </div>
          Le nom de l'image selectionné est :{{ session("imageName") }}
            <table class="table">
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Category</th>

                        <th>Prix</th>
                        <th>Description</th>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit )
                        <tr>
                            <td scope="row">{{ $produit->designation }}</td>
                            <td>{{$produit->category ? $produit->category->libelle:"Non categorisé" }}</td>
                            {{-- <td>{{ $produit->prix }}</td> --}}
                            <td>{{ formatPrixBf($produit->prix) }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>
                            <a href="{{route('produits.edit',$produit) }}"class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit    "></i></a>
                            <a href="{{route('produits.show',$produit) }}"class="btn btn-primary btn-sm mr-2"><i class="fas fa-eye  "></i></a>
                            {{-- <a href="{{route('produits.destroy',$produit->id)}}" class="btn btn-danger btn-sm" onClick="event.preventDefault(); if(confirm('Etes-vous certain de vouloir supprimer ce produit?')) document.getElementById('{{ $produit->id }}').submit()"><i class="fas fa-trash"></i> </a>
                            <form id="{{ $produit->id }}" method="post" action="{{route('produits.destroy',$produit->id)}}"> --}}
                            <a href="#" class="btn btn-danger btn-sm" onClick="event.preventDefault(); suppressionConfirm('{{ $produit->id }}')"><i class="fas fa-trash"></i> </a>
                            
                        </td>
                        <form id="{{ $produit->id }}" method="post" action="{{route('produits.destroy',$produit->id)}}">
                                @csrf
                                @method("DELETE")
    
                                </form>
                        </tr>
                    @endforeach
                            
                </tbody>
            </table>
            <div class="mt-5 d-flex justify-content-center">
            {{ $produits->links() }}

            </div>
        </div>
</div>
</x-master-layout>