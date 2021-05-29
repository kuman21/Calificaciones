@props(['search'])

<div class="py-12">
    <div class="max-w-7xl mx-auto mb:5 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="bg-white px-4 py-3 sm:px-6 border-b border-gray-200">
                                {{ $cardHead }}
                            </div>

                            <div class="mt-2 px-4 py-3 sm:px-6 flex justify-between bg-white">
                                <select wire:model="perPage" class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-1/10 appearance-none text-gray-500 text-sm">
                                    <option value="10">10 por página</option>
                                    <option value="25">25 por página</option>
                                    <option value="50">50 por página</option>
                                    <option value="100">100 por página</option>
                                </select>
                
                                <x-jet-input type="search" class="block w-1/4" 
                                             wire:model="search"
                                             {{--value="{{ $search }}"--}}
                                             placeholder="Buscar..." />
                            </div>

                            {{ $slot }}

                            <div class="bg-white px-4 py-3 border-t sm:px-6 border-gray-200">
                                {{ $cardFooter }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>