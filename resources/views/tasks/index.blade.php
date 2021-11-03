<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-300 to-blue-500"
                       href="{{route('tasks.create')}}">Create new task</a>
                    <br>





                    <br>

                    @foreach($tasks as $task)
                        <ul>
                            <li style="padding-bottom: 40px" class="align-left">


                                    <form class=" align-left " >
                                        <form class="2xl:bg-red-600 "><p class="mb-2 mx-16 rounded-full py-1 px-24 "><a>  </a>
                                            <h1 class="mb-2 mx-16 rounded-full py-1 px-24 font-bold  align-left">
                                                @if($task->completed_at) <s> @endif

                                                Title: {{$task->title}}</h1>


                                            <p class="mb-2 mx-16 rounded-full py-1 px-24 ">
                                                <a class="font-bold">ToDo:</a> {{$task->content}}
                                            </p>
                                            <p class="mb-2 mx-16 rounded-full py-1 px-24 ">
                                                <a class="font-bold">Category id: </a> {{$task->category_id}}
                                            </p>
                                            <p class="mb-2 mx-16 rounded-full py-1 px-24 ">
                                                <a class="font-bold"> Category: </a> {{$task->category->name}}
                                            </p>
                                            <p class="mb-2 mx-16 rounded-full py-1 px-24 ">
                                                <a class="font-bold">Created  at: </a> {{$task->created_at}}
                                            </p>
                                            @if($task->completed_at)
                                            <p class="mb-2 mx-16 rounded-full py-1 px-24 ">
                                                <a class="font-bold">Completed at: </a> {{$task->completed_at}}
                                            </p>
                                                @endif
                                            @if($task->completed_at) </s> @endif
                                        </form>

                                        <p>
                                            <a class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500"
                                               href="{{route('tasks.edit',$task)}}">Edit</a>
                                        <form method="post" action="{{route('tasks.destroy',$task)}}">
                                            <br>
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500"
                                                type="submit" onclick="return confirm('Are you sure?')">Delete
                                            </button>

                                        </form>
                                        <br>
                                        @if($task->completed_at)
                                            <form method="post" action="{{route('tasks.unComplete',$task)}}">
                                                @csrf
                                                <button   class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500"
                                                          type="submit" onclick="return confirm('Are you sure?')">UnComplete</button>
                                            </form>
                                        @endif
                                        @if(!$task->completed_at)
                                             <form method="post" action="{{route('tasks.complete',$task)}}">
                                              @csrf
                                                 <button   class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500"
                                                     type="submit" onclick="return confirm('Are you sure?')">Complete</button>
                                             </form>
                                          @endif
                                    </form>
                                    <br>

                            </li>
                        </ul>


                @endforeach


            </div>
        </div>
    </div>
    </div>


</x-app-layout>

