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
    <h1>Update Categories</h1>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('category.index') }}" class="text-lg text-blue-700 dark:text-gray-500 underline">All Categories</a>

                        <form class="border border-primary p-5 mt-5" method="post" action="{{ route('category.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                          
                            <div class="mt-2">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control" 
                                  value="{{ $data->category_name }}" required>
                            </div>
                        
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary " >Update</button>
                            </div>


                        </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>