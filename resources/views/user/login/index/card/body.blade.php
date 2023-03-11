<!-- TODO: Add translation text; -->

<div class="card-body pt-4">
    <div class="p-2">

        <form class="form-horizontal" method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" required name="username" class="form-control @error('username') border-danger @enderror"id="username" placeholder="Enter username">

                @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group auth-pass-inputgroup">
                    <input type="password" required name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-check">
                <label class="form-check-label" for="remember-check">
                    Remember me
                </label>
            </div>

            <div class="mt-3 d-grid">
                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
            </div>

            @error('credentials')
                <p class="text-danger text-sm mt-3 mb-3">
                    {{ $message }}
                </p>
            @enderror

            <div class="mt-4 text-center">
                <!-- TODO: Setup redirect routes; -->
                <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
            </div>
        </form>

    </div>
</div>
