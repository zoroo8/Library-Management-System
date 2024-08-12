<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')
    <style>
        .table_deg{
            
            border: 1px solid white;
            margin: auto;
            text-align: center;
            margin-top: 120px;
        }
        th{
            background-color: skyblue;
            font:bold;
            font-size: 20px;
            color:black;
            padding: 10px;
        }
        td{
            color: white;
            background-color: black;
            border: 1px solid white; 
        }
        .book_img{
            width: 80px;
            height: 120px;
            margin: auto;
        }
        
    </style>
  </head>

<body>

  @include('home.header')

  <div class="currently-market">
    <div class="container">
      <div class="row">

        @if (session()->has('message'))
            <div class="alert alert-success" style="margin-top: 50px;">{{session()->get('message')}} 
            <button type="button" class="close" aria-hidden="true" data-bs-dismiss="alert">X</button>
          </div>
        @endif
        <table class="table_deg">
            <tr>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Book Status</th>
                <th>Book Image</th>
                @foreach ($data as $data)
                @if ($data->status =='Pending')
                <th>Cancel Request</th>
                @else
                <th></th>
                @endif
            </tr>
                
            <tr>
                <td>{{$data->book->title}}</td>
                <td>{{$data->book->author_name}}</td>
                <td>{{$data->status}}</td>
                <td><img src="book/{{$data->book->book_img}}" class="book_img"></td>
                <td>
                  @if ($data->status =='Pending')
                  <a href="{{url('cancel_req',$data->id)}}" class="btn btn-danger">Cancel</a></td>
                  @else
                  <a href="{{url('return_book',$data->id)}}" class="btn btn-secondary">Return</a></td>
                  @endif
                  
            </tr>
            @endforeach
        </table>

      </div>
    </div>
  </div>

  @include('home.footer')
  

  </body>
</html>