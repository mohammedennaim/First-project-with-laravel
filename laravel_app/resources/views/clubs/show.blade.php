@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $club->name }}</h2>
                    @if(auth()->user()->is_admin)
                        <div>
                            <a href="{{ route('clubs.edit', $club) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('clubs.destroy', $club) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir archiver ce club ?')">
                                    Archiver
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    @if($club->logo)
                        <div class="text-center mb-4">
                            <img src="{{ Storage::url($club->logo) }}" alt="{{ $club->name }}" 
                                 class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    @endif

                    <div class="mb-4">
                        <h4>Description</h4>
                        <p>{{ $club->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Catégorie</h4>
                        <div class="badge bg-info">{{ $club->category }}</div>
                    </div>

                    <div class="border-top pt-3">
                        <small class="text-muted">
                            Créé le {{ $club->created_at->format('d/m/Y') }}
                            @if($club->updated_at != $club->created_at)
                                | Dernière modification le {{ $club->updated_at->format('d/m/Y') }}
                            @endif
                        </small>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection