<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .div_deg{
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
        border: 2px solid black;
        text-align: center;
        color: white;
        font: 20px;
        font-weight: bold;
        background-color: black; 
    }

    td{
        border: 1px solid rgb(6, 104, 142);
    }

    .cart_value{
        color: rgb(39, 111, 188);
        text-align: center;
        margin: 70px;
        padding: 18px;
    }
    .order_deg{
        padding-right: 100px;
        margin-top: -58px
    }

    label{
        display: inline-block;
        width: 150px;

    }

    .div_gap{
        padding: 15px;
    }
  </style>
</head>

<body>

    

  <div class="hero_area">

 <!-- header section strats -->
   @include('home.header')
  <!-- end header section -->
  <div class="div_deg">

    
      

 
 

   
        <table>
   <tr>
    <th>Image</th>
    <th>Product Title</th>
    <th>Price</th>
    <th>Remove</th>
    
   </tr>



   @foreach ($cart as $item)
   <tr>
        <td><img style="width: 100px; height: 100px;" src="/products/{{$item->product->image}}" alt=""></td>
        <td>{{$item->product->title}}</td>
        <td>{{$item->product->price}}</td>
        <td><a onclick="confirmation(event)" href="{{url('delete_cart',$item->id)}}" class="btn btn-danger">Remove</a></td>
   
   </tr>
 
    <?php

        $value=0;

   ?>
    <?php
        
        $value=$value + $item->product->price;

    ?>   @endforeach
</table>
  </div>

 

  <div class="cart_value">
    <h3>Total Value Of Cart Is : ${{$value}}</h3>
  </div>

  
    <div class="order_deg" style="display: flex; align-items: center; justify-content: center;">


        <form action="{{url('comfirm_order')}}" method="Post">
            @csrf
            <div class="div_gap">
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_gap">
                <label for="">Receiver Address</label>
                <textarea name="address" >{{Auth::user()->address}}</textarea>
            </div>
            <div class="div_gap">
                <label for="">Receiver Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <div class="div_gap">
                
                <input class="btn btn-primary" type="submit" value="Cash On Delivery">

                <a class="btn btn-success" href="{{url('payment',$value)}}">Pay Using Card</a>

            </div>
        </form>

    </div>


  <!-- info section -->

 @include('home.footer')
@include('admin.js')
</body>

<script src="https://js.stripe.com/basil/stripe.js"></script>
<script>
var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
</script>

</html>