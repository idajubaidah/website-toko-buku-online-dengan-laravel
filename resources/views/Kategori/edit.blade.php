@extends('layouts.admin')
@section('title','Edit Kategori')
@section('content')

<main class="main">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Kategori</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Kategori Baru</h4>
						</div>
						<div class="card-body">

							<form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="form-group">
									<label for="name">Kategori</label>
									<input type="text" name="kategori" class="form-control" value="{{ $kategori->kategori }}" required>
									<p class="text-danger">{{ $errors->first('kategori') }}</p>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-sm">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


@endsection