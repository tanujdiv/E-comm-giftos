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

    input[type='search']
    {
      width: 500px;
      height: 40px;
      margin-left: 50px;
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

        <div class="div_deg">
        <form action="{{url('product_search')}}" method="get">
            <input type="search" name="search" value="{{@$search}}">
            <input class="btn btn-secondary" type="submit" value="Search">
        </form>
      </div>

         <div class="div_deg">

            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                
                   @foreach ($product as $products)
                   <tr>
                     <td> {{$products->title}}  </td>
                     <td> {!!Str::words($products->description,8)!!}</td>
                     <td> {{$products->category}} </td>
                     <td> {{$products->price}} </td>
                     <td> {{$products->quantity}} </td>
                     <td> <img height="120" width="120" src="products/{{$products->image}} " alt=""></td>

                     
                     <td> <a  href="{{url('delete_product',$products->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a> </td>
                      <td> <a href="{{url('edit_product',$products->id)}}" class="btn btn-warning">Update</a> </td>
                    </tr>
                   @endforeach
                
            </table>

          

         </div>

         <div class="div_deg">
         {{$product->onEachSide(5)->links()}}

         </div>
         

          </div>
        </section>
        
      </div>
    </div>
    <!-- JavaScript files-->
  @include('admin.js')
  </body>
</html>