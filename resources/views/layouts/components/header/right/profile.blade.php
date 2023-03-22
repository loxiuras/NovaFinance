<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{ auth()->user()->getAvatarUrl() }}" alt="Header Avatar">
        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->fullName() }}</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>

    <div class="dropdown-menu dropdown-menu-end" id="page-header-user-dropdown-container" style="">
        <!-- item-->
        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
        <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
        <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
        <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
        <div class="dropdown-divider"></div>

        <form action="{{ route('logout.store') }}" method="POST">
            @csrf

            <button type="submit" class="dropdown-item text-danger">
                <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span>
            </button>
        </form>
    </div>
</div>
