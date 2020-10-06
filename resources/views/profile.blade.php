@extends('layouts.default')

@section('title') Profile @endsection

@section('content')
    <div class="row">

        <div class="col-md-3">
            <h3>Profile Information</h3>
            <p>Update your account's profile information and email address.</p>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form class="theme-form" method="POST" action="{{ route('profile.update_information') }}">
                        @csrf

                        @if(Session::has('message_profile'))
                            <span class="valid-feedback d-block mb-3" role="alert">
                                <strong>{{ Session::get('message_profile') }}</strong>
                            </span>
                        @endif

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="name">Name</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" />
                            </div>

                            @error('name')
                                <span class="invalid-feedback d-block ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="email">Email Address</label>

                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" />
                            </div>

                            @error('email')
                                <span class="invalid-feedback d-block ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary f-right" value="Save" />
                    </form>
                </div>

            </div>
        </div>

    </div>

    <hr class="mb-5" />

    <div class="row">

        <div class="col-md-3">
            <h3>Update Password</h3>
            <p>Ensure your account is using a long, random password to stay secure.</p>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form class="theme-form" method="POST" action="{{ route('profile.update_password') }}">
                        @csrf

                        @if(Session::has('message_password'))
                            <span class="valid-feedback d-block mb-3" role="alert">
                                <strong>{{ Session::get('message_password') }}</strong>
                            </span>
                        @endif

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="current_password">Current Password</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="current_password" name="current_password" required   autocomplete="current-password" />
                            </div>

                            @error('current_password')
                                <span class="invalid-feedback d-block ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="password">New Password</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" />
                            </div>

                            @error('password')
                                <span class="invalid-feedback d-block ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="password_confirmation">Confirm New Password</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary f-right" value="Save" />
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
