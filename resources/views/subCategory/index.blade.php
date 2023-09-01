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
    <h1>All Subcategory</h1>
    
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            <a href="{{ route('category.index') }}" class="btn btn-sm btn-info mb-2">All Category</a>
            <a href="{{ route('subCategory.create') }}" class="btn btn-sm btn-info mb-2">Add SubCategory</a>


                <div class="card">
                    <div class="card-body">
                        <div>
                            <table class="table table-responsive table-strioe"> 
                                @if(Session::has('msg'))
                                 <p class="alert alert-success">{{ Session::get('msg')}}</p>

                                @endif
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody>                             
                                @foreach($subCategory as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->code}}</td>
                                            <!-- SubCategory model theke join kore aita paice -->
                                            <td>{{$data->category->category_name}}</td>
                                            <td>{{$data->product_name}}</td>
                                            <td>{{$data->price}}</td>
                                            <td>
                                                <img style="width: 60px;" src="{{ asset('images/products/'.$data->Photo) }}" alt="">
                                            </td>

                                            <td>
                                                <a href="{{ route('subCategory.edit', $data->id) }}" class="btn btn-sm btn-info">edit</a>

                                                <a href="{{ route('subCategory.delete', $data->id) }}" class="btn btn-sm btn-danger"
                                                 onclick="return confirm('Are You sure want to delete..?')" >delete</a>                                               
                                            </td>
                                        </tr>

                                 @endforeach
                            </tbody>

                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>