<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            margin: auto;
        }
        .heading{
            color: white;
            padding: 30px;
            font-size: 40x;
            font-weight: bold;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_padd{
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
                <h1 class="heading">Update Book</h1>
                <form action="{{url('update_book',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="div_padd"> 
                    <label for="">Book Title</label>
                    <input type="text" name="book_name" value="{{$data->title}}">
                </div>
                <div class="div_padd">
                    <label for="">Author Name</label>
                    <input type="text" name="author_name" value="{{$data->author_name}}">
                </div>
                <div class="div_padd">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>
                <div class="div_padd">
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" value="{{$data->quantity}}">
                </div>
                <div class="div_padd">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="5">{{$data->description}}</textarea>
                </div>
                <div class="div_padd">
                    <label for="">Category</label>
                    <select name="category">

                        @foreach ($category as $category)
                        <option value="{{$category->id}}">{{$category->cat_title}}</option>
                        @endforeach   
                    </select>
                </div>
                <div class="div_padd">
                    <label for="">Current Author Image</label>
                    <img style="width: 80px; border-radius: 50%; margin: auto;" src="/author/{{$data->author_img}}" alt="Author Image">
                </div>
                <div class="div_padd">
                    <label for="">Change Author Image</label>
                    <input type="file" name="author_img">
                </div>
                <div class="div_padd">
                    <label for="">Current Book Image</label>
                    <img style="width: 80px; height: auto; margin:auto;" src="/book/{{$data->book_img}}" alt="Author Image">
                </div>
                <div class="div_padd">
                    <label for="">Change Book Image</label>
                    <input type="file" name="book_img">
                </div>
                <div class="div_padd">
                    <input type="submit" value="Update" class="btn btn-info">
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>