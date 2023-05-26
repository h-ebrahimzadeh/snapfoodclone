<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="relative overflow-x-auto w-full mx-md-2 ">
            <div class="w-3/4 mx-auto border border-blue-400 shadow shadow-amber-700 p-3 ">
                <p class="text-3xl text-blue-500 pb-3">comments: </p>

                <table class="w-3/4 mx-auto text-xl">
                    <thead class=" text-gray-700 uppercase bg-gray-100">
                    <tr class="">
                        <th class="px-6 py-3 text-center rounded-l-lg">#</th>
                        <th class="px-6 py-3 text-center rounded-l-lg">content</th>
                        <th class="px-6 py-3 text-center rounded-l-lg">user</th>
                        <th class="px-6 py-3 text-center"></th>
                        <th class="px-6 py-3 text-center"></th>
                        <th class="px-6 py-3 text-center rounded-r-lg"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @php $i=1 @endphp
                    @foreach($comments as $comment)
                        {{--                    @dd($order->user)--}}
                        <tr class="border-b even:bg-blue-200">
                            <td class="px-6 py-3 text-center">{{$i++}}</td>
                            <td class="px-6 py-3 text-center">{{$comment->content}}</td>
                            <td class="px-6 py-3 text-center">{{$comment->user->name}}</td>
                            <td class="px-6 py-3 text-center">
                                <form action="{{route('admin.comment.destroy',$comment->id)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="mx-3 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 m-1 border border-red-500 hover:border-transparent rounded">
                                        Delete
                                    </button>

                                </form>
                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>


            </div>


        </div>
    </div>

</x-app-layout>
