@extends('layouts.admin')

@section('title', 'Reservas')

@section('content')

<div class="col-10">
	<h2>Cadastrar novo usuário</h2><br/>

	<a href="{{ route('register') }}"><button type="submit" class="btn btn-danger">Add novo usuário</button></a>	
</div>

@endsection