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

                    <th class="px-6 py-3 text-center rounded-l-lg">food name</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">materials</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">image</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">price</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">coupon</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">food party</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">restaurant</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">status</th>


                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center rounded-r-lg"></th>

                </tr>
                </thead>
                <tbody>

                @php $i=1 @endphp
                @foreach($foods as $food)

                    <tr class="border-b even:bg-blue-200">
                        <td class="px-6 py-3 text-center">{{$i++}}</td>
                        <td class="px-6 py-3 text-center">{{$food->username}}</td>
                        <td class="px-6 py-3 text-center">{{$food->email}}</td>

                        <td class="px-6 py-3 text-center">{{$food->foodName}}</td>

                        <td class="px-6 py-3 text-center">{{$food->materials}}</td>
                        <td class="px-6 py-3 text-center"><img src="{{Storage::disk('snap-food')->url($food->image)}}">
                        </td>
                        <td class="px-6 py-3 text-center">{{$food->price}}</td>
                        <td class="px-6 py-3 text-center">{{$food->code}}</td>
                        <td class="px-6 py-3 text-center">{{$food->foodPartyName}}</td>
                        <td class="px-6 py-3 text-center">{{$food->restaurantName}}</td>
                        <td class="px-6 py-3 text-center">{{$food->status}}</td>

                        <td class="px-6 py-3 text-center">
                            <a href="{{route('seller.cart.edit',$food->idCart)}}" class="mx-2">
                                <button type="submit"
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 m-1 border border-blue-500 hover:border-transparent rounded">
                                    edit status
                                </button>
                            </a>
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('update',$food)
                                <a href="{{route('seller.food.edit',$food->id)}}" class="mx-2">
                                    <button type="submit"
                                            class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 m-1 border border-green-500 hover:border-transparent rounded">
                                        Edit
                                    </button>
                                </a>
                            @endcan
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('delete',$food)
                                <form action="{{route('seller.food.destroy',$food->id)}}"
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
