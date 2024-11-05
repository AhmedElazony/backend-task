<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="form-control" action="{{ route('articles.update', $article->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Enter Title:</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ $article->title }}">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="images">Enter Images</label>
        <input class="form-control" type="file" name="images[]" id="images" multiple>
        @error('images.*')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary">Submit form</button>
    </form>
    <div>
        @if (session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>
</body>

</html>
