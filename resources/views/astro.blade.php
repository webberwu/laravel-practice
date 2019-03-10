@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $astro->astro_name }} - {{ $astro->day->format('Y/m/d') }}</div>

                <div class="panel-body">
                    <p>
                        <strong>整體運勢</strong> -
                        <span class="text-primary">{{ str_repeat('★', $astro->overall_star) }}{{ str_repeat('☆', 5 - $astro->overall_star) }}</span><br>
                        {{ $astro->overall_content }}
                    </p>
                    <hr>

                    <p>
                        <strong>愛情運勢</strong> -
                        <span class="text-primary">{{ str_repeat('★', $astro->love_star) }}{{ str_repeat('☆', 5 - $astro->love_star) }}</span><br>
                        {{ $astro->love_content }}
                    </p>
                    <hr>

                    <p>
                        <strong>事業運勢</strong> -
                        <span class="text-primary">{{ str_repeat('★', $astro->career_star) }}{{ str_repeat('☆', 5 - $astro->career_star) }}</span><br>
                        {{ $astro->career_content }}
                    </p>
                    <hr>

                    <p>
                        <strong>財運運勢</strong> -
                        <span class="text-primary">{{ str_repeat('★', $astro->money_star) }}{{ str_repeat('☆', 5 - $astro->money_star) }}</span><br>
                        {{ $astro->money_content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
