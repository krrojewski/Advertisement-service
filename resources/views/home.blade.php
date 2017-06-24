@extends('layouts.app')

@section('content')

<style>
    .panel-heading{
        text-align: center;
        font-size: 40px;
        font-style: italic;
        font-weight: bold;
    }    
    .panel-body{
        text-align: center;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
    .jumbotron{
    background-color: #F0F8FF; /* Light grey */
    color: #808080;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            
            @if (Auth::guest())
            <div class="alert alert-dismissable alert-danger">
                <h4>
                    <strong>Uwaga!</strong>
                </h4>  
                    Twoje funkcje są ograniczone dopóki nie zarejestrujesz konta użytkownika. 
                    <a href="/register" class="alert-link">ZAREJESTRUJ TERAZ!</a>
            </div>
            @else
            <div class="alert alert-dismissable alert-success">
                <h4>
                    <strong>Witaj!</strong>
                </h4>  
                <p>Dziękujemy za rejestrację w serwisie. Od teraz masz dostęp do wszystkich funkcji.
                   Nie zapomnij skorzystać z geolokalizacji. W tym celu zezwól na jej pobranie po zalogowaniu
                   udostępnieniając swoje położenie.<br>
                   Miłego dnia.
                </p>
            </div>
            @endif
            
            <div class="jumbotron">
                <div class="panel-heading">Serwis ogłoszeń części samochodowych</div>

                <div class="button">
                    <a href="/ads" class="btn btn-primary btn-lg btn-block">Wyświetl ogłoszenia</a>
                </div>
                
                <div class="panel-body">
                <br/>
                    <p>Witamy w serwisie darmowych ogłoszeń części samochodowych! Szybko znajdziesz tu ciekawe ogłoszenia i łatwo skontaktujesz się z ogłoszeniodawcą.<br/>
                    Jeśli chcesz coś sprzedać - dodaj swoje ogłoszenie już teraz! Zarejestruj się i korzystaj ze wszystkich funkcji serwisu.<br/>
                    Szukasz jakiegoś produktu? Tutaj znajdziesz go w najniższej cenie! Zapraszamy do zakupów.<br/>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12">
    <div>
        <h4 class="text-left text-muted">
            NAJNOWSZE OGŁOSZENIA
        </h4>
    </div>
    </div>    
        @if (isset($row_num) && $row_num > 0)
        
        <div class="row">    
        @foreach ($ads as $ad)
	<div class="col-sm-2 col-xs-12">
            <div class="thumbnail">
                <a href="#"><img alt="Photo" src="http://localhost/Serwis/storage/app/{{$ad->photo1}}"></a>
                    
                <div class="caption">
                        <a href="{{ route('ad', ['id'=>$ad->id]) }}"><h4>
                               {{ $ad->name }}
                            </h4></a>
			<p>
				Cena: {{ $ad->price }} 
			</p>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        @endif
        
    </div>
</div>
@endsection
