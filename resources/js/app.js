require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";

window.suppressionConfirm = function(formId){
    Swal.fire({
        title: 'Attention ! Suppression de produit!',
        text: "Êtes-vous sûr de vouloir supprimer ce produit ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!',
        cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
            document.getElementById(formId).submit(); 

        }
      })

}