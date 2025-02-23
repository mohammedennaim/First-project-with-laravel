
        <!-- show.blade.php -->
        @extends('layouts.app')

        @section('content')
            <div class="container py-4">
                <!-- En-tête -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="h2 fw-bold mb-1">{{ $club->name }}</h1>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-calendar me-2"></i>
                                    Créé le {{ $club->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('clubs.index') }}" class="btn btn-outline-secondary rounded-pill">
                                    <i class="fas fa-arrow-left me-2"></i>Retour
                                </a>
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('clubs.edit', $club) }}" class="btn btn_modifier rounded-pill">
                                        <i class="fas fa-edit me-2"></i>Modifier
                                    </a>
                                    <form action="{{ route('clubs.destroy', $club) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill">
                                            <i class="fas fa-trash me-2"></i>Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                </div>

                <!-- Contenu -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body text-center p-4">
                                @if($club->logo)
                                    <img src="{{ Storage::url($club->logo) }}"
                                         alt="{{ $club->name }}"
                                         class="img-fluid rounded mb-3"
                                         style="max-height: 200px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="height: 200px;">
                                        <i class="fas fa-users fa-4x text-muted opacity-50"></i>
                                    </div>
                                @endif
                                <span class="badge bg-primary rounded-pill d-inline-block mb-2">
                        @switch($club->category)
                                        @case('Tech')
                                            <i class="fas fa-laptop-code me-1"></i>
                                            @break
                                        @case('Design')
                                            <i class="fas fa-paint-brush me-1"></i>
                                            @break
                                        @case('Gaming')
                                            <i class="fas fa-gamepad me-1"></i>
                                            @break
                                        @case('Robotique')
                                            <i class="fas fa-robot me-1"></i>
                                            @break
                                    @endswitch
                                    {{ $club->category }}
                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h3 class="card-title h4 mb-4">À propos du club</h3>
                                <p class="card-text">{{ $club->description }}</p>

                                <div class="border-top pt-4 mt-4">
                                    <small class="text-muted">
                                        Dernière modification le {{ $club->updated_at->format('d/m/Y à H:i') }}
                                    </small>
                                </div>
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

                .btn_modifier{
                    background-color: transparent;
                    border: 1px solid #118800;
                    color: #118800;
                }

                .btn_modifier:hover{
                    background-color: #118800;
                    color: #ffffff;
                }

                .card:hover {
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
                }
            </style>
        @endsection
