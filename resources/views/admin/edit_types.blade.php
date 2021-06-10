
@extends('layouts.admin')

@section('title', 'Editar Tipo de Acomodação')

@section('content')

<div class="col-10">
		<h1>Editar Tipo de Acomodação</h1>
	</div>

	<div class="col-6">

		@if(session('warning'))	
			<div class="mt-3 mb-3 p-2 alert-danger">
				{{ session('warning') }}<br/>
			</div>
		@endif

		@if($errors->any())	
			<div class="mt-3 mb-3 p-2 alert-danger">	
				@foreach($errors->all() as $error)
					{{ $error }}<br/>
				@endforeach	
			</div>
		@endif

		@if(!empty($type))
			<form method="POST"  action="{{ route('admin.edit_type', ['id'=>$type->id]) }}">
				@method('PUT')
				@csrf
			  	<div class="form-group">
			    	<label>Nome:</label><br/>
			      	<input type="text" name="name" value="{{ $type->type }}" required><br/><br/>
			  	</div>

			  <button type="submit" class="btn btn-primary">Salvar</button>
			</form>
		@endif
	</div>

@endsection