@extends('layouts.admin')

@section('title', 'Editar hospédes')

@section('content')

<div class="col-10">
		<h1>Editar Hospédes</h1>
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

	@if(!empty($guest))
		<form method="POST" action="{{ route('admin.register_edit_guest', ['id'=>$guest->id]) }}">
			@method('PUT')
			@csrf

		  <div class="form-group">
		    <label>Nome:</label><br/>
		      <input type="text" name="name" value="{{ $guest->name }}" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>CPF:</label><br/>
		      <input type="text" name="cpf" value="{{ $guest->cpf }}" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Celular:</label><br/>
		      <input type="text" name="cell" value="{{ $guest->cell }}" required><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Quant de acompanhantes:</label><br/>
		      <input type="radio" name="number_companions" value="0" {{ ($guest->number_companions == 0) ? 'checked' : '' }} required >
		      <label for="0">Nenhum</label>   

		 	  <input type="radio" name="number_companions" value="1" {{ ($guest->number_companions == 1) ? 'checked' : '' }} required >
		      <label for="1">1 pessoa</label>
		    
		 	  <input type="radio" name="number_companions" value="2" {{ ($guest->number_companions == 2) ? 'checked' : '' }} required >
		      <label for="2">2 pessoas</label>
		    		    
		 	  <input type="radio" name="number_companions" value="3" {{ ($guest->number_companions == 3) ? 'checked' : '' }} required >
		      <label for="3">3 pessoas</label>
		   		
		 	  <input type="radio" name="number_companions"  value="4" {{ ($guest->number_companions == 4) ? 'checked' : '' }} required >
		      <label for="4">4 pessoas</label>	    
		  </div>
		  <div class="form-group">
		    <label>Acomodação:</label><br/>
		    	<select name="id_reservation">
		    		@if($accommodation)
		    			@foreach($accommodation as $items)
			    			<option value="{{ $items->id }}" required>{{ $items->type }} {{ $items->number }}</option>
			    		@endforeach
		    		@endif
		    	</select>
		  </div>
		  <div class="form-group">
		    <label>Data de entrada:</label><br/>
		      <input type="date" name="date_entry" value="{{ $guest->start }}" required  disabled><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Data de saída:</label><br/>
		      <input type="date" name="date_exit" value="{{ $guest->end }}" required  disabled><br/><br/>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	@endif
</div>

@endsection