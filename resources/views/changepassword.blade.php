@extends('layouts.app')

@section('content')

<style>
    .panel-heading{
        background-color: #F0F8FF !important; /* nadpisanie stylow css'a */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Zmiana hasła</div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="text-danger">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/updatepassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="mypassword" class="col-md-4 control-label">Stare hasło</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="mypassword" required>
                                <div class="text-danger">{{$errors->first('mypassword')}}</div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Nowe hasło</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>
                                <div class="text-danger">{{$errors->first('password')}}</div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="mypassword" class="col-md-4 control-label">Powtórz hasło</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Zmień
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