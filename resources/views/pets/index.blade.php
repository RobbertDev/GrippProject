@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap sm:flex-nowrap justify-between w-full bg-blue/10 py-4">
        <div class="flex-col w-1/2 sm:1/4 justify-center items-center text-center">
            <h3 class="text-lg font-bold">Number of dogs</h3>
            <span class="font-bold text-4xl text-blue">{{ $pets->where('type', 'dog')->count() }}</span>
        </div>
        <div class="flex-col w-1/2 sm:1/4 justify-center items-center text-center">
            <h3 class="text-lg font-bold">Number of cats</h3>
            <span class="font-bold text-4xl text-blue">{{ $pets->where('type', 'cat')->count() }}</span>
        </div>
        <div class="flex-col w-1/2 sm:1/4 justify-center items-center text-center">
            <h3 class="text-lg font-bold">Number of fishes</h3>
            <span class="font-bold text-4xl text-blue">{{ $pets->where('type', 'fish')->count() }}</span>
        </div>
        <div class="flex-col w-1/2 sm:1/4 justify-center items-center text-center">
            <h3 class="text-lg font-bold">Number of rabbits</h3>
            <span class="font-bold text-4xl text-blue">{{ $pets->where('type', 'rabbit')->count() }}</span>
        </div>
    </div>
    <div class="py-16 px-4 w-full sm:w-1/2 m-auto">
        <form id="create-pet-form" class="flex flex-col">
            <div class="flex">
                <input class="bg-gray-200 rounded-lg px-4 py-3 mb-4 w-1/2 mr-2" name="name" type="text" placeholder="Pet nam">
                <select class="bg-gray-200 rounded-lg px-4 py-3 mb-4 w-1/2" name="type" id="type">
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="fish">Fish</option>
                    <option value="rabbit">Rabbit</option>
                </select>
            </div>
            <input class="bg-gray-200 rounded-lg px-4 py-3 mb-4" type="text" name="address" placeholder="Your addres">
            <small class="text-blue mb-2" id="error-message">&nbsp;</small>
        </form>
        <button id="create-pet" class="py-3 px-4 font-bold leading-none bg-orange hover:bg-orange/90 text-white rounded-lg">
            Add a pet
        </button>
    </div>
    <div class="flex flex-col py-16 px-4 w-full sm:w-1/2 m-auto">
        <div class="table w-full">
            <div class="table-header-group">
                <div class="table-row">
                    <div class="table-cell text-left">#</div>
                    <div class="table-cell text-left">Name</div>
                    <div class="table-cell text-left">Type of pet</div>
                    <div class="table-cell text-left">Address</div>
                    <div class="table-cell text-left">Actions</div>
                </div>
            </div>
            <div id="overview-content" class="table-row-group">
                @include('pets.overview')
            </div>
        </div>
    </div>
@stop
