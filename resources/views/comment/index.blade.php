<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="relative overflow-x-auto w-full mx-md-2 ">
            <div class="w-3/4 mx-auto border border-blue-400 shadow shadow-amber-700 p-3">
                <p class="text-3xl text-blue-500 pb-3">comments: order = {{$order->id}} </p>
                @foreach($comments as $comment)
                    <p class="text-3xl text-blue-500">{{$comment->content}} </p>
                    <form action="{{route('seller.comment.destroy.request',$comment->id)}}"
                          method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 m-1 border border-red-500 hover:border-transparent rounded">
                            Delete
                        </button>
                        <div class="w-3/4 ml-5">
                            @foreach($comment->replies as $reply)
                                <p class="text-3xl text-green-500"> {{$reply->content}} </p>

                        </div>

                    </form>
                @endforeach

            </div>
            @endforeach


        </div>
    </div>
    </div>
</x-app-layout>
