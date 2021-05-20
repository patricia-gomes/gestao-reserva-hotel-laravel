@extends('layouts.admin')

@section('title', 'Sistema de gestão de reserva de hotel')

@section('content')

	@if(count($accommodations) > 0)
		@foreach($accommodations as $item)
			@if($item->status == 'Disponível') 
				<div class="col-3">
					<a href="#">
					<div class="card border-success mb-3" style="max-width: 18rem;min-height: 329px;">
						<div class="card-header bg-transparent border-success">
							<h5 class="card-title">{{ $item->number }} ({{ $item->status }})</h5>
					    </div>
						<div class="card-body text-dark">
							<h5 class="card-title">
								Tipo: {{ $item->name }}
							</h5>
							<p class="card-text" >
								<div class="info">
									<ul>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
									</ul>
								</div>
							</p>
						</div>
					</div><!---- Card./ ---->
					</a>
				</div>
			 @elseif($item->status == 'Ocupado')
				<div class="col-3">
					<a href="#">
					<div class="card border-danger mb-3" style="max-width: 18rem;min-height: 329px;">
						<div class="card-header bg-transparent border-danger">
							<h5 class="card-title">{{ $item->number }} ({{ $item->status }})</h5>
					    </div>
						<div class="card-body text-dark">
							<h5 class="card-title">
								Tipo: {{ $item->name }}
							</h5>
							<p class="card-text" >
								<div class="info">
									<ul>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
									</ul>
								</div>
							</p>
						</div>
					</div><!---- Card./ ---->
					</a>
				</div>
			 @else
				<div class="col-3">
					<a href="#">
					<div class="card border-warning mb-3" style="max-width: 18rem;min-height: 329px;">
						<div class="card-header bg-transparent border-warning">
							<h5 class="card-title">{{ $item->number }} ({{ $item->status }})</h5>
					    </div>
						<div class="card-body text-dark">
							<h5 class="card-title">
								Tipo: {{ $item->name }}
							</h5>
							<p class="card-text" >
								<div class="info">
									<ul>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
									</ul>
								</div>
							</p>
						</div>
					</div><!---- Card./ ---->
					</a>
				</div>
			@endif
		@endforeach
	@else 

		Não há acomodaões cadastradas!

	@endif
@endsection