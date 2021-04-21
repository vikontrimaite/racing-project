@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime lažybininką:</div>
               <div class="card-body">
                   <form action="{{ route('better.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                            <label for="">Vardas</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                            @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="">Pavardė</label>
                            <input type="text" name="surname" class="form-control" value="{{ old('surname') }}">

                            @error('surname')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="">Statoma suma</label>
                            <input type="number" name="bet" class="form-control" value="{{ old('bet') }}">

                            @error('bet')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                       <div class="form-group">
                           <label>Pasirinkto arklio vardas</label>
                           <select name="horse_id" id="" class="form-control">
                                <option value="" selected disabled>Pasirinkite arklį</option>
                                @foreach ($horses as $horse)
                                <option value="{{ $horse->id }}">{{ $horse->name }}</option>
                                @endforeach
                           </select>
                       </div>
                       <button type="submit" class="btn btn-primary">Pridėti</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
