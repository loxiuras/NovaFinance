<!-- TODO: Add translation text; -->

<div class="card-body pt-4">
    <div class="p-2">
        <form class="form-horizontal" method="POST" action="{{ route('password-reset.store', ['email' => $email, 'token' => $token]) }}">
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" required name="password" class="form-control @error('password') border-danger @enderror" id="password" placeholder="Enter password">

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" required name="password_confirmation" class="form-control @error('password_confirmation') border-danger @enderror" id="password_confirmation" placeholder="Enter password confirmation">

                @error('password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3 d-grid">
                <button class="btn btn-primary waves-effect waves-light" type="submit">Reset password</button>
            </div>

            <div class="mt-4 text-center">
                <!-- TODO: Setup redirect routes; -->
                <a href="{{ route('login.index') }}" class="text-muted"><i class="mdi mdi-arrow-left me-1"></i> Back to login?</a>
            </div>
        </form>
    </div>
</div>
