@extends('layouts.app') 
<style>
h1{
        text-align:center;
        padding:5px 5px 20px 5px;
       
    }
</style>

@section('content')

<h1>Películas dirigidas por el director {{$director->nombre." ".$director->apellido}}</h1>

@if(count($director->peliculas) >0) 

<div class="row row-cols-1 row-cols-md-3 g-4">

@foreach ($director->peliculas as $pelicula)
    
    <div class="col">
        <div class="card h-100">
        <img src="/storage/portadas/{{$pelicula->imagen_portada}}" class=" img-thumbnail" alt="imagen pelicula">
        <div class="card-body">
        <h5 class="card-title"><a href="/peliculas/{{$pelicula->id}}">{{$pelicula->titulo}}</a></h5>
            <p class="card-text">Director: {{$pelicula->director->nombre." ".$pelicula->director->apellido}}</p>
            <p class="card-text">Genero: {{$pelicula->genero->nombre_genero}}</p>
            <p class="card-text">Actores:</p>
            @foreach($pelicula->actores as $actores)
                <li><a href="../actores/{{$actores->id}}">{{$actores->nombre." ".$actores->apellido}}</a></li>
            @endforeach
            <br>
           <p class="card-text"><small class="text-muted">Año de estreno: {{$pelicula->anio}}</small></p>
        </div>
        </div>
    </div>
    @endforeach
@else
<h3>El director no tiene películas cargadas</h3>


@endif

@endsection