@extends('layouts.app')
@section('content')
<div class="card-body">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    
    <table class="table">
        <tr>
            <th>Arklio vardas</th>
            <th>Dalyvautų rungtynių skaičius</th>
            <th>Laimėtų rungtynių skaičius</th>
            <th>Aprašymas</th>
        </tr>
        @foreach ($horses as $horse)
        <tr>
            <td>{{ $horse->name }}</td>
            <td>{{ $horse->runs }}</td>
            <td>{{ $horse->wins }}</td>
            <td>{!! $horse->about !!}</td>
            <td>
                <form action={{ route('horse.destroy', $horse->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('horse.edit', $horse->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure?')" value="Trinti" />
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('horse.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
