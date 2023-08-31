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
    <h1>Add New Categories</h1>
    <div>
        From Category controller
    </div>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('category.index') }}" class="text-lg text-blue-700 dark:text-gray-500 underline">All Categories</a>

                        <form class="border border-primary p-5 mt-5" method="post" action="{{ route('category.store' )}}" enctype="multipart/form-data">
                            @csrf
                          
                            <div class="mt-2">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror"   :value="old('category_name')" placeholder="Category Name" >
                            </div>
                            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />                          
                        
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary " >Submit</button>
                            </div>


                        </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>