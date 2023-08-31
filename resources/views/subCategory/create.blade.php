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

<h1>Create SubCategory</h1>

<div class="row justify-content-center">
    <div class="col-md-3">
        
        <form class="border border-primary p-5 mt-5" method="post" action="{{ route('subCategory.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="" class="form-label">Code</label>
                <input type="text" name="code"  class="form-control" placeholder="code" required>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Choose Category</label>
                
                <select class="form-select" name="category_id" aria-label="Default select example">
                    @foreach ($categories as $row)
                        <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                    @endforeach
                </select>

            </div>


            <div class="mt-2">
                <label for="" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
            </div>

            <div class="mt-2">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
           
            <div class="mt-2">
                <label for="" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" placeholder="Photo" >
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary " >Save</button>
            </div>


        </form>
    </div>
</div>
    
</body>
</html>