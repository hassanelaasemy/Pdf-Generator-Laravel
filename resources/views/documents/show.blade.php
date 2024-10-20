@extends('documents.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded">
                    <!-- Card Header for Title -->
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">{{ $document->title }}</h4>
                    </div>

                    <!-- Card Body for Content -->
                    <div class="card-body">
                        <!-- Content Section -->
                        <div class="mb-4">
                            <h5 class="font-weight-bold">Content</h5>
                            <p class="text-muted">{{ $document->content }}</p>
                        </div>

                        <!-- Document Details -->
                        <div class="mb-4">
                            <h5 class="font-weight-bold">Document Details</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>N°:</strong> {{ $document->number }}
                                </li>
                                <li class="mb-2">
                                    <strong>Amount:</strong> {{ number_format($document->amount, 2) }} DH
                                </li>
                                <li class="mb-2">
                                    <strong>Received from:</strong> {{ $document->received_from }}
                                </li>
                                <li class="mb-2">
                                    <strong>Purpose:</strong> {{ $document->purpose }}
                                </li>
                                <li class="mb-2">
                                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($document->date)->format('d M Y') }}
                                </li>
                                <li class="mb-2">
                                    <strong>Location:</strong> {{ $document->location }}
                                </li>
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('documents.index') }}" class="btn btn-secondary">Back to Documents List</a>
                            <div>
                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning">Edit Documenxt</a>
                                <a href="{{ route('documents.download', $document->id) }}" class="btn btn-secondary">Download PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
