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

					{!! Form::model($kota, ['method' => 'POST', 'url' => $action, 'class' => 'form-horizontal']) !!}
						<div class="form-group">
							<label class="col-md-4 control-label">Nama</label>
							<div class="col-md-6">
								{!! Form::text('nama', old('nama'), ['class'=> "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Ongkos Kirim</label>
							<div class="col-md-6">
								{!! Form::text('ongkos_kirim', old('ongkos_kirim'), ['class' => "form-control"]) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::input('submit', 'submit', 'Simpan', ['class'=> "btn btn-primary", 'style'=>"margin-right: 15px;"]) !!}

								<a href="{{ route('kota.index') }}">Back to list &rsaquo;</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>