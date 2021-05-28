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
		<form method="POST" action="{{ url('/admin/register_guests') }}">
			@csrf

		  <div class="form-group">
		    <label>Nome:</label><br/>
		      <input type="text" name="name" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>CPF:</label><br/>
		      <input type="text" name="cpf" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Celular:</label><br/>
		      <input type="text" name="cell" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Quant de acompanhates:</label><br/>
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
		    <label>ID da acomodação:</label><br/>
		      <input type="number" name="id_reservation" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Data de entrada:</label><br/>
		      <input type="date" name="date_entry" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Data de saída:</label><br/>
		      <input type="date" name="date_exit" required><br/><br/>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

@endsection