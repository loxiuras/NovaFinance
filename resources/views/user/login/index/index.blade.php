@extends('layouts/app')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">

                    @include("user.login.index.card.index")

                    @include("user.login.copyright")

                </div>
            </div>
        </div>
    </div>
@endsection
