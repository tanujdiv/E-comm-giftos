<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
   .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }
    table{
        border:2px solid black;
        text-align: center;
        width:800px;
    }
    th{
        border: 2px solid rgb(23, 153, 235);
        text-align: center;
        color: white;
        font: 20px;
        font-weight: bold;
        background-color: black; 
    }

    td{
        border: 1px solid rgb(6, 104, 142);
    }

  </style>
</head>

<body>
  <div class="hero_area">

 <!-- header section strats -->
   @include('home.header')
  <!-- end header section -->
  <div class="div_deg">

   

 <div class="div_center">
           
                    <table>
            <tr>
                <th>Image</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Delivery Status</th>
                
                
            </tr>



             @foreach ($order as $item)
            <tr>
                    <td><img style="width: 100px; height: 100px;" src="/products/{{$item->product->image}}" alt=""></td>
                    <td>{{$item->product->title}}</td>
                    <td>{{$item->product->price}}</td>
                    <td>{{$item->status}}</td>
                    
            
            </tr>
            @endforeach
   </div>

  <!-- info section -->


 
@include('admin.js')
</body>

</html>