<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Book;

use App\Models\Borrow;

use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            
            if($usertype == 'admin'){
                $user= User::all()->count();
                $book= Book::all()->count();
                $borrow= Borrow::where('status','Approved')->count();
                $return= Borrow::where('status','Returned')->count();
                return view('admin.index',compact('user','book','borrow','return'));
            }
            else if ($usertype == 'user') {
                $data = Book::all();

                return view('home.index',compact('data'));
            }
        }
        else {
            return redirect()->back();
        }
    }
    public function category_page(){
        $data= Category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function cat_delete($id){
        $data= Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function edit_category($id){
        $data= Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id){
        $data= Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();
        return redirect('/category_page')->with('message','Category Updated Successfully');
    }
    public function add_book(){
        $data= Category::all();
        return view('admin.add_book',compact('data'));
    }
    public function store_book(Request $request){
        $data= new Book;
        $data->title= $request->book_name;
        $data->author_name= $request->author_name;
        $data->price= $request->price;
        $data->quantity= $request->quantity;
        $data->description= $request->description;
        $data->categories_id= $request->category;

        $book_image= $request->book_img;
        $author_image= $request->author_img;

        if($book_image){
            $book_img_name= time().'.'.$book_image->getClientOriginalExtension();
            $request->book_img->move('book',$book_img_name);

            $data->book_img= $book_img_name;
        }
        if($author_image){
            $author_img_name= time().'.'.$author_image->getClientOriginalExtension();
            $request->author_img->move('author',$author_img_name);

            $data->author_img= $author_img_name;
        }

        $data->save();
        return redirect()->back()->with('message','Book Added Successfully');
    }
    public function show_book(){
        $book_data= Book::all();
        return view('admin.show_book',compact('book_data'));
    }
    public function book_delete($id){
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message','Book Deleted Successfully');
    }
    public function edit_table($id){
        $data= Book::find($id);
        $category= Category::all();
        return view('admin.edit_table',compact('data','category'));
    }
    public function update_book(Request $request,$id){
        $data= Book::find($id);
        $data->title= $request->book_name;
        $data->author_name= $request->author_name;
        $data->price= $request->price;
        $data->quantity= $request->quantity;
        $data->description= $request->description;
        $data->categories_id= $request->category;

        $book_image= $request->book_img;
        $author_image= $request->author_img;

        if($book_image){
            $book_img_name= time().'.'.$book_image->getClientOriginalExtension();
            $request->book_img->move('book',$book_img_name);

            $data->book_img= $book_img_name;
        }
        if($author_image){
            $author_img_name= time().'.'.$author_image->getClientOriginalExtension();
            $request->author_img->move('author',$author_img_name);

            $data->author_img= $author_img_name;
        }

        $data->save();
        return redirect('/show_book')->with('message','Book Updated Successfully');

    }
    public function borrow_request(){
        $data= Borrow::all();
        return view('admin.borrow_request',compact('data'));
    }
    public function approve_book($id){
        $data= Borrow::find($id);
        $status= $data->status;
        if($status == 'Approved'){
            return redirect()->back()->with('message','Book Already Approved');
        }
        else{
            $data->status= 'Approved';
            $data->save();

            $bookid= $data->book_id;
            $book= Book::find($bookid);
            $bookqty=$book->quantity-'1';
            $book->quantity=$bookqty;
            $book->save();

            return redirect()->back()->with('message','Book Approved Successfully');
        }
    }
    public function return_book($id){
        $data= Borrow::find($id);
        $status= $data->status;
        if($status == 'Returned'){
            return redirect()->back()->with('message','Book Already Returned');
        }
        else{
            $data->status= 'Returned';
            $data->save();

            $bookid= $data->book_id;
            $book= Book::find($bookid);
            $bookqty=$book->quantity+'1';
            $book->quantity=$bookqty;
            $book->save();
            
            return redirect()->back()->with('message','Book Returned Successfully');
        }
    }
    public function reject_book($id){
        $data= Borrow::find($id);
        $status= $data->status;
        if($status == 'Approved' || $status == 'Returned'){
            return redirect()->back()->with('message','Book has already been Approved cannot be Rejected');
        }
        else{
            $data->status= 'Rejected';
            $data->save();
            return redirect()->back()->with('message','Book Rejected Successfully');
        }

    }
}

