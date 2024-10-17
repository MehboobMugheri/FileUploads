<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-center">File Upload</h2>
                <input type="file" class="form-control" name="file" accept=".jpg,.jpeg,.png">
                @error('file')
                    <div class="alert bg-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                <button class="btn btn-primary mt-3">File Upload</button>
            </form>
        </div>
    </div>
    <div class="row">
    @foreach ($files as $file )
    <div class="col-2">
            <img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $file->file) }}" alt="">
            <form action="{{ route('user.destroy', $file->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('user.edit', $file->id) }}" class="btn btn-warning">Update</a>
        </div>
        @endforeach
    </div>
    </div>

    

    <script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>