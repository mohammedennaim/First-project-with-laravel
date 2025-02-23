@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Modifier le club: {{ $club->name }}</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('clubs.update', $club) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du club</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $club->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $club->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select class="form-select @error('category') is-invalid @enderror" 
                                    id="category" name="category" required>
                                <option value="">Choisir une catégorie</option>
                                <option value="Tech" {{ old('category', $club->category) == 'Tech' ? 'selected' : '' }}>Tech</option>
                                <option value="Design" {{ old('category', $club->category) == 'Design' ? 'selected' : '' }}>Design</option>
                                <option value="Robotique" {{ old('category', $club->category) == 'Robotique' ? 'selected' : '' }}>Robotique</option>
                                <option value="Gaming" {{ old('category', $club->category) == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            @if($club->logo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($club->logo) }}" alt="Logo actuel" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                            <label for="logo" class="form-label">Nouveau logo (optionnel)</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                                   id="logo" name="logo" accept="image/*">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection