@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			<h1>Delete Tweet</h1>
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ url('posts/'.$id.'/delete') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $post -> id }}">
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" rows="5" maxlength="255" disabled>{{ $post -> description }}</textarea>
						</div>
						<div class="form-group">
							<label>Privacy</label>
							<div class="custom-control custom-switch">
								<input type="checkbox" name="remark" class="custom-control-input" id="customSwitch1" {{ ($post -> remark == 1) ? 'checked' : '' }} disabled>
								<label class="custom-control-label" for="customSwitch1"></label>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-danger">Delete</button>
							<a href="{{ url('posts') }}" class="btn btn-warning">Cancel</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection