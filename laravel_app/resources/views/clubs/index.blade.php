@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- En-tête de la page -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 fw-bold mb-1">
                            <i class="fas fa-users-rectangle text-primary me-2"></i>Liste des Clubs
                        </h1>
                        <p class="text-muted mb-0">Découvrez nos clubs et rejoignez la communauté</p>
                    </div>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('clubs.create') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                            Nouveau Club
                        </a>
                    @endif
                </div>
                <hr class="my-4">
            </div>
        </div>


        <!-- Liste des clubs -->
        <div class="row g-4">
            @foreach($clubs as $club)
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-shadow-md transition-all">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($club->logo)
                                    <img src="{{ Storage::url($club->logo) }}"
                                         class="img-fluid rounded-start h-100"
                                         style="object-fit: cover; min-height: 200px;"
                                         alt="{{ $club->name }}">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center h-100 rounded-start"
                                         style="min-height: 200px;">
                                        <i class="fas fa-users fa-3x text-muted opacity-50"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <div class="mb-3">
                                        <h5 class="card-title fw-bold mb-2">{{ $club->name }}</h5>
                                        <span class="badge bg-primary rounded-pill">
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
                                                @default
                                                    <i class="fas fa-tag me-1"></i>
                                            @endswitch
                                            {{ $club->category }}
                                </span>
                                    </div>

                                    <p class="card-text flex-grow-1">{{ Str::limit($club->description, 100) }}</p>

                                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                        <a href="{{ route('clubs.show', $club) }}"
                                           class="btn btn-outline-primary btn-sm rounded-pill">
                                            <i class="fas fa-eye me-1"></i> Détails
                                        </a>

                                        @if(auth()->user()->is_admin)
                                            <div class="btn-group">
                                                <a href="{{ route('clubs.edit', $club) }}"
                                                   class="btn btn-outline-warning btn-sm rounded-pill me-2">
                                                    <i class="fas fa-edit me-1"></i> Modifier
                                                </a>
                                                <form action="{{ route('clubs.destroy', $club) }}"
                                                      method="POST"
                                                      class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-outline-danger btn-sm rounded-pill">
                                                        <i class="fas fa-trash-alt me-1"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5">
            {{ $clubs->links() }}
        </div>
    </div>

    <style>
        .hover-shadow-md {
            transition: all 0.3s ease;
        }

        .hover-shadow-md:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
        }

        .badge {
            padding: 0.5em 1em;
        }

        .btn-outline-warning {
            color: #118800;
            border-color: #118800;
        }

        .btn-outline-warning:hover {
            color: #ffffff;
            background-color: #118800;
            border-color: #118800;
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        /* Style personnalisé pour la pagination */
        .pagination {
            justify-content: center;
            gap: 0.5rem;
        }

        .page-link {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            color: #6c757d;
        }

        .page-item.active .page-link {
            background-color: #3490dc;
            color: white;
        }

        /* Animation de suppression */
        .delete-form button {
            transition: all 0.2s ease;
        }

        .delete-form button:hover {
            transform: scale(1.1);
        }
    </style>
@endsection
