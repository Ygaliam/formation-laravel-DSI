@component('mail::message')
# Noueau Produit sur notre plateform
Un nouveau produit vient d'etre ajouté sur notre plateforme

Vous trouverez ci-dessous les informations du produit

## Désignation: {{ $produit->designation }}

## Prix: {{ $produit->prix }}

## Description du produit:
{{ $produit->description }}

@component('mail::button', ['url' => url("/list-produits")])
Voir le produit
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
