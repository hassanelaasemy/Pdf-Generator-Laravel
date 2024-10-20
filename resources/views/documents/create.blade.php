@extends('documents.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Reçu - توصيل</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('documents.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <!-- Number Input (Auto-generated) -->
                                <div class="col-md-6">
                                    <label for="number" class="form-label">N°</label>
                                    <input type="text" class="form-control" name="number" id="number" value="{{ old('number', 'Auto-generated') }}" readonly>
                                </div>
                                <!-- Title Input -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Saisir le titre" value="{{ old('title') }}" required>
                                </div>
                            </div>

                            <!-- Amount and Other Inputs -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="amount" class="form-label">DH درهم</label>
                                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Saisir le montant " required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="received_from" class="form-label">Reçu de M - توصيل من السيد</label>
                                <input type="text" class="form-control" name="received_from" id="received_from" placeholder="Nom de la personne" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="sum" class="form-label">La somme بما قدره</label>
                                <input type="text" class="form-control" name="sum" id="sum" placeholder="Montant en toutes lettres" required>
                            </div>

                            <div class="mb-3">
                                <label for="purpose" class="form-label">Pour - وذلك</label>
                                <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Raison ou objet" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Ou ب</label>
                                    <input type="text" class="form-control" name="location" id="location" placeholder="Lieu" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Le في</label>
                                    <input type="date" class="form-control" name="date" id="date" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Enregistrer le document</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
