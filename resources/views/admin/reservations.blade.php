@extends('layouts.admin')

@section('title', 'Reservas')

@section('content')

@if(count($reservations) > 0)
		<div class="col-10">
			<h1>Todas  as reservas</h1><br/>
		</div>
	@foreach($reservations as $item)
		<div class="col-3">
			<a href="{{ route('admin.reservation_edit', ['id'=>$item->id]) }}" title="Editar">
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
				<div class="card-footer bg-transparent border-warning">					
					<a href="{{ route('admin.reservation_guest', ['id'=>$item->id]) }}"><button type="submit" class="btn btn-primary">Hospedar</button></a>
					<a href="{{ route('admin.cancel', ['id'=>$item->id]) }}"><button type="submit" class="btn btn-danger">Cancelar</button></a>				
				</div>
			</div><!---- Card./ ---->
			</a>
		</div>
	@endforeach
@else
	Não há reservas!
@endif

@endsection