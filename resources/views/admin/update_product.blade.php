<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      .div_deg
      {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }

      h1
      {
        color: white;
      }

      label
      {
        display: inline-block;
        width: 250px;
        font-size: 18px!important;
        color: white!important;
      }

      input[type='text']
      {
        width:350px;
        height:40px;
      }
      textarea{
        width:350px;
        height:60px;
      }

      .input_deg{
        padding: 15px;
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
            
              <h1 class="div_deg">Update Product</h1>

        <div class="div_deg">
            <form action="{{url('update_product',$product->id)}}" method="post" enctype="multipart/form-data"> 
                @csrf
                <div class="input_deg">
                   <label for="">Product Title</label>
                    <input type="text" name="title" value="{{$product->title}}">
                </div>
                <div class="input_deg">
                   <label for="">Description</label>
                    <textarea type="text" name="description" >{{$product->description}}</textarea>
                </div>

                <div class="input_deg">
                   <label for="">Price</label>
                    <input type="text" name="price" value="{{$product->price}}">
                </div>

                <div class="input_deg">
                   <label for="">Quantity</label>
                    <input type="text" name="quantity" value="{{$product->quantity}}">
                </div>
                <div class="input_deg">
                  <label for="">Product Category</label>

                    <select name="category">
                      <option >
                        {{$product->category}}
                      </option>
                      @foreach ($data as $item)
                          <option value="{{$item->category_name}}">
                              {{$item->category_name}}
                        </option>
                      @endforeach
                    </select>
                </div>
                <div class="input_deg">
                  <label for="">Current Image</label>
                 <img height="120" width="120" src="/products/{{$product->image}}" alt="">
                </div>
                <div class="input_deg">
                  <label for="">New Image</label>
                    <input type="file" name="image" > 
                </div>
                <div class="input_deg">

                   <center><input class="btn btn-success" type="submit" value="Add Product" ></center> 
                    
                </div>
            </form>
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