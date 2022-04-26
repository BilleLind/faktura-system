<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <style type="text/css" media="all">
        html,
        body {
            width: 210mm;
            height: 297mm;
        }

        .row {
            display: flex;
            flex-direction: row;

        }

    </style>
</head>

<body>
    <div>
        <ul>
            <li>Navn: {{$navn}}</li>
            <li>Addresse: {{$addresse}}</li>
            {{-- {{json_encode($user)}} --}}

        </ul>
    </div>

    <table class="table-layout: auto;">
        <thead>
            <th>#</th>
            <th>titel</th>
            <th>pris</th>
            <th>kvantitet</th>
        </thead>
        <tbody>
            @foreach ($produkter as $produkt)
            <tr>
                <td>{{$produkt->id}}</td>
                <td>{{$produkt->titel}}</td>
                <td>{{$produkt->pris}}</td>
                <td>{{$produkt->pivot->kvantitet}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <p>status: {{$ordre->status}}</p>
        <p>total_pris: {{$ordre->total_pris}}</p>
        <p>moms: {{$ordre->moms}}</p>
        <p>fragt: {{$ordre->fragt}}</p>
    </div>


</body>

</html>