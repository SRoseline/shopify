@component('mail::message')
# Du nouveau sur Shopify !

Un nouveau produit vient d'être ajouter sur votre plateforme Shopify !
N'hesitez pas à le consulter en cliquant sur le bouton ci-dessous:
@component('mail::button', ['url' => url('produits')])
Voir le produit
@endcomponent

Merci d'avoir choisi Shopify pour votre shopping ! <br>
{{ config('app.name') }}
@endcomponent
