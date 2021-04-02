@component('mail::message')
# Bienvenusur sur notre plateforme
Vous avez ajouté le produit : {{ $produit->designation}}.
Les details sont : Prix : {{ $produit->prix}}, Poids: {{ $produit->poids}}

## Burkina Faso

Ceci est un mail test.

@component('mail::button', ['url' => ''])
connectez-vous
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
