<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('set banner web site') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <h2 class="text-center text-blue-700 text-3xl"> set image banner</h2>

                    <div class="mb-6">
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
                        <p class="mt-2 text-sm @if(empty($errors->first('image'))) text-green-600 dark:text-green-500
                 @else text-red-600 dark:text-red-500 @endif">{{$errors->first('image')}}</p>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    submit
                </button>
            </form>
            @if(Session::has('message'))
                <p class="text-green-500">{{ Session::get('message') }}</p>
            @endif

        </div>
    </div>
</x-app-layout>
