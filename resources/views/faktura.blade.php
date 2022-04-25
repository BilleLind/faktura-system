<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body style="background-color: darkblue; color:aliceblue;">
    <form action="/faktura" method="post">
        @csrf
        <div>
            <h1>Valgt bruger: {{$user->navn}}</h1>
            <input type="text" name="id" value="{{$user->id}}">
            <input type="text" name="navn" value="{{$user->navn}}">
            <input type="text" name="addresse" value="{{$user->addresse}}">
        </div>
        <br>
        <h2>Produkt Referencer: vælg 1-3</h2>
        {{-- div>
        <select name="produkter[]" multiple>
            @foreach ($produkter as $item)
            <option value="{{$item->id}}">{{$item->titel}}</option>
            @endforeach
        </select>
        @foreach ($produkter as $kvanitet)
        <label for="{{$kvanitet->id}}">{{$kvanitet->titel}}</label>
        <input type="number" value="1" name="{{$kvanitet->id}}" id="">
        @endforeach
        </div> --}}

        <table id="produkt_table">
            <thead>
                <tr>#</tr>
                <tr>Titel</tr>
                <tr>Pris</tr>
                <tr>Kvantitet</tr>
            </thead>
            <tbody>
                <tr id="produkt0">
                    <td>
                        <select name="produkter[]">
                            <option value="">Vælg Produkt</option>
                            @foreach ($produkter as $produkt)
                            <option value="{{ $produkt->id }}">
                                {{ $produkt->titel }} {{ number_format($produkt->pris, 2) }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="kvantitet[]" value="1" />
                    </td>
                </tr>
                <tr id="produkt1"></tr>
            </tbody>
        </table>
        <div>
            <button type="button" id="tilføj">Tilføj række</button>
            <button type="button" id="fjern">fjern række</button>
        </div>

        <button type="submit" id="submit">
            Gem PDF
        </button>

    </form>

    <script>
        $(document).ready(function(){
        let row_number = 1;
        $("#tilføj").click(function(e){
        e.preventDefault();
        let new_row_number = row_number - 1;
        $('#produkt' + row_number).html($('#produkt' + new_row_number).html()).find('td:first-child');
        $('#produkt_table').append('<tr id="produkt' + (row_number + 1) + '"></tr>');
        row_number++;
        });
        
        $("#fjern").click(function(e){
        e.preventDefault();
        if(row_number > 1){
        $("#produkt" + (row_number - 1)).html('');
        row_number--;
        }
        });
        });
    </script>
</body>

</html>