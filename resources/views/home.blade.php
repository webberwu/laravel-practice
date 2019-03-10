@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">今日星座運勢 - {{ $today->format('Y/m/d') }}</div>

                <div class="panel-body">
                    @foreach ($astros as $astro)
                        @if (($loop->index + 1) % 4 === 0)
                            <div class="row">
                        @endif

                        <div class="col-md-3 text-center">
                            <a class="btn" href="{{ route('astro.show', compact('astro')) }} ">{{ $astro->astro_name }}</a>
                        </div>

                        @if (($loop->index + 1) % 4 === 0)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
