@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- En-tête -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 fw-bold mb-1">
                            Modifier le club
                        </h1>
                        <p class="text-muted mb-0">{{ $club->name }}</p>
                    </div>
                    <a href="{{ route('clubs.index') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i>Retour
                    </a>
                </div>
                <hr class="my-4">
            </div>
        </div>

        <!-- Formulaire de modification -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('clubs.update', $club) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Nom du club</label>
                                <input type="text"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name', $club->name) }}"
                                       placeholder="Entrez le nom du club">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description"
                                          rows="5"
                                          placeholder="Décrivez votre club">{{ old('description', $club->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="category" class="form-label fw-bold">Catégorie</label>
                                <select class="form-select form-select-lg @error('category') is-invalid @enderror"
                                        id="category"
                                        name="category">
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option value="Tech" {{ old('category', $club->category) == 'Tech' ? 'selected' : '' }}>
                                        Tech
                                    </option>
                                    <option value="Design" {{ old('category', $club->category) == 'Design' ? 'selected' : '' }}>
                                        Design
                                    </option>
                                    <option value="Robotique" {{ old('category', $club->category) == 'Robotique' ? 'selected' : '' }}>
                                        Robotique
                                    </option>
                                    <option value="Gaming" {{ old('category', $club->category) == 'Gaming' ? 'selected' : '' }}>
                                        Gaming
                                    </option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="logo" class="form-label fw-bold">Logo du club</label>
                                @if($club->logo)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($club->logo) }}"
                                             alt="Logo actuel"
                                             class="img-thumbnail"
                                             style="max-height: 100px;">
                                    </div>
                                @endif
                                <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fas fa-image text-muted"></i>
                                </span>
                                    <input type="file"
                                           class="form-control @error('logo') is-invalid @enderror"
                                           id="logo"
                                           name="logo"
                                           accept="image/*">
                                </div>
                                <small class="text-muted">Format recommandé: PNG, JPG (max 2MB)</small>
                                @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <a href="{{ route('clubs.index') }}" class="btn btn-light btn-lg rounded-pill px-5">
                                    Annuler
                                </a>
                                <button type="submit" class="btn btn_modifier btn-lg rounded-pill px-5">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3490dc;
            box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }

        .btn_modifier{
            background-color: transparent;
            border: 1px solid #118800;
            color: #118800;
        }
        .btn_modifier:hover{
            background-color: #118800;
            color: #ffffff;
        }
        .card {
            border-radius: 1rem;
            overflow: hidden;
        }

        .badge {
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .btn, .card {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        /* Preview image style */
        .img-thumbnail {
            border-radius: 0.5rem;
            border: 2px solid #e2e8f0;
        }
    </style>
@endsection
