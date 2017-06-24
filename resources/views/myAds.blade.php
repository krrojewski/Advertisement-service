@extends('layouts.app')

@section('content')
<style>
h4 {
    color:blue;
}
h5{
    font-weight: bold;
    color: black;
}


/*REQUIRED*/
.carousel-row {
    margin-bottom: 10px;
}

.slide-row {
    padding: 0;
    background-color: #ffffff;
    min-height: 150px;
    border: 1px solid #e7e7e7;
    overflow: hidden;
    height: auto;
    position: relative;
}


.slide-carousel {
    width: 20%;
    float: left;
    display: inline-block;
}

.slide-carousel .carousel-indicators {
    margin-bottom: 0;
    bottom: 0;
    background: rgba(0, 0, 0, .5);
}

.slide-carousel .carousel-indicators li {
    border-radius: 0;
    width: 20px;
    height: 6px;
}

.slide-carousel .carousel-indicators .active {
    margin: 1px;
}

.slide-content {
    position: absolute;
    top: 0;
    left: 20%;
    display: block;
    float: left;
    width: 80%;
    max-height: 76%;
    padding: 1.5% 2% 2% 2%;
    overflow-y: auto;
}

.slide-content h4.name {
    margin-bottom: 3px;
    margin-top: 0;
    float: left;
}

.slide-content h2.price {
    margin-bottom: 3px;
    margin-top: 0;
    text-align: right;
    float: right;
}
.slide-content h5.date{
    color: black;
    text-align: left;
    float: left;
    
}
.slide-footer {
    position: absolute;
    bottom: 0;
    left: 20%;
    width: 78%;
    height: 20%;
    margin: 1%;
}

/* Scrollbars */
.slide-content::-webkit-scrollbar {
  width: 5px;
}
 
.slide-content::-webkit-scrollbar-thumb:vertical {
  margin: 5px;
  background-color: #999;
  -webkit-border-radius: 5px;
}
.panel-heading{
        background-color: #F0F8FF !important; /* nadpisanie stylow css'a */
    }
</style>
<div class="container">
    <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Moje ogłoszenia</div>
                <div class="panel-body">
<!-- Jeżeli są rekordy -->
@if ($row_num > 0)
    @foreach ($ads as $ad)

    <!-- Begin of rows -->
    <div class="row carousel-row">
        <div class="col-xs-12 slide-row">
            <div id="carousel-{{$ad->id}}" class="carousel slide slide-carousel" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-{{$ad->id}}" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-{{$ad->id}}" data-slide-to="1"></li>
                <li data-target="#carousel-{{$ad->id}}" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                    <img src="http://localhost/Serwis/storage/app/{{$ad->photo1}}" alt="Photo1">
                </div>
                <div class="item">
                    <img src="http://localhost/Serwis/storage/app/{{$ad->photo2}}" alt="Photo2">
                </div>
                <div class="item">
                    <img src="http://localhost/Serwis/storage/app/{{$ad->photo3}}" alt="Photo3">
                </div>
              </div>
            </div>
                <div class="slide-content">
                
                    <h4 class="name"><strong>{{ $ad -> name }}</strong></h4>  
                    <h2 class="price"><span class="label label-default">{{ $ad -> price}} zł</span></h2>
                    <hr style="clear:both;"/>
                    <h5 class="category"><strong>Kategoria: {{ $ad -> category }}</strong></h5> 
                    <p>
                        {{ $ad -> description}}
                        <h5 class="date">Data dodania: {{ $ad->created_at}}</h5>
                    </p>
                </div>
            
            @if (!Auth::guest())
            <div class="slide-footer">
                <span class="pull-right buttons">
                    <a href="{{ route('ad', ['id'=>$ad->id]) }}"><button class="btn btn-sm btn-default active"><i class="fa fa-fw fa-eye"></i>Przejdź do ogłoszenia</button></a>
                </span>
            </div>
            @else
            <div class="slide-footer">
                <span class="pull-right buttons">
                    <button class="btn btn-sm btn-default disabled"><i class="fa fa-fw fa-eye"></i>Przejdź do ogłoszenia</button>
                </span>
            </div>
            @endif
        </div>
    </div>

    @endforeach
@else
    <div class="col-xs-10 col-xs-offset-1">
        <div class="alert alert-dismissable alert-danger">
            <h4>
                <strong>Uwaga!</strong>
            </h4>  
                Brak ogłoszeń w serwisie.
        </div>
    </div>
@endif

                </div>
</div></div>
</div>

@endsection