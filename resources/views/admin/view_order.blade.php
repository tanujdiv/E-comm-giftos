<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        table{
            border: 2px solid skyblue;
            text-align: center;
        }

        th{
            background-color: skyblue;
            color: aliceblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        td{
            border: 1px solid wheat;
            color: rgb(255, 255, 255);
            padding: 10px;
        }

        .table_center{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 100px;
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
           
            <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>
                @foreach ($order as $data)
                    
               
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td><img style="width: 100px; height:100px" src="/products/{{$data->product->image}}" alt=""></td>
                    <td>
                      @if ($data->status === 'In Progress')
                          
                        <span style="color: red">{{$data->status}}</span>

                        @elseif($data->status === "On The Way")

                        <span style="color: yellow">{{$data->status}}</span>

                        @else

                        <span style="color: rgb(18, 244, 18)">{{$data->status}}</span>

                      @endif
                    </td>
                    <td><a style="margin: 4px;" class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On The Way</a>
                      
                      <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                    </td>
                    
                    <td><a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a></td>

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