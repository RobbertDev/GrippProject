@foreach($pets as $pet)
    <div id="pet-{{ $pet->id }}" class="table-row">
        <div class="table-cell">{{ $pet->id }}</div>
        <div class="table-cell">{{ $pet->name }}</div>
        <div class="table-cell">{{ $pet->type }}</div>
        <div class="table-cell">{{ $pet->address }}</div>
        <div class="table-cell py-2">
            <button pet-id="{{ $pet->id }}" class="destroy-pet py-2 px-4 font-bold leading-none bg-red-500 hover:bg-red-500/90 text-white rounded-lg">
                Delete
            </button>
        </div>
    </div>
@endforeach
