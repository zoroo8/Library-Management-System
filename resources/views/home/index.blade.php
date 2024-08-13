<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')
    <style>
  .popup{
  width: 400px;
  text-align: center;
  color: white;
  background-color: rgb(31, 45, 10);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 40px 30px ;
  visibility: hidden;
  }
  .open-popup{
  visibility: visible;
  transition: 0.4s;

  }
  .close-popup{
  visibility: hidden;
  transition: 0.5s;
  }
    </style>
  </head>

<body>


  @include('home.header')
  @include('home.main_banner')
  @include('home.category')
  @include('home.book')
  @include('home.footer')
  

  </body>
</html>