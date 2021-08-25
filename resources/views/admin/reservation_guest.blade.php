@extends('layouts.admin')

@section('title', 'Cadastrar hospédes')

@section('content')

<div class="col-10">
		<h1>Cadastrar Hospédes</h1>
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
		<form method="POST" action="{{ route('admin.register_reservation_guest', ['id'=>$reservation->id]) }}">
			@method('PUT')
			@csrf

			  <div class="form-group">
			    <label>Nome:</label><br/>
			      <input type="text" name="name" value="{{ $reservation->name }}" required><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>CPF:</label><br/>
			      <input type="text" name="cpf" required><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Celular:</label><br/>
			      <input type="text" name="cell" value="{{ $reservation->cell }}" required><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Quant de acompanhantes:</label><br/>
			      <input type="radio" name="number_companions" value="0" required>
			      <label for="0">Nenhum</label>   

			 	  <input type="radio" name="number_companions" value="1" required>
			      <label for="1">1 pessoa</label>
			    
			 	  <input type="radio" name="number_companions" value="2" required>
			      <label for="2">2 pessoas</label>
			    		    
			 	  <input type="radio" name="number_companions" value="3" required>
			      <label for="3">3 pessoas</label>
			   		
			 	  <input type="radio" name="number_companions" value="4" required>
			      <label for="4">4 pessoas</label>	    
			  </div>
			  <div class="form-group">
			    <label>Acomodação:</label><br/>
			    	<select name="id_reservation" >
			    		@if($accommodation)
			    			@foreach($accommodation as $items)
				    			<option value="{{ $reservation->reservation_number }}" selected required>{{ $items->type }} {{ $items->number }}</option>
				    		@endforeach
			    		@endif
			    	</select>
			  </div>
			  <div class="form-group">
			    <label>Data de entrada:</label><br/>
			      <input type="date" name="date_entry" value="{{ date('Y-m-d',strtotime($reservation->start)) }}" required><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Data de saída:</label><br/>
			      <input type="date" name="date_exit" value="{{ date('Y-m-d',strtotime($reservation->end)) }}" required><br/><br/>
			  </div>
		  <button type="submit" class="btn btn-primary">Hospedar</button>
		</form>
		@endif
	</div>

@endsection