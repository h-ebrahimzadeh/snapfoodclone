<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create coupon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('seller.coupon.store')}}" method="post">
                @csrf

                <div class="mb-6">

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">code</label>
                        <input type="text"
                               name="code"
                               id="@if(empty($errors->first('code'))) success @else error  @endif"
                               class="@if(empty($errors->first('code'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif"
                               value="{{old('code')}}">
                        <p class="mt-2 text-sm @if(empty($errors->first('code'))) text-green-600 dark:text-green-500
                 @else text-red-600 dark:text-red-500 @endif">{{$errors->first('code')}}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">ends at</label>
                        <input type="date"
                               name="ends_at"
                               id="@if(empty($errors->first('ends_at'))) success @else error  @endif"
                               class="@if(empty($errors->first('ends_at'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif"
                               value="{{old('ends_at')}}">
                        <p class="mt-2 text-sm @if(empty($errors->first('ends_at'))) text-green-600 dark:text-green-500
                 @else text-red-600 dark:text-red-500 @endif">{{$errors->first('ends_at')}}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">discount</label>
                        <input type="text"
                               name="discount"
                               id="@if(empty($errors->first('discount'))) success @else error  @endif"
                               class="@if(empty($errors->first('discount'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif"
                               value="{{old('discount')}}">
                        <p class="mt-2 text-sm @if(empty($errors->first('discount'))) text-green-600 dark:text-green-500
                 @else text-red-600 dark:text-red-500 @endif">{{$errors->first('discount')}}</p>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    submit
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
