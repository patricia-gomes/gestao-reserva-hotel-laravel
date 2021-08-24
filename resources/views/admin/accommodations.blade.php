@extends('layouts.admin')

@section('title', 'Acomodações')

@section('content')
	<div class="col-10">
		<h1>Todas  as acomodações</h1><br/>
	</div>

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
										<li>ID: {{ $item->id }}</li>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
									</ul>
								</div>
							</p>
						</div>
						<div class="card-footer bg-transparent border-success">							
							<form method="POST" action="{{ route('admin.accommodation_edit', ['id'=>$item->id]) }}">
						    	@method('PUT')
						    	@csrf
						    	<input type="submit" class="btn btn-success" value="Editar">
							</form>
							<form method="POST" action="{{ route('admin.delete_accommodation', ['id'=>$item->id]) }}">
						    	@csrf
						   		<td><input type="submit" class="btn btn-danger" value="Deletar"></td>
							</form>
						</div>
					</div><!---- Card./ ---->
				</div>
			 @elseif($item->status == 2)
				<div class="col-3">
					<a href="{{ route('admin.accommodation_edit', ['id'=>$item->id]) }}" title="Editar">
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
										<li>ID: {{ $item->id }}</li>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
									</ul>
								</div>
							</p>
						</div>
						<div class="card-footer bg-transparent border-danger">
							<input type="submit" class="btn btn-danger" value="Editar">
						</div>
					</div><!---- Card./ ---->
					</a>
				</div>
			 @else
				<div class="col-3">
					<a href="{{ route('admin.accommodation_edit', ['id'=>$item->id]) }}" title="Editar">
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
										<li>ID: {{ $item->id }}</li>
										<li>Acomoda: {{ $item->accommodates }}</li>
										<li>Andar: {{ $item->floor }}</li>
										<li>Descrição: {{ $item->description }}</li>
									</ul>
								</div>
							</p>
						</div>
						<div class="card-footer bg-transparent border-warning">
							<input type="submit" class="btn btn-warning" value="Editar">
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