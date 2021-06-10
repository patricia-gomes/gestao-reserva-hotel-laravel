@extends('layouts.admin')

@section('title', 'Cadastrar Tipos de Acomodação')

@section('content')

	<div class="col-10">
		<h1>Cadastrar Tipos de Acomodação</h1>
	</div>

	<div class="col-6">

		@if($errors->any())	
			<div class="mt-3 mb-3 p-2 alert-danger">
				@foreach($errors->all() as $error)
					{{ $error }}<br/>
				@endforeach	
			</div>
		@endif
		<form method="POST"  action="{{ url('/admin/register_types') }}">
			@csrf

			<div class="form-group">
			    <label>Nome:</label><br/>
			    <input type="text" name="name" placeholder="Ex: Quarto casal" required><br/><br/>
			</div>
			  
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

@endsection