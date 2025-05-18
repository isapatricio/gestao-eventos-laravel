<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Palestras</title>
</head>
<body>
    <h1>Lista de Palestras</h1>

    <p><a href="{{ route('palestras.create') }}">+ Nova Palestra</a></p>

    @if($palestras->isEmpty())
        <p>Não existem palestras registadas.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Data e Hora</th>
                    <th>Local</th>
                    <th>Palestrante</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($palestras as $palestra)
                    <tr>
                        <td>{{ $palestra->titulo }}</td>
                        <td>{{ \Carbon\Carbon::parse($palestra->data_hora)->format('d/m/Y H:i') }}</td>
                        <td>{{ $palestra->local }}</td>
                        <td>{{ $palestra->palestrante }}</td>
                        <td>{{ ucfirst($palestra->estado) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
