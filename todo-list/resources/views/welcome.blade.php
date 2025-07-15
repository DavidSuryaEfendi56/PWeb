<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📝 To-Do List</h4>
          </div>

          <div class="card-body">
            {{-- Flash message --}}
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            {{-- Form tambah tugas --}}
            <form action="{{ route('tasks.store') }}" method="POST" class="d-flex mb-4">
              @csrf
              <input type="text" name="title" class="form-control me-2" placeholder="Tugas baru..." required>
              <button class="btn btn-primary" type="submit">Tambah</button>
            </form>

            {{-- Daftar tugas --}}
            @if($tasks->count())
              <ul class="list-group">
                @foreach ($tasks as $task)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="{{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                      {{ $task->title }}
                    </div>
                    <div class="btn-group">
                      {{-- Toggle status --}}
                      <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-sm btn-outline-success" type="submit">
                          {{ $task->is_completed ? '↩️' : '✔️' }}
                        </button>
                      </form>

                      {{-- Hapus tugas --}}
                      <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" type="submit">🗑️</button>
                      </form>
                    </div>
                  </li>
                @endforeach
              </ul>
            @else
              <p class="text-center text-muted">Belum ada tugas.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Bootstrap JS (opsional, untuk komponen interaktif) --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
