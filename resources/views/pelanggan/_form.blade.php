<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Kota</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::model($pelanggan, ['method' => 'POST', 'url' => $action, 'class' => 'form-horizontal']) !!}
						<div class="form-group">
							<label class="col-md-4 control-label">Nama</label>
							<div class="col-md-6">
								{!! Form::text('nama', old('nama'), ['class'=> "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>

							<div class="col-md-6">
								{!! Form::email('email', old('email'), ['class'=> "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat</label>

							<div class="col-md-6">
								{!! Form::text('alamat', old('alamat'), ['class'=> "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat</label>

							<div class="col-md-6">
								{!! Form::select('kota_id', $kota, old('kota_id'), ['class'=> "form-control"]) !!}
							</div>
						</div>



						<div class="form-group">
							<label class="col-md-4 control-label">No. Telp</label>

							<div class="col-md-6">
								{!! Form::text('no_telp', old('no_telp'), ['class'=> "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">No. HP</label>

							<div class="col-md-6">
								{!! Form::text('no_hp', old('no_hp'), ['class'=> "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::input('submit', 'submit', 'Simpan', ['class'=> "btn btn-primary", 'style'=>"margin-right: 15px;"]) !!}

								<a href="{{ route('pelanggan.index') }}">Back to list &rsaquo;</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>