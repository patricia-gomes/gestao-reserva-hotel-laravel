@extends('layouts.admin')

@section('title', 'Reservas')

@section('content')

<div class="col-10">
	<h1>Todas  as reservas</h1><br/>
</div>

@if(count($reservations) > 0)
	@foreach($reservations as $item)
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
								<li>Entrada:  {{ \Carbon\Carbon::parse($item->start)->format('d/m/Y')}}</li>
								<li>Saída: {{ \Carbon\Carbon::parse($item->end)->format('d/m/Y')}}</li>
								<li>Celular: {{ $item->cell }}</li>					
							</ul>
						</div>
					</p>
				</div>
			</div><!---- Card./ ---->
			</a>
		</div>
	@endforeach
@endif

@endsection