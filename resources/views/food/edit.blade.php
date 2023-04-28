<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('seller.food.update',$food->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">name</label>
                    <input type="text"
                           name="name"
                           id="@if(empty($errors->first('name'))) success @else error  @endif"
                           class="@if(empty($errors->first('name'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{$food->name}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('name'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('name')}}
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">food category</label>
                    <select name="food_category"
                            id="@if(empty($errors->first('food_category'))) success @else error  @endif"
                            class="@if(empty($errors->first('food_category'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                        <option value="{{$food->foodCategory->name}}" disabled>select one ...</option>
                        @foreach($food_categories as $food_category)
                            <option value="{{$food_category->id}}">{{$food_category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">materials</label>
                    <input type="text"
                           name="material"
                           placeholder="021-12345678"
                           id="@if(empty($errors->first('material'))) success @else error  @endif"
                           class="@if(empty($errors->first('material'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{$food->materials}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('material'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('material')}}
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">price</label>
                    <input type="text"
                           name="price"
                           id="@if(empty($errors->first('price'))) success @else error  @endif"
                           class="@if(empty($errors->first('price'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{$food->price}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('price'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('price')}}
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">coupon</label>
                    <select name="coupon"
                            id="@if(empty($errors->first('coupon'))) success @else error  @endif"
                            class="@if(empty($errors->first('coupon'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                        <option value="{{$food->coupon->code}}" disabled>select one ...</option>
                        @foreach($coupons as $coupon)
                            <option value="{{$coupon->id}}">{{$coupon->code}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">food party</label>
                    <select name="food_party"
                            id="@if(empty($errors->first('food_party'))) success @else error  @endif"
                            class="@if(empty($errors->first('food_party'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                        <option value="" disabled>select one ...</option>
                        @foreach($food_parties as $food_party)
                            <option value="{{$food_party->id}}">{{$food_party->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">restaurant</label>
                    <select name="restaurant"
                            id="@if(empty($errors->first('restaurant'))) success @else error  @endif"
                            class="@if(empty($errors->first('restaurant'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                        <option value="" disabled>select one ...</option>
                        @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
                </div>





                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
