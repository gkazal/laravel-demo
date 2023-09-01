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

<h1>Edit SubCategory</h1>

</div>
        
        <form class="border border-primary p-5 mt-5" method="post" action="{{route('subCategory.update', $data->id) }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="" class="form-label">Code</label>
                <input type="text" name="code"  class="form-control" placeholder="code" value="{{ $data->code }}" required>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Choose Category</label>
                
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option value="0">Please Select Category</option>
                    @foreach ($categories as $row)
                        <option value="{{ $row->id }}" @if($row->id == $data->category_id) selected @endif > {{ $row->category_name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <label for="" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{ $data->product_name }}" required>
            </div>

            <div class="mt-2">
                <label for="" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $data->price }}"  required>
            </div>
           
            <div class="mt-2">
                <label for="" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" placeholder="Photo" value="{{ $data->Photo }}"  >
                <img style="width: 60px;" src="{{ asset('images/products/'.$data->Photo) }}" alt="">

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary " >Edit</button>
            </div>
            


        </form>
        
    </div>
</div>
    
</body>
</html>