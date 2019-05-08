@extends('layouts.app')

@section('template_title')
Reset password
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ mix('/images/saxophone.png') }}" alt="Boy Playing Saxophone" class="img-responsive"/>                                            
        </div>
        <div class="col-md-5 col-md-offset-1 mainText">
            <h1><span>Reset Password</span></h1>
            <div class="well">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    <fieldset>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
