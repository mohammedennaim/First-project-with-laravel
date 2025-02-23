<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- En-tête -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 fw-bold mb-1">
                            Nouveau Club
                        </h1>
                        <p class="text-muted mb-0">Créez un nouveau club</p>
                    </div>
                    <a href="{{ route('clubs.index') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i>Retour
                    </a>
                </div>
                <hr class="my-4">
            </div>
        </div>

        <!-- Formulaire -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Nom du club</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}" placeholder="Entrez le nom du club">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="5"
                                          placeholder="Décrivez votre club">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="category" class="form-label fw-bold">Catégorie</label>
                                <select class="form-select form-select-lg @error('category') is-invalid @enderror"
                                        id="category" name="category">
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option value="Tech" {{ old('category') == 'Tech' ? 'selected' : '' }}>
                                        <i class="fas fa-laptop-code"></i> Tech
                                    </option>
                                    <option value="Design" {{ old('category') == 'Design' ? 'selected' : '' }}>
                                        <i class="fas fa-paint-brush"></i> Design
                                    </option>
                                    <option value="Robotique" {{ old('category') == 'Robotique' ? 'selected' : '' }}>
                                        <i class="fas fa-robot"></i> Robotique
                                    </option>
                                    <option value="Gaming" {{ old('category') == 'Gaming' ? 'selected' : '' }}>
                                        <i class="fas fa-gamepad"></i> Gaming
                                    </option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="logo" class="form-label fw-bold">Logo du club</label>
                                <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fas fa-image text-muted"></i>
                                </span>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                           id="logo" name="logo" accept="image/*">
                                </div>
                                <small class="text-muted">Format recommandé: PNG, JPG (max 2MB)</small>
                                @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <a href="{{ route('clubs.index') }}" class="btn btn-light btn-lg rounded-pill px-5">Annuler</a>
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                                    Ajouter un club
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



            <style>
                /* Styles communs */
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

                .card {
                    border-radius: 1rem;
                    overflow: hidden;
                }

                .badge {
                    font-weight: 500;
                    padding: 0.5rem 1rem;
                }

                /* Animations */
                .btn, .card {
                    transition: all 0.3s ease;
                }

                .btn:hover {
                    transform: translateY(-2px);
                }

                .card:hover {
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
                }
            </style>
        @endsection
