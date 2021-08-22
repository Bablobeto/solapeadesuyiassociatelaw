@extends('layouts.app')
@section('title', 'Payment -')
@section('banner-content')
    <div class="profile-verification">

        @include('components.navbar')

        <div class="profile-verification__title">
            <h2 class="header-primary" style="font-size: 22px;">Ooops!
                500 Error
            </h2>
        </div>

        <div class="profile-completion__body">
            <center>
                <br />
                <br />
                <br />
                <h1 style="color: red;">Oh! Something went wrong
                    Kindly contact the Administrator
                </h1>
                <br />
                <br />
                <div class="profile-completion__button">
                    <a href="/" class="navigation__button">
                        Restart
                    </a>
                </div>
            </center>
        </div>

    </div>
@endsection
