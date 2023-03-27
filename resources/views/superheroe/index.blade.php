@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('superheroe/create') }}" class="btn btn-success" > Registrar nuevo superheroe </a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre Real</th>
            <th>Nombre Clave del Superheroe</th>
            <th>Informacion Adicional</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $superheroes as $superheroe )
        <tr>
            <td>{{ $superheroe->id }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$superheroe->Foto }}" width="100" alt="">
            </td>


            <td>{{ $superheroe->NombreReal }}</td>
            <td>{{ $superheroe->NombreClaveSuperheroe }}</td>
            <td>{{ $superheroe->InformacionAdicional }}</td>
            <td>
            
            <a href="{{ url('/superheroe/'.$superheroe->id.'/edit') }}" class="btn btn-warning" >
                    Editar
            </a>
             | 

            <form action="{{ url('/superheroe/'.$superheroe->id ) }}" class="d-inline" method="post">
            @csrf 
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" 
            value="Borrar">

            </form>


                 </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection