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

        <h1 class ="div_deg" style="color: white">Add Category</h1>
        <div class="div_deg">

         <form action="{{url('add_category')}}" method="POST">
            @csrf
            <div>
                <input type="text" name="category" id="">
            
                <input type="submit" value="Add Category" class="btn btn-primary">
            </div>

         </form>
         </div>
         <div>
            <table class="table_deg">
                <tr>
                    <th>Category Name</th>
                </tr>
                
                   @foreach ($data as $item)
                   <tr>
                     <td> {{$item->category_name}}  </td>
                     <td> <a href="{{url('delete_category',$item->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a> </td>
                      <td> <a href="{{url('edit_category',$item->id)}}" class="btn btn-warning">Update</a> </td>
                    </tr>
                   @endforeach
                
            </table>
         </div>
          </div>
        </section>
        
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>