@extends('documents.layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary fw-bold">Documents</h1>
        <a href="{{ route('documents.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Nouveau document
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($documents->isEmpty())
        <div class="alert alert-info shadow-sm">
            <i class="fas fa-info-circle me-2"></i>Aucun document trouvé. 
            <a href="{{ route('documents.create') }}" class="alert-link">Créer un nouveau document</a>.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($documents as $document)
                <div class="col">
                    <div class="card h-100 shadow-sm hover-shadow transition">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary mb-3">{{ $document->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($document->content, 100, '...') }}</p>
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $document->created_at->format('d/m/Y') }}
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('documents.show', $document->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>Voir
                                </a>
                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit me-1"></i>Modifier
                                </a>
                                <a href="{{ route('documents.download', $document->id) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-download me-1"></i>PDF
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm delete-document" data-id="{{ $document->id }}">
                                    <i class="fas fa-trash-alt me-1"></i>Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        @if(method_exists($documents, 'links'))
            {{ $documents->links() }}
        @endif
    </div>
</div>

@push('styles')
<style>
    .hover-shadow {
        transition: box-shadow 0.3s ease-in-out;
    }
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .transition {
        transition: all 0.3s ease-in-out;
    }
</style>
@endpush

@push('scripts')
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-document');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const documentId = this.getAttribute('data-id');
            if (confirm('Êtes-vous sûr de vouloir supprimer ce document ?')) {
                fetch(`/documents/${documentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the document card from the DOM
                        this.closest('.col').remove();
                        // Show success message
                        alert(data.message);
                    } else {
                        alert('Une erreur est survenue lors de la suppression du document.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Une erreur est survenue lors de la suppression du document.');
                });
            }
        });
    });
});
</script>
@endpush
@endsection