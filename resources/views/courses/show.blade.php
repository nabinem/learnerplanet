<!-- @extends('layouts.app') 

@section('content')
<div class="container mt-4">
    <h1>{{ $course->title }}</h1>

    <p><strong>Category:</strong> {{ $course->category->name ?? 'Uncategorized' }}</p>

    <p><strong>Description:</strong></p>
    <p>{{ Str::limit($course->description, 200) }}</p> {{-- short description, 200 chars --}}

    {{-- Optional: Full description --}}
    {{-- <p>{{ $course->description }}</p> --}}
</div>
@endsection -->
