<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foods') }}
        </h2>
    </x-slot>
    @php $i=1 @endphp
    <div class="py-12">
        <div class="mb-6 w-1/2 mx-auto ">



            <form action="{{route('seller.food.filter')}}"
                  method="post">
                @csrf

                <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">food category</label>
                <select name="food_category"
                        id="@if(empty($errors->first('food_category'))) success @else error  @endif"
                        class="@if(empty($errors->first('food_category'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                    <option value="" disabled>select one ...</option>
                    @foreach($food_categories as $food_category)
                        <option value="{{$food_category->id}}">{{$food_category->name}}</option>
                    @endforeach
                </select>



                <button type="submit"
                        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 m-1 border border-red-500 hover:border-transparent rounded">
                    go
                </button>


            </form>



        </div>
        <div class="relative overflow-x-auto w-full mx-md-2 ">

            <table class="w-3/4 mx-auto text-xl">
                <thead class=" text-gray-700 uppercase bg-gray-100">
                <tr class="">
                    <th class="px-6 py-3 text-center rounded-l-lg">#</th>

                    <th class="px-6 py-3 text-center rounded-l-lg">name</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">food category</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">materials</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">image</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">price</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">coupon</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">food party</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">restaurant</th>
                    <th class="px-6 py-3 text-center rounded-l-lg">restaurant category</th>

                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center rounded-r-lg"></th>

                </tr>
                </thead>
                <tbody>
                {{--    <a href="{{route('books.create')}}">sada</a>--}}
                @foreach($foods as $food)
                    <tr class="border-b even:bg-blue-200">
                        <td class="px-6 py-3 text-center">{{$i++}}</td>
                        <td class="px-6 py-3 text-center">{{$food->name}}</td>

                        <td class="px-6 py-3 text-center">{{$food->foodCategory->name}}</td>
                        <td class="px-6 py-3 text-center">{{$food->materials}}</td>
                        <td class="px-6 py-3 text-center"><img src="{{$food->profile_image_url}}"></td>
                        <td class="px-6 py-3 text-center">{{$food->price}}</td>
                        <td class="px-6 py-3 text-center">{{$food->coupon->code}}</td> <td class="px-6 py-3 text-center">{{$food->foodParty->name}}</td> <td class="px-6 py-3 text-center">{{$food->restaurant->name}}</td>

                        {{--                        <td class="px-6 py-3 text-center">--}}
                        {{--                            <a href="" class="mx-2">--}}
                        {{--                                <button type="submit"--}}
                        {{--                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 m-1 border border-blue-500 hover:border-transparent rounded">--}}
                        {{--                                    Read More--}}
                        {{--                                </button>--}}
                        {{--                            </a>--}}
                        {{--                        </td>--}}
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
            <div class="w-1/6 mx-auto ">
                {{ $foods->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
