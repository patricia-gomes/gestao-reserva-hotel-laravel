@extends('layouts.admin')

@section('title', 'Cadastrar Acomodações')

@section('content')

	<div class="col-10">
		<h1>Cadastrar Acomodações</h1>
	</div>

	<div class="col-6">

		@if($errors->any())	
			<div class="mt-3 mb-3 p-2 alert-danger">	
				@foreach($errors->all() as $error)
					{{ $error }}<br/>
				@endforeach	
			</div>
		@endif
		<form method="POST"  action="{{ url('/admin/register_accommodations') }}">
			@csrf

			  <div class="form-group">
			    <label>Tipo:</label><br/>
			    <select name="types" required>
			       <option></option>
			       @if(count($types) > 0)
			       		@foreach($types as $type)
					       <option value="{{ $type->id }}"> {{ $type->type }} </option>
					    @endforeach
			       @endif
			    </select><br/><br/>
			  </div>
			  <div class="form-group textarea_form_accommodations">
			    <label>Descrição:</label><br/>
			   	<textarea name="description" required placeholder="Sobre o quarto..."></textarea>
			  </div>
			  <div class="form-group">
			    <label>Acomoda:</label><br/>		       
			 	  <input type="radio" name="accommodates" value="2" required>
			      <label for="2">2 pessoas</label>
			    
			 	  <input type="radio" name="accommodates" value="3" required>
			      <label for="3">3 pessoas</label>
			    		    
			 	  <input type="radio" name="accommodates" value="4" required>
			      <label for="4">4 pessoas</label>
			   		
			 	  <input type="radio" name="accommodates" value="5" required>
			      <label for="5">5 pessoas</label>	    
			  </div>
			  <div class="form-group">
				  <label>Andar:</label><br/>
				  <select name="floor" required>
				    <option></option>
				    <option value="1">1.° Andar</option>
				    <option value="2">2.° Andar</option>
				    <option value="3">3.° Andar</option>
				    <option value="4">4.° Andar</option>
				    <option value="5">5.° Andar</option>
				  </select><br/><br/>
			  </div>
			  <div class="form-group">
			    <label>Número do quarto:</label><br/>
			    <input type="text" name="number" required>
			  </div>
			  <div class="form-group">
			    <label>Quantidade de quartos:</label><br/>
			    <select name="quantity" required>
			       <option></option>
			       <option value="1">1</option>
			       <option value="2">2</option>
			       <option value="3">3</option>
			       <option value="4">4</option>
			       <option value="5">5</option>
			       <option value="6">6</option>
			    </select><br/>
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>

@endsection