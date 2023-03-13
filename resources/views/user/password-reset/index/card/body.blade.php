<!-- TODO: Add translation text; -->

<div class="card-body pt-4">
    <div class="p-2">
        <form class="form-horizontal" method="POST" action="{{ route('password-reset.store') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">E-mailaddress</label>
                <input type="text" required name="email" class="form-control @error('email') border-danger @enderror" id="username" placeholder="Enter e-mailaddress">

                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3 d-grid">
                <button class="btn btn-primary waves-effect waves-light" type="submit">Request password reset</button>
            </div>

            @if (session('message'))
                <p class="text-success text-sm mt-3 mb-3">
                    {{ session('message') }}
                </p>
            @endif

            <div class="mt-4 text-center">
                <!-- TODO: Setup redirect routes; -->
                <a href="{{ route('login.index') }}" class="text-muted"><i class="mdi mdi-arrow-left me-1"></i> Back to login?</a>
            </div>
        </form>
    </div>
</div>
