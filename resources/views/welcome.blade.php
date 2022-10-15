<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Joy's Url shortner</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </head>

{{--    Body--}}

    <body>
    <div class="container mt-2 shadow w-50">
        <h5 class="mt-5 text-center  fs-6 fw-normal text-info text-uppercase">Welcome to Joy's Link shortner</h5>
        @if(session('success_message'))
            {!! session('success_message') !!}
        @endif
        <form action="{{ route('short.url') }}" method="POST" class="text-center mt-3">
            @csrf
            <input type="url" name="url" class="rounded-1 border-1 mb-3">
            @error('url')
                <span>{{$message}}</span>
            @enderror
            <button type="submit" class="btn btn-success btn-sm mb-1  ms-2 opacity-75">Shorter</button>
        </form>
    </div>

    </body>
</html>
