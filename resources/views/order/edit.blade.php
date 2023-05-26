<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('seller.order.update',$order->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')


                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">status order</label>
                    <select name="status_order"
                            id="@if(empty($errors->first('status'))) success @else error  @endif"
                            class="@if(empty($errors->first('status'))) bg-green-50 border border-green-500 text-black dark:text-white placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                        <option value="{{$order->status}}" disabled>select one ...</option>
                        <option value="pending">pending</option>
                        <option value="preparation">preparation</option>
                        <option value="send to destination">send to destination</option>
                        <option value="delivered">delivered</option>

                    </select>
                </div>



                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
