@extends('layouts.admin')

@section('title', 'Saídas hoje')

@section('content')

@if(count($list) > 0)
		<div class="col-10">
			<h1>Saídas hoje</h1>
			<p>Atenção: Os hóspedes que estiver nessa lista serão removidos automaticamente pelo sistema depois do horário de check-out às 12h.</p><br/>
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
								<li>Entrada:  {{ \Carbon\Carbon::parse($item->start)->format('d/m/Y')}}</li>
								<li>Saída: {{ \Carbon\Carbon::parse($item->end)->format('d/m/Y')}}</li>
								<li>Celular: {{ $item->cell }}</li>			
								<li>Dias: {{ $item->number_days }}</li>					
							</ul>
						</div>
					</p>
				</div>
				<div class="card-footer bg-transparent border-warning">					
					<a href="{{ route('admin.finish_guest', ['id'=>$item->id]) }}"><button type="submit" class="btn btn-danger">Finalizar</button></a>			
				</div>
			</div><!---- Card./ ---->
			</a>
		</div>
	@endforeach
@else
	Não há nenhuma saída para hoje!
@endif

@endsection