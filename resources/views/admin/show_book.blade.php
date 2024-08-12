<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .heading{
            text-align: center;
            margin: auto;
            font-weight: bold;
            font-size: 40px;
        }
        .tab_center{
            text-align: center;
            margin: auto;
            border: 1px solid yellowgreen;
            margin-top: 50px;
        }
        th{
            background: skyblue;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }
        .img_author{
            width: 80px;
            border-radius: 50%;
        }
        .img_book{
            width: 100px;
            height: auto;
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
                <div class="div_center">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                                <button type="button" name="type" class="close" data-dismiss="alert" aria-hidden="true">
                                    X
                                </button>
                            </div>
                            
                        @endif
                    </div>   
                    <div>
                        <h2 class="heading">
                            All Books Detail
                        </h2>
                        <table class="tab_center">
                            <tr>
                                <th>
                                    Book Title
                                </th>
                                <th>
                                    Author Name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Author Image
                                </th>
                                <th>
                                    Book Image
                                </th>
                                <th>
                                    Update
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            @foreach ($book_data as $book_data)
                                
                            
                            <tr>
                                <td>{{$book_data->title}}</td>
                                <td>{{$book_data->author_name}}</td>
                                <td>{{$book_data->price}}</td>
                                <td>{{$book_data->quantity}}</td>
                                <td>{{$book_data->description}}</td>
                                <td>{{$book_data->categories->cat_title}}</td>
                                <td>
                                    <img src="author/{{$book_data->author_img}}" alt="Author Image" class="img_author">
                                </td>
                                <td>
                                    <img src="book/{{$book_data->book_img}}" alt="Book Image" class="img_book">
                                </td>
                                <td><a href="{{url('edit_table',$book_data->id)}}" class="btn btn-info">Update</a></td>

                                <td><a onclick="confirmation(event)" href="{{url('book_delete',$book_data->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            </div>
        
      @include('admin.footer')
      <script type="text/javascript">
        function confirmation(ev) { 
        ev.preventDefault(); 
        var urlToRedirect = ev.currentTarget.getAttribute('href'); 
        console.log(urlToRedirect); 
        swal({ 
        title: "Are you sure to Delete this", 
        text: "You will not be able to revert this!", 
        icon: "warning",
        buttons: true, 
        dangerMode: true, 
        })

    .then((willCancel) => { 
        if (willCancel) { 
        window.location.href= urlToRedirect; 
        }
    });
    }
  </script>
  </body>
</html>