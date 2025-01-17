<x-layout title="Sign In">

    <form method="POST" action="/login" class="form p-4 shadow-lg rounded">
        @csrf
        <div class="text-center mb-4">
            <h1>Sign In</h1>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required />
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 text-end">
            <a href="#" class="forgot-password text-decoration-none">Forgot your password?</a>
        </div>
        <div class="mb-3">
            <button type="submit" class="formbutton">Sign In</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <p>Don't have an account? <a href="/signup" class="text-decoration-none">Sign up here</a>.</p>
    </div>

</x-layout>
