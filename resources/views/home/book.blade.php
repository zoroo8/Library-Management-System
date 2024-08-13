<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
              
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">

            @foreach ($data as $data) 
            
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="/book/{{$data->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$data->title}}</h4>
                  <span class="author">
                    <img src="/author/{{$data->author_img}}" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$data->author_name}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{$data->quantity}}</strong><br> 
                  </span>
                  <div class="text-button">
                    <a href="{{url('book_details',$data->id)}}">View Item Details</a>
                  </div>
                  <br>
                  <div class="">
                    <a class="btn btn-primary" onclick="openPopup()">Apply to Borrow</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
          <form action="{{url('borrow_books',$data->id)}}" id="dateForm" method="post">
            @csrf
          <div class="popup" id="popup">
            <h1 style="padding-right: 200px; font-weight: bold; margin-bottom: 20px;">Details to be filled</h1>
            <label for="date">Borrow time period:</label>
            <input type="date" name="date" id="datePicker" style="width: 50%; border-radius: 5px; height: 30px; color: black;" required>
            <a class="btn btn-danger" href="{{url('/')}}" onclick="closePopup()" style="margin-top: 15px">Close</a>
            <input type="submit" value="Borrow" class="btn btn-primary" onclick="closePopup()" style="margin-top: 15px"></input>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<script>
    function openPopup() {
        document.getElementById("popup").classList.add("open-popup");
        document.getElementById("popup").classList.remove("close-popup");
    }
    
    function closePopup() {
        document.getElementById("popup").classList.add("close-popup");
        document.getElementById("popup").classList.remove("open-popup");
    }

    flatpickr("#datePicker", {
        dateFormat: "Y-m-d",
    });
    </script>