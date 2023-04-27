<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create restaurant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('seller.restaurant.store')}}" method="post">
                @csrf

                <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">name</label>
                        <input type="text"
                               name="name"
                               id="@if(empty($errors->first('name'))) success @else error  @endif"
                               class="@if(empty($errors->first('name'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                                value="{{old('name')}}">
                                <p class="mt-2 text-sm @if(empty($errors->first('name'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('name')}}
                                </p>
                    </div>

                <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">restaurant category</label>
                        <select name="restaurant_category"
                                id="@if(empty($errors->first('restaurant_category'))) success @else error  @endif"
                                class="@if(empty($errors->first('restaurant_category'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif">

                            <option value="" disabled>select one ...</option>
                            @foreach($restaurant_categories as $restaurant_category)
                                <option value="{{$restaurant_category->id}}">{{$restaurant_category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">phone number</label>
                    <input type="text"
                           name="phone_number"
                           placeholder="021-12345678"
                           id="@if(empty($errors->first('phone_number'))) success @else error  @endif"
                           class="@if(empty($errors->first('phone_number'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('phone_number')}}">
                            <p class="mt-2 text-sm @if(empty($errors->first('phone_number'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('phone_number')}}
                            </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">address</label>
                    <input type="text"
                           name="address"
                           id="@if(empty($errors->first('address'))) success @else error  @endif"
                           class="@if(empty($errors->first('address'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('address')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('address'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('address')}}
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">account number</label>
                    <input type="text"
                           name="account_number"
                           placeholder=""
                           id="@if(empty($errors->first('account_number'))) success @else error  @endif"
                           class="@if(empty($errors->first('account_number'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('account_number')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('account_number'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('account_number')}}
                    </p>
                </div>





                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
