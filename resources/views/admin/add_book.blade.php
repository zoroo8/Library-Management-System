<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        .heading {
            color: white;
            font-size: 40px;
            font-weight: bold;
            padding: 35px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_pad{
            padding: 15px;

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
                <h1 class="heading">Add Book</h1>
                <form action="{{url('store_book')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_pad">
                        <label>Book Name</label>
                        <input type="text" name="book_name" class="">
                    </div>
                    <div class="div_pad">
                        <label>Author Name</label>
                        <input type="text" name="author_name" class="">
                    </div>
                    <div class="div_pad">
                        <label>Price</label>
                        <input type="text" name="price" class="">
                    </div>
                    <div class="div_pad">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="">
                    </div>
                    <div class="div_pad">
                        <label>Description</label>
                        <textarea name="description" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="div_pad">
                        <label>Category</label>
                        <select name="category" required>
                            <option value="">Select a Category</option>
                            @foreach ($data as $data)
                            <option value="{{$data->id}}">{{$data->cat_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_pad">
                        <label>Book Image</label>
                        <input type="file" name="book_img" class="">
                    </div>
                    <div class="div_pad">
                        <label>Author Image</label>
                        <input type="file" name="author_img" class="">
                    </div>
                    
                    <div class="div_pad">
                        <input type="submit" value="Add Book" class="btn btn-info">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>