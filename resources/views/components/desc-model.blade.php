@props(['modelData'])

@php
    switch (class_basename($this->modelData)) {
        case 'Room':
            $img = $this->modelData->img;
            $modelType = 'Habitacion';
            $title = $this->modelData->name;
            break;
        case 'Gallery':
            $img = $this->modelData->img;
            $modelType = 'Galeria';
            $title = $this->modelData->name;
            break;

        default:
            // code...
            break;
    }
@endphp
<div>

    <div class="flex items-center gap-x-4">
        @if ($img)
            <div>
                <img src="{{ $img }}" class="h-20 w-20 object-cover rounded-md" alt="img card">
            </div>
        @endif
        <div>
            <h4 class="text-xl font-semibold">{{ $modelType }}</h4>
            <span class="text-lg">{{ $title }}</span>
        </div>
    </div>
</div>
