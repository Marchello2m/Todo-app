
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
                            <li style="padding-bottom: 40px">

                                @if ($task->status === 1)
                                    <form class="2xl:bg-green-300  "  style=" text-decoration: line-through">
                                        <form class="2xl:bg-red-600 "><p class="mb-2 mx-16 rounded-full py-1 px-24 "><a
                                                    class="font-bold "> Status: </a> Done!
                                            <h1 class="mb-2 mx-16 rounded-full py-1 px-24 font-bold "  >
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

                                            <br>


                                            <br>

                                        </form>
                                        @elseif ($task->status === 0)
                                            <p class="mb-2 mx-16 rounded-full py-1 px-24 ">

                                            <form class="2xl:bg-red-600"><p class="mb-2 mx-16 rounded-full py-1 px-24 ">
                                                    <a class="font-bold"> Status: </a> Still need to do!

                                                <h1 class="mb-2 mx-16 rounded-full py-1 px-24 font-bold">
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

                                                <br>


                                                <br>

                                            </form>
                                        @else ($task->status ===' ')
                                            <form class="2xl:bg-red-600"><p
                                                    class="mb-2 mx-16 rounded-full py-1 px-24 "><a class="font-bold">
                                                        Status: </a>Still Need To Do!

                                                <h1 class="mb-2 mx-16 rounded-full py-1 px-24 font-bold">
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

                                                <br>

                                                <br>
                                            </form>


                                            @endif

                                            <p>
                                                <a class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500" href="{{route('tasks.edit',$task)}}">Edit</a>
                                        <form  method="post" action="{{route('tasks.destroy',$task)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500" type="submit"onclick="confirm('Are you sure?')">Delete</button>
                                        </form>



                                    </form>
                                    <br>
                                    </p>
                            </li>
                        </ul>




                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

