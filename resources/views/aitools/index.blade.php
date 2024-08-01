@extends('layout')
@section('content')
    <h1 class="text-4xl font-bold mb-10">Ai Toolok</h1>
    <a class="bg-slate-800 p-3 rounded-md" href="{{route('aitools.create')}}">Létrehozás</a>
    @if (session('success'))
        <div class="bg-orange-200 text-black p-5 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-white">
        <ul>
            @foreach ($aitools as $aitool)
            <div class="grid grid-cols-4 w-full gap-2 items-center">
                <div>
                    <li class="text-2xl font-bold">{{ $aitool->name }}</li>
                </div>
         
                <a class="bg-slate-800 p-3 rounded-md" href="{{route('aitools.show', $aitool->id)}}">Megjelenítés</a>
                <a class="bg-slate-800 p-3 rounded-md" href="{{route('aitools.edit', $aitool->id)}}">Szerkesztés</a>
                <form action="{{route('aitools.destroy', $aitool->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-950 p-3 rounded-md" type="submit" onclick="return confirm('Törölni szeretnéd?')">Törlés</button>
                </form>
            </div>
            @endforeach
        </ul>
    </div>
@endsection
