<x-layout title="Signup">
    <form method="POST" action="/signup" class="form">
        @csrf
        <div>
            <h1 style="text-align: center;">Sign Up</h1>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="formbutton">Sign Up</button>
    </form>
    <div class="register-link">
        <p>Already have an account? <a href="/login">login here</a>.</p>
    </div>

</x-layout>