<div class="card overflow-hidden">

    @include("user.login.index.card.header")

    @if(!$loginIsBlocked)
        @include("user.login.index.card.body")
    @else
        @include("user.login.index.card.blocked")
    @endif

</div>
