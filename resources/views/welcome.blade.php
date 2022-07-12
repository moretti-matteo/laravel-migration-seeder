<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css\app.css')}}">
</head>

<body>
    <div class="container">
        @foreach ($trains as $train)
            <div class="card">
                <h2>Azienda: {{ $train->azienda }}</h2>
                <h3>Partenza: {{$train->data_partenza}} - {{ $train->stazione_partenza }} - {{ $train->orario_partenza }}</h3>
                <h3>Arrivo: {{ $train->stazione_arrivo }} - {{ $train->orario_arrivo }}</h3>
                <h3>Codice treno: {{ $train->codice_treno }}</h3>
                <h3>
                    @if ($train->in_orario and $train->cancellato == false)
                        treno in orario
                    @elseif($train->in_orario == false and $train->cancellato == false)
                        treno in ritardo
                    @else
                        treno cancellato
                    @endif
                </h3>

            </div>
        @endforeach
    </div>
</body>

</html>
