@extends('documents.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h4 class="mb-0">Modifier le document</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('documents.update', $document->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $document->title) }}" required>
                        </div>

                        <!-- Number Input (Auto-generated) -->
                        <div class="mb-3">
                            <label for="number" class="form-label">N°</label>
                            <input type="text" class="form-control" name="number" id="number" value="{{ old('number', $document->number) }}" readonly>
                        </div>

                        <!-- Amount Input -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">DH درهم</label>
                            <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount', $document->amount) }}" required>
                        </div>

                        <!-- Received From Input -->
                        <div class="mb-3">
                            <label for="received_from" class="form-label">Reçu de M - توصيل من السيد</label>
                            <input type="text" class="form-control" name="received_from" id="received_from" value="{{ old('received_from', $document->received_from) }}" required>
                        </div>

                        <!-- Sum Input -->
                        <div class="mb-3">
                            <label for="sum" class="form-label">La somme بما قدره</label>
                            <input type="text" class="form-control" name="sum" id="sum" value="{{ old('sum', $document->sum) }}" required>
                        </div>

                        <!-- Purpose Input -->
                        <div class="mb-3">
                            <label for="purpose" class="form-label">Pour - وذلك</label>
                            <input type="text" class="form-control" name="purpose" id="purpose" value="{{ old('purpose', $document->purpose) }}" required>
                        </div>

                        <!-- Location and Date Inputs -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">B ب</label>
                                <input type="text" class="form-control" name="location" id="location" value="{{ old('location', $document->location) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Le في</label>
                                <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $document->date) }}" required>
                            </div>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('documents.index') }}" class="btn btn-secondary me-2">Annuler</a>
                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
