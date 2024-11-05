<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Images</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        @foreach ($article->images as $image)
                            <img src="{{ Storage::url($image->image_url) }}" alt="Image"
                                style="width: 100px; height: auto; display: block;">
                        @endforeach
                    </td>
                    <td>{{ $article->created_at->format('Y-m-d H:i:s') }}</td>
                    <td><a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        @if (session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>

</body>

</html>
