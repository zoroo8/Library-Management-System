<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .tab_center{
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
        }
        th{
            background: skyblue;
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: bold;
            margin-top: 60px;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table class="tab_center">
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Book Title</th>
                    <th>Book Quantity</th>
                    <th>Status</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                </tr>
                    @foreach ($data as $data)
                    <tr>    
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->user->phone}}</td>
                    <td>{{$data->book->title}}</td>
                    <td>{{$data->book->quantity}}</td>
                    <td>
                        @if ($data->status == 'Applied')
                            <span style="color:wheat;;">{{$data->status}}</span>
                        @endif
                        @if ($data->status == 'Approved')
                            <span style="color:aquamarine;">{{$data->status}}</span>
                        @endif
                        @if ($data->status == 'Rejected')
                            <span style="color:red;">{{$data->status}}</span>
                        @endif
                        @if ($data->status == 'Returned')
                            <span style="color:skyblue;">{{$data->status}}</span>
                        @endif
                    </td>
                    <td><img src="book/{{$data->book->book_img}}" alt="Book Image" style="height: auto; width: 90px;"></td>
                    <td>
                        <a class="btn btn-warning" href="{{url('approve_book',$data->id)}}">Approve</a>
                        <a class="btn btn-danger" href="{{url('reject_book',$data->id)}}">Rejected</a>
                        <a class="btn btn-info" href="{{url('return_book',$data->id)}}">Returned</a>
                    </td>
                </tr>
                    @endforeach
            </table>

          </div>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>