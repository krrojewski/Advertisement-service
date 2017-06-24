@extends('layouts.app')

@section('content')

<!-- BODY -->

<style>
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
    width: 100%;
    position:relative;
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

.content {
    position: static;
    top: 0;
    left: 20%;
    display: block;
    max-height: 76%;
    padding: 1.5% 2% 2% 2%;
}

.content h3.name {
    margin-bottom: 3px;
    margin-top: 0;
    color: black;
    text-align: center;
    font-weight: bold;
}

.content h5.category {
    margin-bottom: 3px;
    margin-top: 0;
    color: black;
    text-align: left;
    
}
.content h5.date{
    color: black;
    text-align: right;
    
}
.slide-footer {
    position: relative;
    padding: 1%;
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

.info h1.price{
    text-align: left;
}
.info h3.contact-info{
    text-align: left;
}
.info h3.mail{
    text-align: left;
}
.info h3.phone{
    text-align: left;
}
.info h3.phone{
    text-align: left;
}
.info-location h5.distance{
    text-align: left;
    color: #00BFFF;
}
.info-location h5.duration{
    text-align: left;
    color: #6495ED;
}
.info-location p.description{
    color: #000000;
    font-size: 21px;
}
.carousel-inner {
    max-height: 320px !important;
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
}

</style>

<div class="container">
    <!-- Początek rows -->
	<div class="row">
		<div class="col-sm-6 col-sm-offset-2 col-xs-12">
			<div class="carousel slide slide-carousel" id="carousel-{{$ad->id}}">
                            <!-- Wskazniki -->
                                <ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-{{$ad->id}}" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-{{$ad->id}}">
					</li>
					<li data-slide-to="2" data-target="#carousel-{{$ad->id}}">
					</li>
				</ol>
                                    <!-- Zdjęcia -->
				<div class="carousel-inner">
					<div class="item active">
						<img alt="Photo1" src="http://localhost/Serwis/storage/app/{{$ad->photo1}}" />
					</div>
					<div class="item">
						<img alt="Photo2" src="http://localhost/Serwis/storage/app/{{$ad->photo2}}" />
					</div>
					<div class="item">
						<img alt="Photo3" src="http://localhost/Serwis/storage/app/{{$ad->photo3}}" />
					</div>
				</div> <a class="left carousel-control" href="#carousel-{{$ad->id}}" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span></a>
                                    <a class="right carousel-control" href="#carousel-{{$ad->id}}" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
                    
                    <div class="slide-footer">
                        <span class="pull-left buttons">
                            <a href="/ads"><button class="btn btn-sm btn-default">Wróć do ogłoszeń</button></a>
                        </span>
                    </div>
		</div>
            
            <div class="info">
                <div class="col-sm-2 col-xs-2">
                    <h1 class="price"><span class="label label-default">{{ $ad -> price}} zł</span></h1>
                    <h3 class="contact-info">Kontakt</h3>
                
                    <a href="mailto: {{ $ad->user->email }}?subject=Pytanie%20dotyczące%20ogłoszenia">
                        <h3 class="email">
                            <span class="label label-info"><span class="glyphicon glyphicon-envelope"></span>
                                {{ $ad->user->email }}
                            </span></h3></a>
                
                    <h3 class="phone"><span class="label label-info"><span class="glyphicon glyphicon-phone"></span> {{ $ad -> contact_nr}}</span></h3>
                    <h4 class="name">{{ $ad->user->name }}</h4>
                    <h4 class="surname">{{ $ad->user->surname }}</h4>
                </div>
            </div>
        </div>
    
            <!-- Info -->
        <div class="row">
            <div class="info-location">
            <div class="col-sm-6 col-sm-offset-2 col-xs-12">
                <div class="content">
            
                    <h3 class="name">{{ $ad -> name }}</h3>
                    
                        <div style="clear: both">
                            <h5 class="category" style="float: left"> Kategoria: {{ $ad->category }}</h5>
                            <h5 class="date" style="float: right"> Data dodania: {{ $ad->created_at }}</h5>
                        </div> <hr />
                <!-- Opis -->
                    <p class="description">
                        {{ $ad -> description }}
                    </p>   
                </div>
            </div>
            
            <div class="col-sm-2 col-xs-2">
               <!-- Wyświetlanie lokalizacji produktu na mapie -->
                
               <h5 class="distance">Odległość: <span id="distance"></span></h5>
               <h5 class="duration">Czas trasy: <span id="duration"></span></h5>

               <div id="mapholder"></div>
            </div>
        </div>
        </div>
</div>

<script src="/js/map-position.js"></script>
<script>
showMapPosition({{ $ad->latitude}}, {{ $ad->longitude }}); //wywołanie funkcji, pokazuje pozycje na mapie
distance({{$latitude}}, {{$longitude}}, {{ $ad->latitude}}, {{ $ad->longitude }}); //wywolanie funkcji, dystans
</script>
<!-- BODY -->
@endsection