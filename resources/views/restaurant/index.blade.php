<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurants') }}
        </h2>
    </x-slot>
    @php $i=1 @endphp
    <div class="py-12">
        <div class="relative overflow-x-auto w-full mx-md-2 ">

            <table class="w-3/4 mx-auto text-xl">
                <thead class=" text-gray-700 uppercase bg-gray-100">
                <tr class="">
                    <th class="px-6 py-3 text-center rounded-l-lg">#</th>

                    <th class="px-6 py-3 text-center rounded-l-lg">name</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">restaurant category</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">phone number</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">address</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">account number</th>

                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center rounded-r-lg"></th>

                </tr>
                </thead>
                <tbody>
                {{--    <a href="{{route('books.create')}}">sada</a>--}}
                @foreach($restaurants as $restaurant)
                    <tr class="border-b even:bg-blue-200">
                        <td class="px-6 py-3 text-center">{{$i++}}</td>
                        <td class="px-6 py-3 text-center">{{$restaurant->name}}</td>

                        <td class="px-6 py-3 text-center">{{$restaurant->restaurantCategory->name}}</td>
                        <td class="px-6 py-3 text-center">{{$restaurant->phone_number}}</td>
                        <td class="px-6 py-3 text-center">{{$restaurant->address}}</td>
                        <td class="px-6 py-3 text-center">{{$restaurant->account_number}}</td>


                        {{--                        <td class="px-6 py-3 text-center">--}}
                        {{--                            <a href="" class="mx-2">--}}
                        {{--                                <button type="submit"--}}
                        {{--                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 m-1 border border-blue-500 hover:border-transparent rounded">--}}
                        {{--                                    Read More--}}
                        {{--                                </button>--}}
                        {{--                            </a>--}}
                        {{--                        </td>--}}
                        <td class="px-6 py-3 text-center">
                            @can('update',$restaurant)
                                <a href="{{route('seller.restaurant.edit',$restaurant->id)}}" class="mx-2">
                                    <button type="submit"
                                            class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 m-1 border border-green-500 hover:border-transparent rounded">
                                        Edit
                                    </button>
                                </a>
                            @endcan
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('delete',$restaurant)
                                <form action="{{route('seller.restaurant.destroy',$restaurant->id)}}"
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
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
