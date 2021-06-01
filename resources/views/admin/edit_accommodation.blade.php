@extends('layouts.admin')

@section('title', 'Editar Acomodações')

@section('content')

	<div class="col-10">
		<h1>Editar Acomodações</h1>
	</div>

	<div class="col-6">

		@if($errors->any())	
			<div class="mt-3 mb-3 p-2 alert-danger">	
				@foreach($errors->all() as $error)
					{{ $error }}<br/>
				@endforeach	
			</div>
		@endif

		@if(!empty($accommodations))
		<form method="POST"  action="{{ route('admin.register_edit_accommodations', ['id'=>$accommodations[0]->id]) }}">
			@method('PUT')
			@csrf
		  <div class="form-group">
		    <label>Tipo:</label><br/>
		    <select name="types" required>		    		       		
		        @if(count($types) > 0)
		            @foreach($types as $type)
				       	<option value="{{ $type['id'] }}" {{ ($accommodations[0]->id_type === $type['id']) ? 'selected' : '' }} > {{ $type['type'] }} </option>
				    @endforeach
		       @endif
		    </select><br/><br/>
		  </div>
		  <div class="form-group textarea_form_accommodations">
		    <label>Descrição:</label><br/>
		   	<textarea name="description" required placeholder="Sobre o quarto...">{{ $accommodations[0]->description }}</textarea>
		  </div>
		  <div class="form-group">
		    <label>Acomoda:</label><br/>		       
		 	  <input type="radio" name="accommodates" value="2" {{ ($accommodations[0]->accommodates == 2) ? 'checked' : '' }}  required>
		      <label for="2">2 pessoas</label>
		    
		 	  <input type="radio" name="accommodates" value="3" {{ ($accommodations[0]->accommodates == 3) ? 'checked' : '' }} required>
		      <label for="3">3 pessoas</label>
		    		    
		 	  <input type="radio" name="accommodates" value="4" {{ ($accommodations[0]->accommodates == 4) ? 'checked' : '' }} required>
		      <label for="4">4 pessoas</label>
		   		
		 	  <input type="radio" name="accommodates" value="5" {{ ($accommodations[0]->accommodates == 5) ? 'checked' : '' }} required>
		      <label for="5">5 pessoas</label>	    
		  </div>
		  <div class="form-group">
			  <label>Andar:</label><br/>
			  <select name="floor" required>
			    <option value="{{ $accommodations[0]->floor }}">{{ $accommodations[0]->floor }}ºandar</option>
			    <option value="1">1ºandar</option>
			    <option value="2">2ºandar</option>
			    <option value="3">3ºandar</option>
			    <option value="4">4ºandar</option>
			    <option value="5">5ºandar</option>
			  </select><br/><br/>
		  </div>
		  <div class="form-group">
		    <label>Número do quarto:</label><br/>
		    <input type="text" name="number" value="{{ $accommodations[0]->number }}" required>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Salvar</button>
		</form>
		@endif
	</div>

@endsection