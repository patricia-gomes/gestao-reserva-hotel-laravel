@extends('layouts.admin')

@section('title', 'Sistema de gestão de reserva de hotel')

@section('content')

	@if(count($accommodations) > 0)
		@foreach($accommodations as $item)
			@if($item->status == 1) 
				<div class="col-3">
					<div class="card border-success mb-3" style="max-width: 18rem;min-height: 329px;">
						<div class="card-header bg-transparent border-success">
							<h5 class="card-title">{{ $item->number }}</h5>
					    </div>
						<div class="card-body text-dark">
							<h5 class="card-title">
								Tipo: {{ $item->type }}
							</h5>
							<p class="card-text" >
								<div class="info">
									<ul>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
										<li>Status: Disponível</li>
									</ul>
								</div>
							</p>
						</div>
						<div class="card-footer bg-transparent border-success">

							<form method="POST" action="{{ route('admin.form_reservations_id', ['id'=>$item->id]) }}">
						    	@csrf
						    	<input type="submit" class="btn btn-warning" value="Reservar">
							</form>
							<form method="POST" action="{{ route('admin.form_guests_id', ['id'=>$item->id]) }}">
						    	@csrf
						    	<input type="submit" class="btn btn-danger" value="Hospedar">
							</form>						
						</div>
					</div><!---- Card./ ---->
				</div>
			 @elseif($item->status == 2)
				<div class="col-3">
					<div class="card border-danger mb-3" style="max-width: 18rem;min-height: 329px;">
						<div class="card-header bg-transparent border-danger">
							<h5 class="card-title">{{ $item->number }}</h5>
					    </div>
						<div class="card-body text-dark">
							<h5 class="card-title">
								Tipo: {{ $item->type }}
							</h5>
							<p class="card-text" >
								<div class="info">
									<ul>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
										<li>Status: Ocupado</li>
									</ul>
								</div>
							</p>
						</div>
					</div><!---- Card./ ---->
				</div>
			 @else
				<div class="col-3">
					<div class="card border-warning mb-3" style="max-width: 18rem;min-height: 329px;">
						<div class="card-header bg-transparent border-warning">
							<h5 class="card-title">{{ $item->number }}</h5>
					    </div>
						<div class="card-body text-dark">
							<h5 class="card-title">
								Tipo: {{ $item->type }}
							</h5>
							<p class="card-text" >
								<div class="info">
									<ul>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
										<li>Status: Reservado</li>
									</ul>
								</div>
							</p>
						</div>
						<div class="card-footer bg-transparent border-warning">

							<form method="POST" action="{{ route('admin.form_guests_id', ['id'=>$item->id]) }}">
						    	@csrf
						    	<input type="submit" class="btn btn-danger" value="Hospedar">
							</form>
						</div>
					</div><!---- Card./ ---->
				</div>
			@endif
		@endforeach
	@else 

		Não há acomodações ou reservas cadastradas!

	@endif
@endsection