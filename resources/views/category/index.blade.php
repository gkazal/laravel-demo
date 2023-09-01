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
    <h1>All Categories</h1>
    <div>
        From Category controller
    </div>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-info mb-2">Add Category</a>
                        <a href="{{ route('subCategory.index') }}" class="btn btn-sm btn-info mb-2">All SubCategory</a>



                        <div>
                            <table class="table table-responsive table-strioe"> 
                                @if(Session::has('msg'))
                                 <p class="alert alert-success">{{ Session::get('msg')}}</p>

                                @endif
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>   
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>

                            </thead>
                            <tbody>
                                
                                @foreach($category as $categories)
                                        <tr>
                                            <td>{{$categories->id}}</td>
                                            <td>{{$categories->category_name}}</td>
                                            <td>{{$categories->category_slug}}</td>                                           

                                            <td>
                                                <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-sm btn-info">edit</a>
                                                <a href="{{ route('category.delete', $categories->id) }}" class="btn btn-sm btn-danger"
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