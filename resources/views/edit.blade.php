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

    <div class="container vh-100 w-50 d-flex">

        <form action="{{ route('update', $detailTransaction->id) }}" method="POST" class="my-auto w-100 border p-5">
            @csrf
            @method('PUT')
            <h3 class="text-center p-3">Edit Catatan Keuangan</h3>
            <div class="mb-3">
                <label for="desc" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="desc" name="desc" value="{{ $detailTransaction->desc }}">
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="num" class="form-control" id="nominal" name="nominal" value="{{ $detailTransaction->nominal }}">
            </div>
            <div class="mb-3">
                <label for="aruskas" class="form-label">Jenis Arus Kas</label>
                <select class="form-select" aria-label="Default select example" name="aruskas">
                    <option>Jenis Arus Kas</option>
                    <option value="income" {{ $detailTransaction->aruskas == 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="outcome"{{ $detailTransaction->aruskas == 'outcome' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-WyOxWvTyr1QaMPfiPJSv76iReVthorl5uWlFtZPyK0IEB0hGzo9y5Bp9mYanr8Bu" crossorigin="anonymous">
    </script>
</body>

</html>