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
                        <li data-filter="*" class="active">All Books</li>
                        <li data-filter=".msc">Popular</li>
                        <li data-filter=".dig">Latest</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="row grid">
                    @foreach ($data as $book) 
                    <div class="col-lg-6 currently-market-item all msc">
                        <div class="item">
                            <div class="left-image">
                                <img src="/book/{{$book->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                            </div>
                            <div class="right-content">
                                <h4>{{$book->title}}</h4>
                                <span class="author">
                                    <img src="/author/{{$book->author_img}}" alt="" style="max-width: 50px; border-radius: 50%;">
                                    <h6>{{$book->author_name}}</h6>
                                </span>
                                <div class="line-dec"></div>
                                <span class="bid">
                                    Current Available<br><strong>{{$book->quantity}}</strong><br> 
                                </span>
                                <div class="text-button">
                                    <a href="{{url('book_details', $book->id)}}">View Item Details</a>
                                </div>
                                <br>
                                <div class="">
                                    <a class="btn btn-primary" onclick="openPopup()">Apply to Borrow</a>
                                </div>
                            </div>
                        </div>

                        <!-- Popup Form for each book -->
                        <form action="{{ url('borrow_books', $book->id) }}" id="dateForm{{$book->id}}" method="POST">
                          @csrf
                          <div class="popup" id="popup{{$book->id}}">
                              <h1 style="padding-right: 200px; font-weight: bold; margin-bottom: 20px;">Details to be filled</h1>
                              <label for="date">Borrow time period:</label>
                              <input type="date" name="date" id="datePicker{{$book->id}}" style="width: 50%; border-radius: 5px; height: 30px; color: black;" required>
                              <a class="btn btn-danger" href="{{ url('/') }}" onclick="closePopup('{{$book->id}}')" style="margin-top: 15px">Close</a>
                              <input type="submit" value="Borrow" class="btn btn-primary" style="margin-top: 15px">
                          </div>
                      </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     // Function to open the popup
     function openPopup(bookId) {
    console.log('Popup opened for book ID:', bookId);  // Debugging line

    document.getElementById("popup" + bookId).classList.add("open-popup");
    document.getElementById("popup" + bookId).classList.remove("close-popup");

    // Try manually submitting the form
    var form = document.getElementById('dateForm' + bookId);
    console.log(form);  // Check if it's the correct form element
    form.submit();  // Submit the form
    }


    // Function to close the popup
    function closePopup(bookId) {
        document.getElementById("popup" + bookId).classList.add("close-popup");
        document.getElementById("popup" + bookId).classList.remove("open-popup");
    }

    @foreach ($data as $book)
        flatpickr("#datePicker{{$book->id}}", {
            dateFormat: "Y-m-d",
        });
    @endforeach
</script>
