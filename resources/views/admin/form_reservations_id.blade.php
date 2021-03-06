@extends('layouts.admin')

@section('title', 'Cadastrar reserva')

@section('content')

<div class="col-10">
		<h1>Cadastrar Reserva</h1>
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
		<form method="POST"  action="{{ url('/admin/register_reservations') }} ">
			@csrf
		  <div class="form-group">
		    <label>Nome:</label><br/>
		      <input type="text" name="name" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Celular:</label><br/>
		      <input type="text" name="cell" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Data de entrada:</label><br/>
		      <input type="date" name="start" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Data de saída:</label><br/>
		      <input type="date" name="end" required><br/><br/>
		  </div>
		  <input type="hidden" name="reservation_number" value="{{ $id_accomomdation }}">

		  <button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

@endsection