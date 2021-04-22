@extends('layouts.app')
@section('content')
<div class="card-body">

    <form class="form-inline" action="{{ route('better.index') }}" method="GET">
        <select name="horse_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite arklį lažybinkų filtravimui:</option>
            @foreach ($horses as $horse)
            <option value="{{ $horse->id }}" 
                @if($horse->id == app('request')->input('horse_id')) 
                    selected="selected" 
                @endif>{{ $horse->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtruoti</button>
        <a class="btn btn-success" href={{ route('better.index') }}>Rodyti visus</a>
    </form>

    <table class="table m-5">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Statoma suma</th>
            <th>Pasirinkto arklio vardas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($betters as $better)
        <tr>
            <td>{{ $better->name }}</td>
            <td>{{ $better->surname }}</td>
            <td>{{ $better->bet }}</td>
            <td>{{ $better->horse->name }}</td>
            <td>
                <form action={{ route('better.destroy', $better->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('better.edit', $better->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure?')" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('better.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
