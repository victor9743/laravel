@extends("layouts.main_layout")

    @section("content")
        <form method="POST" action="/save" novalidate>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                name="title" 
                class="form-control" id="title" 
                aria-describedby="etitleHelp"
                value="{{ old('title') }}"
                required
                >
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea name="text" id="" cols="30" rows="10" required class="form-control">{{ old('text') }}</textarea>
                @error('text')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="{{ route('home')}}">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if(session('loginError'))
            <div class="alert alert-danger text-center">
                {{ session('loginError') }}
            </div>
        @endif
    @endsection