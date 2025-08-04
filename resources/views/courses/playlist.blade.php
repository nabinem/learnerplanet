@extends('layouts.extra')

@section('content')
<div class="container py-5" ;">
    <!-- Form Section Full Width -->
    <div class="card shadow-sm mb-5" , style="background-color: #B0E0E6">
        <div class="card-header text-white text-center" , style="background-color: #1E90FF;">
            <h4>Create Modules | Playlists | Lessons</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('playlist.store', $course->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Module title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Brief description" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Order (Your Playlist Order)</label>
                    <input type="number" name="order" value="{{ $nextOrder }}" class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-lg btn-primary" data-loading-text="Saving..">
                    <i class="bi bi-floppy"></i>
                    Save
                </button>

            </form>
        </div>
    </div>

</div>

<!-- Playlist Display Section Full Width -->
<div class="container rounded-1 py-3" style="background-color: #B0E0E6;">
    <div class="text-center mb-4">
        <h3 class="text-black fw-bold">Your Playlists</h3>
    </div>

    @if($course->playlist->count())
        <div class="container d-flex flex-column gap-4">
            @foreach($course->playlist as $list)
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $list->order }}. {{ $list->title }}</h5>
                        <p class="card-text text-muted">{{ $list->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container text-center mt-4">
            <div class="alert alert-info">No playlists created yet. Start by adding your first one above.</div>
        </div>
    @endif
</div>



@endsection