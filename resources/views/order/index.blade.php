<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="relative overflow-x-auto w-full mx-md-2 ">
            <div class="w-3/4 mx-auto">
                <p class="text-3xl text-blue-500">total price = {{$totalPrice}} </p>

            </div>
            <table class="w-3/4 mx-auto text-xl">
                <thead class=" text-gray-700 uppercase bg-gray-100">
                <tr class="">
                    <th class="px-6 py-3 text-center rounded-l-lg">#</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">user name</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">email</th>


                    <th class="px-6 py-3 text-center rounded-l-lg">status payment</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">status order</th>

                    <th class="px-6 py-3 text-center rounded-l-lg">total price</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">cart number</th>





                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center rounded-r-lg"></th>

                </tr>
                </thead>
                <tbody>

                @php $i=1 @endphp
                @foreach($orders as $order)
{{--                    @dd($order->user)--}}
                    <tr class="border-b even:bg-blue-200">
                        <td class="px-6 py-3 text-center">{{$i++}}</td>
                        <td class="px-6 py-3 text-center">{{$order->user->name}}</td>
                        <td class="px-6 py-3 text-center">{{$order->user->email}}</td>
                        <td class="px-6 py-3 text-center">{{$order->status_payment}}</td>



                        <td class="px-6 py-3 text-center">{{$order->status_order}}</td>
                        <td class="px-6 py-3 text-center">{{$order->total_price}}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{route('seller.order.edit',$order->id)}}" class="mx-2">
                                <button type="submit"
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 m-1 border border-blue-500 hover:border-transparent rounded">
                                    edit status
                                </button>
                            </a>
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('update',$order)
                                <a href="{{route('seller.order.edit',$order->id)}}" class="mx-2">
                                    <button type="submit"
                                            class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 m-1 border border-green-500 hover:border-transparent rounded">
                                        Edit
                                    </button>
                                </a>
                            @endcan
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('delete',$order)
                                <form action="{{route('seller.order.destroy',$order->id)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 m-1 border border-red-500 hover:border-transparent rounded">
                                        Delete
                                    </button>


                                </form>
                            @endcan
                        </td>
                        <td class="px-6 py-3 text-center">
                                <a href="{{route('seller.comments.index',$order->id)}}" class="mx-2">
                                    <button type="submit"
                                            class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 m-1 border border-green-500 hover:border-transparent rounded">
                                        comments & replies
                                    </button>
                                </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>
