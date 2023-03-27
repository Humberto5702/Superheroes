
<h1> {{ $modo }} superheroe </h1>

<div class="form-group">
<label for="NombreReal">  Nombre Real  </label>
<input type="text" class="form-control" name="NombreReal" value="{{ isset($superheroe->NombreReal)?$superheroe->NombreReal:'' }}" id="NombreReal" >
<br>
</div>

<div class="form-group">
<label for="NombreClaveSuperheroe">  Nombre Clave del Superheroe  </label>
<input type="text" class="form-control" name="NombreClaveSuperheroe" value="{{ isset($superheroe->NombreClaveSuperheroe)?$superheroe->NombreClaveSuperheroe:'' }}" id="NombreClaveSuperheroe" >
<br>
</div>

<div class="form-group">
<label for="InformacionAdicional">  Informacion Adicional  </label>
<input type="text" class="form-control" name="InformacionAdicional" value="{{ isset($superheroe->InformacionAdicional)?$superheroe->InformacionAdicional:'' }}" id="InformacionAdicional" >
<br>
</div>

<div class="form-group">

<label for="Foto">    </label>
@if(isset($superheroe->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$superheroe->Foto }}" width="100" alt="">
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto" >
<br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('superheroe/') }}"> Regresar </a>

<br>
