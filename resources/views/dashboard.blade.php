<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="w-1/2 mt-3 mx-auto">
                <a href="{{route('seller.cart.index')}}" class="mx-2">
                    <button type="submit"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 m-1 border border-blue-500 hover:border-transparent rounded">
                        foods order
                    </button>
                </a>
            </div>
    </div>
</x-app-layout>
