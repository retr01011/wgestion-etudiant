

<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
			{{-- Formulaire de Création/Modification d'Étudiant --}}
<h2>Ajouter/Modifier un Étudiant</h2>
<form action="{{ isset($etudiant) ? route('etudiants.update', $etudiant->id) : route('etudiants.store') }}" method="post">
    @csrf
    @if(isset($etudiant))
        @method('PUT')
    @endif
    <label for="nom">Nom de l'Étudiant:</label>
    <input type="text" name="nom" value="{{ isset($etudiant) ? $etudiant->nom : '' }}" required>
    <label for="prenom">Prénom de l'Étudiant:</label>
    <input type="text" name="prenom" value="{{ isset($etudiant) ? $etudiant->prenom : '' }}" required>
    <label for="sexe">Sexe de l'Étudiant:</label>
    <select name="sexe" required>
        <option value="male" {{ isset($etudiant) && $etudiant->sexe == 'male' ? 'selected' : '' }}>Homme</option>
        <option value="female" {{ isset($etudiant) && $etudiant->sexe == 'female' ? 'selected' : '' }}>Femme</option>
    </select>
    <label for="filiere_id">Filière de l'Étudiant:</label>
    <select name="filiere_id" required>
        @foreach($filieres as $filiere)
            <option value="{{ $filiere->id }}" {{ isset($etudiant) && $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
        @endforeach
    </select>
	<label for="user_id">Utilisateur associé:</label>
    <select name="user_id" required>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($etudiant) && $etudiant->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">{{ isset($etudiant) ? 'Modifier' : 'Ajouter' }}</button>
</form>

{{-- Lien vers la page de liste --}}
<a href="{{ route('etudiants.index') }}">Retour à la liste des Étudiants</a>

            </div>
        </div>
    </div>
</x-app-layout>

