<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>
<body>

<h1>Edit Product</h1>

<div class="row justify-content-center">
    <div class="col-md-3">
        
        <form class="border border-primary p-5 mt-5" method="post" action="{{route('update', $product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div>
                <label for="" class="form-label">Code</label>
                <input type="text" name="code" value="{{ $product->code }}"  class="form-control" placeholder="code" required>
            </div>
            <div class="mt-2">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="name" required>
            </div>
            <div class="mt-2">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price" required>
            </div>
            <div class="mt-2"> 
                <label for="" class="form-label">Category</label>
                <input type="text" name="category" value="{{ $product->category }}" class="form-control" placeholder="Category" required>
            </div>
            <div class="mt-2">
                <label for="" class="form-label">Photo</label>
                <img style="width: 60px;" src="{{ asset('images/products/'.$product->Photo) }}" alt="">
                <input type="file" name="photo"  class="form-control" placeholder="Photo" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary " >Save</button>
            </div>


        </form>
    </div>
</div>
    
</body>
</html>