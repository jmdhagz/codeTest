@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			<h1>New Tweet</h1>
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ url('posts/create') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" rows="5" maxlength="255" required></textarea>
						</div>
						<div class="form-group">
							<label>Privacy</label>
							<div class="custom-control custom-switch">
								<input type="checkbox" name="remark" class="custom-control-input" id="customSwitch1">
								<label class="custom-control-label" for="customSwitch1"></label>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Publish</button>
							<a href="{{ url('posts') }}" class="btn btn-warning">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection