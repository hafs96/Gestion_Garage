@extends('Admin.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter un client</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('AjouterClt') }}">
                        @csrf
                        <div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }}">
                            <label for="Nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="Nom" type="text" class="form-control" name="Nom"
                                    value="{{ old('Nom') }}" required autofocus>

                                @if ($errors->has('Nom'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('Nom') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Prenom') ? ' has-error' : '' }}">
                            <label for="Prenom" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="Prenom" type="text" class="form-control" name="Prenom"
                                    value="{{ old('Prenom') }}" required>

                                @if ($errors->has('Prenom'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('Prenom') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username"
                                    value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('NumeroTelephone') ? ' has-error' : '' }}">
                            <label for="NumeroTelephone" class="col-md-4 control-label">Numero Telephone</label>

                            <div class="col-md-6">
                                <input id="NumeroTelephone" type="text" class="form-control" name="NumeroTelephone"
                                    value="{{ old('NumeroTelephone') }}" required>

                                @if ($errors->has('NumeroTelephone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NumeroTelephone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection














@endsection
