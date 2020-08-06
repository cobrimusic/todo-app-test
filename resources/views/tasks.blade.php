@extends('layouts.layaout')

@section('content')
	<div class="list-content mt-5">
		<ul class="list-group">
			@if(count($tasks))
				@foreach($tasks as $task)
					<li class="list-group-item d-flex justify-content-between align-items-center @if($task->status_task == 'todo') border border-primary @else border border-warning @endif">
						{{ $task->title }}
						<div class="btn-group">
							<a class="btn btn-primary button_form @if($task->status_task == 'finished') disabled @endif" href="javascript:void(0)" data-id="update_{{ $task->task_id }}">
								@if($task->status_task == 'finished') Done @else Finish @endif
							</a>
							<form style="float: right;" action='{{route("update", $task->id)}}' id="form_update_{{$task->task_id}}" method="POST">
								{{ method_field("PATCH") }}
								{{ csrf_field() }}
							</form>
							<a class="btn btn-danger button_form" href="javascript:void(0)" data-id="delete_{{ $task->task_id }}">Delete</a>
							<form style="float: right;" action='{{route("delete", $task->task_id)}}' id="form_delete_{{$task->task_id}}" method="POST">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
							</form>
						</div>  
					</li>
				@endforeach
			@else
				<h2 class="text-center">Task list empty</h2>
				<a type="button" class="btn btn-primary btn-sm" href="{{ route('create_task') }}" style="width:150px;margin:0 auto;color:white;">Create</a>
			@endif
		</ul>
	</div>
@endsection

@section("js")
	<script>

		$(document).ready(function(){
        	$(".button_form").click(function(){
				console.log($(this).data("id"))
				console.log($("#form_"+$(this).data("id")))
				$("#form_"+$(this).data("id")).submit();
			})
		})
	</script>
@endsection