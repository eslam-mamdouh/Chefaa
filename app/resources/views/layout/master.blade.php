<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Chefaa Task</title>
</head>
<body>
    <div class="container text-center">
        <header class="text-center mt-2">
            <h1 class="alert alert-primary"> Chefaa Task</h1>
        </header>

        <div>
            <a class="btn btn-success m-2" href="{{route('products.index')}}">Products</a>
            <a class="btn btn-success m-2" href="{{route('pharmacies.index')}}">Pharmacies</a>
        </div>
        <div>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#search">
                Run Search API
            </button>
        </div>
        <div class="row mt-3">

            @yield('content')
        </div>
        
    </div>
    <!-- The Modal -->
<div class="modal" id="search">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search For Product By Name</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="/api/products/search" method="POST" class="m-auto">
                @csrf
                <div class="form-group">
                    <label class="float-left">Search By Name :</label>
                    <input type="text" name="words" required class="form-control" placeholder="Type Here...">
                </div>

                <button class="btn btn-success">Search</button>
            </form>
        </div>
  
        <!-- Modal footer -->
  
      </div>
    </div>
  </div>

</body>
</html>