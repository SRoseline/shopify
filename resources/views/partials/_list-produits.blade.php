<table class="table">
    <thead>
        <tr>
            <th>Designation</th>
            <th>Category</th>

            <th>Prix</th>
            <th>Description</th>
           
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
                <a href="{{route('produits.destroy',$produit->id)}}" class="btn btn-danger btn-sm" onClick="event.preventDefault(); if(confirm('Etes-vous certain de vouloir supprimer ce produit?')) document.getElementById('{{ $produit->id }}').submit()"><i class="fas fa-trash"></i> </a>
                <form id="{{ $produit->id }}" method="post" action="{{route('produits.destroy',$produit->id)}}">
                @csrf
                @method("DELETE")

                </form>
            </td>
            </tr>
        @endforeach
                
    </tbody>
</table>