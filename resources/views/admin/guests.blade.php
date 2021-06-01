@extends('layouts.admin')

@section('title', 'Hospédes')

@section('content')

@if(count($guests) > 0)
		<div class="col-10">
			<h1>Todos os hospédes</h1><br/>
		</div>	
	@foreach($guests as $item)
		<div class="col-3">
			<a href="{{ route('admin.form_edit_guest', ['id'=>$item->id]) }}" title="Editar">
			<div class="card border-danger mb-3" style="max-width: 18rem;min-height: 329px;">
				<div class="card-header bg-transparent border-danger">
					<h5 class="card-title">{{ $item->name }}</h5>
			    </div>
				<div class="card-body text-dark">
					<h5 class="card-title">
						CPF: {{ $item->cpf }}
					</h5>
					<p class="card-text" >
						<div class="info">
							<ul>
								<li>Celular: {{ $item->cell }}</li>
								<li>Quant acompanhantes: {{ $item->number_companions }}</li>
								<li>Entrada : {{ \Carbon\Carbon::parse($item->start)->format('d/m/Y')}}</li>
								<li>Saída : {{ \Carbon\Carbon::parse($item->end)->format('d/m/Y')}}</li>
								<li>Dias : {{ $item->number_days }}</li>
								<li>ID: {{ $item->id_reservation }}</li>
							</ul>
						</div>
					</p>
				</div>
			</div><!---- Card./ ---->
			</a>
		</div>
	@endforeach
@else
	Nenhum hospéde cadastrado!
@endif

@endsection