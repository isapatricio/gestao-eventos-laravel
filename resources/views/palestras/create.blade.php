<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Nova Palestra</title>
</head>
<body>
    <h1>Nova Palestra</h1>

    <form action="{{ route('palestras.store') }}" method="POST">
        @csrf

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label for="data_hora">Data e Hora:</label><br>
        <input type="datetime-local" name="data_hora" required><br><br>

        <label for="local">Local:</label><br>
        <input type="text" name="local" required><br><br>

        <label for="palestrante">Palestrante:</label><br>
        <input type="text" name="palestrante" required><br><br>

        <label for="estado">Estado:</label><br>
        <select name="estado" required>
            <option value="agendada">Agendada</option>
            <option value="realizada">Realizada</option>
            <option value="cancelada">Cancelada</option>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>

    <p><a href="{{ route('palestras.index') }}">← Voltar à lista</a></p>
</body>
</html>
