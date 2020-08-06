@extends('layouts.layaout')

@section('content')
	<form action="/create" method="POST" class="mt-5"> 
		{{ csrf_field() }}
		<div class="form-group">
			<label for="titleTask">Title</label>
			<input type="text" class="form-control" id="titleTask" name="title" aria-describedby="taskHelp" placeholder="Enter title">
			@if ($errors->has('title'))
				<small id="taskHelp" class="form-text text-danger">{{ $errors->first('title') }}</small>
			@endif
		</div>
		<div class="form-group">
			<label for="shortDescriptionTask">Description</label>
			<input type="text" class="form-control" id="shortDescriptionTask" name="short_description" aria-describedby="taskDescriptionHelp" placeholder="Enter title">
			@if ($errors->has('short_description'))
				<small id="taskHelp" class="form-text text-danger">{{ $errors->first('short_description') }}</small>
			@endif
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection