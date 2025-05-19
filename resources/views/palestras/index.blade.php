<!DOCTYPE html>
<html lang="pt">
<head>
 <head>
    <meta charset="UTF-8">
    <title>Lista de Palestras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">Lista de Palestras</h1>

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('palestras.create') }}" class="btn btn-primary">+ Nova Palestra</a>
            <a href="{{ route('palestras.pdf') }}" class="btn btn-outline-secondary" target="_blank">📄 Exportar PDF</a>
        </div>

        {{-- Filtros --}}
        <form method="GET" action="{{ route('palestras.index') }}" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-select">
                    <option value="">-- Todos --</option>
                    <option value="agendada" {{ request('estado') == 'agendada' ? 'selected' : '' }}>Agendada</option>
                    <option value="realizada" {{ request('estado') == 'realizada' ? 'selected' : '' }}>Realizada</option>
                    <option value="cancelada" {{ request('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="local" class="form-label">Local</label>
                <input type="text" name="local" value="{{ request('local') }}" class="form-control">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-success me-2">Filtrar</button>
                <a href="{{ route('palestras.index') }}" class="btn btn-secondary">Limpar</a>
            </div>
        </form>

        @if($palestras->isEmpty())
            <div class="alert alert-warning">Não existem palestras registadas.</div>
        @else
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Data e Hora</th>
                        <th>Local</th>
                        <th>Palestrante</th>
                        <th>Estado</th>
                        <th>Ações</th>
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
                            <td>
                                <a href="{{ route('palestras.edit', $palestra->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('palestras.destroy', $palestra->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Tens a certeza que queres eliminar esta palestra?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>\
            </table>

            {{ $palestras->links('pagination::bootstrap-5') }}
        @endif
    </div>
</body>
</html>
