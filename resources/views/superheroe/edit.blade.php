@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/superheroe/'.$superheroe->id) }}" method="post" enctype="multipart/form-data" >
@csrf 
{{ method_field('PATCH') }}

@include('superheroe.form',['modo'=>'Editar']);

</form>
</div>
@endsection