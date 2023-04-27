<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit food category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('admin.food_categories.update',$foodCategory->id)}}" method="post">

                @csrf
                @method('put')

                <div class="mb-6">
                    <h2 class="text-center text-blue-700 text-3xl"> create food category</h2>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">name</label>
                        <input type="text"
                               name="name"
                               id="@if(empty($errors->first('name'))) success @else error  @endif"
                               class="@if(empty($errors->first('name'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                           @endif"
                               value="{{$foodCategory->name}}">
                        <p class="mt-2 text-sm @if(empty($errors->first('name'))) text-green-600 dark:text-green-500
                 @else text-red-600 dark:text-red-500 @endif">{{$errors->first('name')}}</p>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    submit
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
