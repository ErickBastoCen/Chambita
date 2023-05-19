@props(['messages'])

@if ($messages)
    {{-- <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}> --}}
    {{-- space-y-2: separa cada msj de error --}}
    <ul class="mt-3 list-none text-sm space-y-2">
        @foreach ((array) $messages as $message)
            {{-- <li>{{ $message }}</li> --}}
            {{-- border-l-4: border de lado izq --}}
            {{-- p-4: padding en todas las dirreciones --}}
            <li class="bg-red-100 border-l-4 border-red-600 text-red-600 font-bold p-3">{{ $message }}</li>
        @endforeach
    </ul>
@endif