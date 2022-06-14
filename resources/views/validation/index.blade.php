<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/test/validation/import" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" value="{{ old('name') }}" name="name" class="@error('name') is-invalid @enderror">
        <label for="email">Email</label>
        <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        <button class="" type="submit">Summit</button>
    </form>
</body>

</html>
