<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> Hello, {{ $name }} </h1>
    <form action="view1" method="post">
        @csrf

        <input type="text" name="name" id="name">
        <select name="" id="">
            @foreach ($lang as $key => $lan)
                <option value="{{ $key }}">{{ $lan }}</option>
            @endforeach
        </select>
        <input type="submit" name="send" id="">
    </form>
</body>

</html>
