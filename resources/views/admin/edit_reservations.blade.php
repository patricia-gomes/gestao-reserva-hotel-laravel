@extends('layouts.admin')

@section('title', 'Editar reserva')

@section('content')

<div class="col-10">
		<h1>Editar Reserva</h1>
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

		@if(!empty($reservation))
			<form method="POST"  action="{{ route('admin.register_edit', ['id'=>$reservation->id]) }}">
				@method('PUT')
				@csrf
			  <div class="form-group">
			    <label>Nome:</label><br/>
			      <input type="text" name="name" value="{{ $reservation->name }}" required><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Celular:</label><br/>
			      <input type="text" name="cell" value="{{ $reservation->cell }}" required><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>ID da acomodação:</label><br/>
			      <input type="number" name="reservation_number" value="{{ $reservation->id_reservation }}" required  disabled><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Data de entrada:</label><br/>
			      <input type="date" name="start" value="{{ date('Y-m-d',strtotime($reservation->start)) }}" required  disabled><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Data de saída:</label><br/>
			      <input type="date" name="end" value="{{ date('Y-m-d',strtotime($reservation->end)) }}" required  disabled><br/><br/>
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Salvar</button>
			</form>
		@endif
	</div>

@endsection