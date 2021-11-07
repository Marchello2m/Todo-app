<x-app-layout>
    <x-slot name="header" class="bg-dark">
<div  class="text-center xl:text-xl text-white bg-dark">
        <h2>
            {{ __('Tasks') }}
        </h2>
</div>
    </x-slot>
<br class="bg-dark">
<div class="bg-dark" >
<div>
                    <a class="mb-2 mx-16 rounded-full py-1 px-24 btn-success"
                       href="{{route('tasks.create')}}">Create new task</a>



    <table class="table table-dark">
        <thead>
        <tr>

            <th scope="col">ToDo.Nr</th>
            <th scope="col">Title</th>
            <th scope="col">ToDo</th>
            <th scope="col">Category</th>
            <th scope="col">Created at</th>
            <th scope="col">Completed at</th>

        </tr>
        </thead>
        <tbody>
        <tr>

                <th scope="row">{{$task->id}}</th>
                <td>        @if($task->completed_at) <s> @endif{{$task->title}}   @if($task->completed_at) </s> @endif </td>
                <td>@if($task->completed_at) <s> @endif {{$task->content}}  @if($task->completed_at) </s> @endif </td>
                <td>@if($task->completed_at) <s> @endif{{$task->category->name}}  @if($task->completed_at) </s> @endif </td>
                <td>@if($task->completed_at) <s> @endif{{$task->created_at}}  @if($task->completed_at) </s> @endif </td>
                <td> @if($task->completed_at) <s> @endif{{$task->completed_at}}  @if($task->completed_at) </s> @endif </td>

            <td>  @if($task->completed_at)
                    <form method="post" action="{{route('tasks.unComplete',$task)}}">
                        @csrf
                        <button class="btn btn-outline-warning" type="submit" onclick="return confirm('Are you sure?')" >UnComplete</button>
                    </form>      @endif</td>

            <td><a class="btn btn-outline-success"
                   href="{{route('tasks.edit',$task)}}">Edit</a></td>
            <td>  @if(!$task->completed_at)
                    <form method="post" action="{{route('tasks.complete',$task)}}">
                        @csrf
                        <button class="btn btn-outline-success" type="submit" onclick="return confirm('Are you sure?')">Complete
                        </button>
                    </form>
                @endif</td>
            <td>
                <form method="post" action="{{route('tasks.destroy',$task)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger"
                        type="submit" onclick="return confirm('Are you sure?')">Delete
                    </button>
                </form>
            </td>


        </tr>


        </tbody>
    </table>
    @endforeach
</div>
</x-app-layout>

