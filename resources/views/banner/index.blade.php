<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('banner images') }}
        </h2>
    </x-slot>
    @php $i=1 @endphp
    <div class="py-12">

        <div class="relative overflow-x-auto w-full mx-md-2 ">

            <table class="w-3/4 mx-auto text-xl">
                <thead class=" text-gray-700 uppercase bg-gray-100">
                <tr class="">
                    <th class="px-6 py-3 text-center rounded-l-lg">#</th>


                    <th class="px-6 py-3 text-center rounded-l-lg">image</th>


                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center"></th>
                    <th class="px-6 py-3 text-center rounded-r-lg"></th>

                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr class="border-b even:bg-blue-200">
                        <td class="px-6 py-3 text-center">{{$i++}}</td>

                        <td class="px-6 py-3 text-center"><img src="{{$banner->banner_image_url}}"></td>

                        <td class="px-6 py-3 text-center">

                            <form action="{{route('admin.banner.update',$banner->id)}}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" name="selected" value="1" hidden>
                                <button type="submit"
                                        class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 m-1 border border-green-500 hover:border-transparent rounded">
                                    Select
                                </button>
                            </form>

                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('delete',$banner)
                                <form action="{{route('seller.food.destroy',$banner->id)}}"
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
                {{ $banners->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
