@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Lažybininkai & Arkliai') }}</div>
                <h1 class="text-center m-5">
                    Sveiki atvykę į lažybų puslapį!
                </h1>
                @guest
                <ul class="text-center m-2">
                    Prisijunkite:
                    <li class="text-center">E-mail: admin@a.com</li>
                    <li class="text-center">Password: pass</li>
                </ul>
                @endguest

                @auth
                
                    <p class="text-center">
                        Pasirinkite, ką norite matyti:
                    </p>
                        <ul class="text-center m-2">
                            <li class="text-center">
                                <a href="{{ route('horse.index') }}">Arkliai</a>
                            </li>
                            <li class="text-center">
                                <a href="{{ route('better.index') }}">Lažybininkai</a>
                            </li>
                        </ul>
                @endauth


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>

        <div class="container">

        </div>



    </div>
</div>
@endsection
