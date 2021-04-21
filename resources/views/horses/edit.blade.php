@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime arklio informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('horse.update', $horse->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Arklio vardas</label>
                            <input type="text" name="name" class="form-control" value="{{ $horse->name }}">

                            @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="">Dalyvautų rungtynių skaičius</label>
                            <input type="text" name="runs" class="form-control" value="{{ $horse->runs }}">

                            @error('runs')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="">Laimėtų rungtynių skaičius</label>
                            <input type="text" name="wins" class="form-control" value="{{ $horse->wins }}">

                            @error('wins')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label for="">Aprašymas</label>
                            <textarea id="mce" type="text" name="about" rows=10 cols=100
                                class="form-control">{{ $horse->about }}</textarea>

                            @error('about')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
