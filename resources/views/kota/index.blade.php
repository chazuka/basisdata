@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Kota</div>
				<div class="panel-body">

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> ada kesalahan dalam input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="table-responsive">
					  <table class="table table-bordered">
					  	<tr>
					  		<th>ID</th>
					  		<th>Nama</th>
					  		<th>Ongkos Kirim</th>
					  		<th>Action</th>
					  	</tr>
					  	@foreach($kota as $k)
					  	<tr>
					  		<td>#{{ $k->id }}</td>
					  		<td>{{ $k->nama }}</td>
					  		<td>Rp. {{ $k->ongkos_kirim }}</td>
					  		<td>
					  			<div class="btn-group" role="group">
					  			<a class="btn btn-primary" href="{{ route('kota.edit', ['kota' => $k->id]) }}">
					  				Edit
					  			</a>
					  			<a class="btn btn-default" href="{{ route('kota.destroy', ['kota' => $k->id, '_method' => 'DELETE']) }}">
									Delete
								</a>
								</div>
					  		</td>
					  	</tr>
					  	@endforeach
					  </table>
					</div>

					{!! $kota->render() !!}
					<a class="btn btn-primary" href="{{ route('kota.create') }}">Buat Kota Baru</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
