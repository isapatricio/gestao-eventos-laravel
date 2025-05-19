<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Palestras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Lista de Palestras</h1>
    <table>
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
            @foreach($palestras as $palestra)
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
</body>
</html>
