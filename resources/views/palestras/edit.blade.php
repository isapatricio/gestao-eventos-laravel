<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Nova Palestra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Nova Palestra</h1>

        <form action="{{ route('palestras.store') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="palestrante" class="form-label">Palestrante</label>
                <input type="text" name="palestrante" class="form-control" required>
            </div>

            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"></textarea>
            </div>

            <div class="col-md-6">
                <label for="data_hora" class="form-label">Data e Hora</label>
                <input type="datetime-local" name="data_hora" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="local" class="form-label">Local</label>
                <input type="text" name="local" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="agendada">Agendada</option>
                    <option value="realizada">Realizada</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('palestras.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
