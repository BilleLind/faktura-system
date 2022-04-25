<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body style="background-color: darkblue; color:aliceblue;">
    <form action="/faktura" method="post">
        @csrf
        <div>
            <h1>Valgt bruger: {{$user->navn}}</h1>
            <input type="text" name="id"  value="{{$user->id}}">
            <input type="text" name="navn"  value="{{$user->navn}}">
            <input type="text" name="addresse"  value="{{$user->addresse}}">
        </div>
        <br>
        <h2>Produkt Referencer: vælg 1-3</h2>
        <div>
            <select name="produkter[]" multiple>
                @foreach ($produkter as $item)
                <option value="{{$item->id}}">{{$item->id}}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit">
            Gem PDF
        </button>

    </form>
</body>

</html>