@extends('layouts.app')
@section('content')
<div class="container">
    
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pridėkime naują arklį:</div>
                <div class="card-body">
                    <form action="{{ route('horse.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Arklio vardas</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                            @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Dalyvautų rungtynių skaičius</label>
                            <input type="number" name="runs" class="form-control" value="{{ old('runs') }}">

                            @error('runs')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Laimėtų rungtynių skaičius</label>
                            <input type="number" name="wins" class="form-control" value="{{ old('wins') }}">

                            @error('wins')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label>Aprašymas</label>
                            <textarea id="mce" name="about" rows=10 cols=100 class="form-control" value="{{ old('about') }}"></textarea>

                            @error('about')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Pridėti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
