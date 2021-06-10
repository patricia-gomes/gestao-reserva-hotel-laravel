@extends('layouts.admin')

@section('title', 'Tipos de Acomodações')

@section('content')

@if(count($types) > 0)
	<div class="col-10">
		<h1>Tipos de Acomodações</h1><br/>
	</div>	

	<div class="col-10">
		
		<table class="table">
			<thead>
			    <tr>
			    	<th scope="col">#</th>
			        <th scope="col">Nome</th>
			        <th scope="col">Editar</th>
			        <th scope="col">Deletar</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($types as $item)
			    <tr>
			    	<td scope="row"></td>
				    <td> {{ $item->type }} </td>
				    <form method="POST" action="{{ route('admin.form_edit_type', ['id'=>$item->id]) }}">
				    	@method('PUT')
				    	@csrf
				    	<td><input type="submit" class="btn btn-primary" value="Editar"></td>
					</form>
				    <form method="POST" action="{{ route('admin.delete_type', ['id'=>$item->id]) }}">
				    	@csrf
				   		<td><input type="submit" class="btn btn-danger" value="Deletar"></td>
					</form>
			    </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@else
	Nenhum tipo de acomodação cadastrado!
@endif

@endsection