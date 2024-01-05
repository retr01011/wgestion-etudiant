


<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
			{{-- Formulaire de Création/Modification de Filière --}}
<h2>Ajouter/Modifier une Filière</h2>
<form action="{{ isset($filiere) ? route('filieres.update', $filiere->id) : route('filieres.store') }}" method="post">
    @csrf
    @if(isset($filiere))
        @method('PUT')
    @endif
    <label for="nom">Nom de la Filière:</label>
    <input type="text" name="nom" value="{{ isset($filiere) ? $filiere->nom : '' }}" required>
    <button type="submit">{{ isset($filiere) ? 'Modifier' : 'Ajouter' }}</button>
</form>

{{-- Lien vers la page de liste --}}
<a href="{{ route('filieres.index') }}">Retour à la liste des Filières</a>
            </div>
        </div>
    </div>
</x-app-layout>

