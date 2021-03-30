@extends('layouts.admin')

@section('title', 'Sistema de gestão de reserva de hotel')

@section('content')
	<div class="col-3">
		<div class="card border-danger mb-3" style="max-width: 18rem;min-height: 329px;">
			  <div class="card-header bg-transparent border-danger">
				<h5 class="card-title">Suíte 01 (Oculpado)</h5>
			  </div>
			  <div class="card-body text-dark">
				<h5 class="card-title">Tipo: Casal</h5>
				<p class="card-text" >
					<div class="info">
						<ul>
							<li>Reserva No: 03</li>
							<li>Acomoda: 2</li>
							<li>Andar: 1</li>
							<li>Entrada: 30/03/21</li>
							<li>Saída: 01/04/21</li>
							<li>Quantidade Dias: 03</li>
						</ul>
					</div>
				</p>

				<div class="alert alert-danger" role="alert">Pagamento Pendente</div>
			  </div>
			</div><!---- Card./ ---->
	</div><!---- Col./ ---->
	<div class="col-3">
		<div class="card border-warning mb-3" style="max-width: 18rem;min-height: 329px;">
		  <div class="card-header bg-transparent border-warning">
			<h5 class="card-title">Apto 01 (Reservado)</h5>
		  </div>
		  <div class="card-body text-dark">
			<h5 class="card-title">Tipo: Coletivo</h5>
			<p class="card-text">
				<div class="info">
					<ul>
						<li>Reserva No: 03</li>
						<li>Acomoda: 2</li>
						<li>Andar: 1</li>
						<li>Entrada: 30/03/21</li>
						<li>Saída: 01/04/21</li>
						<li>Quantidade Dias: 03</li>
					</ul>
				</div>
			</p>
			<div class="alert alert-primary" role="alert">Observação</div>
		  </div>
		</div><!---- Card./ ---->
	</div><!---- Col./ ---->
	<div class="col-3">
		<div class="card border-success mb-3" style="max-width: 18rem;min-height: 329px;">
		  <div class="card-header bg-transparent border-success">
			<h5 class="card-title">Suíte 02 (Disponível)</h5>
		  </div>
		  <div class="card-body text-dark">
			<h5 class="card-title">Tipo: Solterio</h5>
			<p class="card-text">
				<div class="info">
					<ul>
						<li>Reserva No: 03</li>
						<li>Acomoda: 2</li>
						<li>Andar: 1</li>
						<li>Entrada: 30/03/21</li>
						<li>Saída: 01/04/21</li>
						<li>Quantidade Dias: 03</li>
					</ul>
				</div>
			</p>
		  </div>
		</div><!---- Card./ ---->
	</div><!---- Col./ ---->
	<div class="col-3">
		<div class="card border-danger mb-3" style="max-width: 18rem;min-height: 329px;">
		  <div class="card-header bg-transparent border-danger">
			<h5 class="card-title">Casa 01 (Oculpado)</h5>
		  </div>
		  <div class="card-body text-dark">
			<h5 class="card-title">Tipo: Coletivo</h5>
			<p class="card-text">
				<div class="info">
					<ul>
						<li>Reserva No: 03</li>
						<li>Acomoda: 6</li>
						<li>Andar: 1</li>
						<li>Entrada: 30/03/21</li>
						<li>Saída: 01/04/21</li>
						<li>Quantidade Dias: 10</li>
					</ul>
				</div>
			</p>
			<div class="alert alert-danger" role="alert">Pagamento Pendente</div>
		  </div>
		</div><!---- Card./ ---->
	</div><!---- Col./ ---->
	<div class="col-3">
		<div class="card border-primary mb-3" style="max-width: 18rem;min-height: 329px;">
		  <div class="card-header bg-transparent border-primary">
			<h5 class="card-title">Casa 02 (Confirmado)</h5>
		  </div>
		  <div class="card-body text-dark">
			<h5 class="card-title">Tipo: Coletivo</h5>
			<p class="card-text">
				<div class="info">
					<ul>
						<li>Reserva No: 03</li>
						<li>Acomoda: 7</li>
						<li>Andar: 1</li>
						<li>Entrada: 30/03/21</li>
						<li>Saída: 01/04/21</li>
						<li>Quantidade Dias: 05</li>
					</ul>
				</div>
			</p>

			<div class="alert alert-danger" role="alert">Pagamento Pendente</div>
		  </div>
		</div><!---- Card./ ---->
	</div><!---- Col./ ---->
@endsection