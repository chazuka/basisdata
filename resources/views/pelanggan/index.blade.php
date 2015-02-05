@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Pelanggan</div>
				<div class="panel-body">

					<div class="table-responsive">
					  <table class="table table-bordered">
					  	<tr>
					  		<th>ID</th>
					  		<th>Nama</th>
					  		<th>Email</th>
							<th>Kota</th>
							<th>HP</th>
							<th>Phone</th>
					  		<th>Action</th>
					  	</tr>
					  	@foreach($pelanggan as $k)
					  	<tr>
					  		<td>#{{ $k->id }}</td>
					  		<td>{{ $k->nama }}</td>
							<td>{{ $k->email }}</td>
							<td>{{ $k->kota->nama }}</td>
							<td>{{ $k->no_telp }}</td>
							<td>{{ $k->no_hp }}</td>
					  		<td>
					  			<div class="btn-group" role="group">
					  			<a class="btn btn-primary" href="{{ route('pelanggan.edit', ['pelanggan' => $k->id]) }}">
					  				Edit
					  			</a>
					  			<a class="btn btn-default" href="{{ route('pelanggan.destroy', ['pelanggan' => $k->id, '_method' => 'DELETE']) }}">
									Delete
								</a>
								</div>
					  		</td>
					  	</tr>
					  	@endforeach
					  </table>
					</div>

					{!! $pelanggan->render() !!}
					<a class="btn btn-primary" href="{{ route('pelanggan.create') }}">Buat Pelanggan Baru</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
