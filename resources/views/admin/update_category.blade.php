<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
    input[type="text"]
    {
        color: black;
        width: 300px;
        height: 40px;
        border-radius: 5px;
        padding-left: 10px;
    }
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
    }
    .table_deg
    { 
        text-align: center;
        margin: auto;
        border: 1px solid white;
        margin-top: 50px;
        width: 600px;
    }
    th{
        background: #4e73df;
        color: white;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
    }
    td{
        
        color: rgb(246, 243, 243);
        padding: 10px;
        border: 1px solid skyblue;
        
    }
    </style>
 </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
         <div>
            <h1 class ="div_deg" style="color: white">Edit Category</h1>
            <div class="div_deg">
                <form action="{{url('update_category',$data->id)}}" method="post">
                    @csrf
                    <input type="text" name="category" id="" value="{{$data->category_name}}">
                    <input type="submit" value="Update Category" class="btn btn-primary">
                </form>
            </div>
         </div>
          </div>
        </section>
        
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{('/admincss/js/charts-home.js')}}"></script>
    <script src="{{('/admincss/js/front.js')}}"></script>
  </body>
</html>