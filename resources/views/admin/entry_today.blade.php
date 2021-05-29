@extends('layouts.admin')

@section('title', 'Entradas hoje')

@section('content')

@if(count($list) > 0)
		<div class="col-10">
			<h1>Entradas hoje</h1><br/>
		</div>
	@foreach($list as $item)
		<div class="col-3">
			<a href="#">
			<div class="card border-warning mb-3" style="max-width: 18rem;min-height: 329px;">
				<div class="card-header bg-transparent border-warning">
					<h5 class="card-title">{{ $item->name }}</h5>
			    </div>
				<div class="card-body text-dark">
					<h5 class="card-title">
						Acomodação: {{ $item->number }}
					</h5>
					<p class="card-text" >
						<div class="info">
							<ul>
								<li>Tipo:  {{ $item->type }}</li>
								<li>ID:  {{ $item->id_reservation }}</li>
								<li>Entrada:  {{ \Carbon\Carbon::parse($item->start)->format('d/m/Y')}}</li>
								<li>Saída: {{ \Carbon\Carbon::parse($item->end)->format('d/m/Y')}}</li>
								<li>Celular: {{ $item->cell }}</li>			
								<li>Dias: {{ $item->number_days }}</li>					
							</ul>
						</div>
					</p>
				</div>
			</div><!---- Card./ ---->
			</a>
		</div>
	@endforeach
@else
	Não há nenhuma entrada para hoje!
@endif

@endsection