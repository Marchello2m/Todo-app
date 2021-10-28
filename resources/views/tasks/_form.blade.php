    <div class="py-4 px-8">


        <div class="mb-4">
            <label for="title" class="block text-grey-darker text-sm font-bold mb-2">Title</label>
            <input id="title" class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                   name="title" value="{{$task->title ?? ''}}">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-grey-darker text-sm font-bold mb-2">Content</label>
            <textarea id="content" class="border rounded w-full py-2 px-3 text-grey-darker" name="content">{{$task->content ??''}}</textarea>
        </div>
        <div class="mb-4">
            <label for="category_idt" class="block text-grey-darker text-sm font-bold mb-2">category_id</label>
            <textarea id="category_id" class="border rounded w-full py-2 px-3 text-grey-darker" name="category_id">{{$task->category_id ??''}}</textarea>

            1 Personal,2 Hobby,3for work
        </div>

        <div class="row">
            <div class="form-check izquierda" >
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="status" {{ $task->status ? 'checked=checked' : '' }}>
                    <span class="form-check-sign" >
                <span class="check"></span>
            </span>
                    <label for="">Done</label>
                </label>
            </div>
        </div>

        <div class="mb-4">
            <button
                class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500 ">
                {{$task === null ? 'Create' : 'Save'}}
            </button>
        </div>
    </div>
