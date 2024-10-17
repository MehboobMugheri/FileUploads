<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File update</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('user.update' , $file->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-center">File Upload</h2>
           <div class="col-2">
            <img id="output" class="img-fluid img-thumbnail"  src="{{ asset('/storage/' . $file->file ) }}" alt="">
           </div>
            <div class="col-lg-10">
                <input type="file" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="file">
                @error('file')
                    <div class="alert bg-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                {{-- <button class="btn btn-primary mt-3" type="submit">File Update</button> --}}
                <input type="submit" value="update" class="btn btn-primary mt-3">
                
            </div>
        </form>
    </div>
    </div>

    

    <script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>