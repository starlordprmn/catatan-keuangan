<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert">
        <strong> {{ session('success') }} </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h3 class="text-center m-5">CATATAN KEUANGAN</h3>
    <div class="container m-5">
        <a href="{{ route('create') }}" class="btn btn-outline-primary mb-3">Tambah Catatan</a>
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Arus Kas</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $transaction->desc }}</td>
                    <td>{{ $transaction->aruskas }}</td>
                    <td>{{ $transaction->aruskas == 'income' ? '+ Rp. ' . number_format($transaction->nominal) : '- Rp.
                        ' . number_format($transaction->nominal) }}</td>
                    <td class="d-flex">
                        <a href="{{ route('edit', $transaction->id) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('destroy', $transaction->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
            
                            <button class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th colspan="3">Total</th>
                <th colspan="2">Rp. {{ number_format($total) }}</th>
            </tfoot>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-WyOxWvTyr1QaMPfiPJSv76iReVthorl5uWlFtZPyK0IEB0hGzo9y5Bp9mYanr8Bu" crossorigin="anonymous">
    </script>
</body>

</html>