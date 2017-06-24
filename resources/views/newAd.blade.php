@extends('layouts.app')

@section('content')

<style>
.scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
.panel-heading{
    background-color: #F0F8FF !important; /* nadpisanie stylow css'a */
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tworzenie ogłoszenia </div>
                <div class="panel-body">
                   
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('newad')}}" enctype="multipart/form-data">
                       {{ csrf_field() }}
                    <!-- Nazwa ogłoszenia-->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label" for="textinput">Nazwa</label>  
                        <div class="col-md-6">
                            <input id="textinput" name="name" class="form-control input-md" type="text" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                </div>

                    <!-- Kategorie -->
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Kategoria</label>
                     
                            <div class="col-md-6">
                                <select class="form-control" name="category" required>
                                    <option selected="selected" disabled="disabled">Wybierz kategorię z listy poniżej</option>
                                    <option>Akcesoria</option>
                                    <option>Karoseria</option>
                                    <option>Wentylacja</option>
                                    <option>Oświetlenie</option>
                                    <option>Silnik</option>
                                    <option>Układ elektryczny</option>
                                    <option>Układ hamulcowy</option>
                                    <option>Układ kierowniczy</option>
                                    <option>Układ napędowy</option>
                                    <option>Układ paliwowy</option>
                                    <option>Układ wydechowy</option>
                                    <option>Zawieszenie</option>
                                    <option>Pozostałe części</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="textinput">Cena</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="price" class="form-control input-md" type="text" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact_nr') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="textinput">Telefon kontaktowy</label>  
                            <div class="col-md-4">
                                <input id="textinput" name="contact_nr" class="form-control input-md" type="text" required autofocus>
                                @if ($errors->has('contact_nr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_nr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Dodawanie zdjęć --> 
                        <div class="form-group{{ $errors->has('input-file1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="filebutton">Dodaj 1 zdjęcie</label>
                            <div class="col-md-4">
                                <input name="input-file1" class="input-file" type="file" required autofocus>
                                @if ($errors->has('input-file1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('input-file1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('input-file2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="filebutton">Dodaj 2 zdjęcie</label>
                            <div class="col-md-4">
                                <input name="input-file2" class="input-file" type="file" required autofocus>
                                @if ($errors->has('input-file2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('input-file2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('input-file3') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="filebutton">Dodaj 3 zdjęcie</label>
                            <div class="col-md-4">
                                <input name="input-file3" class="input-file" type="file" required autofocus>
                                @if ($errors->has('input-file3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('input-file3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <!-- Opis ogłoszenia -->
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="textarea">Opis ogłoszenia</label>
                            <div class="col-md-6">                     
                                <textarea class="form-control" id="textarea" name="description" rows="5" cols="40" required autofocus>Dodaj opis</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                            <!-- Zatwierdzanie ogłoszenia -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Utwórz ogłoszenie
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