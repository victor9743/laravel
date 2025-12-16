@extends("layouts.main_layout")

    @section("content")
        <form method="POST" action="/login" novalidate>
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="email"
                name="username" 
                class="form-control" id="username" 
                aria-describedby="emailHelp"
                value="{{ old('username') }}"
                required
                >
                @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" 
                name="password" 
                class="form-control" 
                id="exampleInputPassword1"
                value="{{ old('password') }}"
                required
                >
                @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection