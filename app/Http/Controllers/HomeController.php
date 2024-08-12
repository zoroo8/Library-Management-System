<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Book;

use App\Models\Borrow;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data = Book::all();
        return view('home.index',compact('data'));
    }
    public function borrow_books($id){
        $data = Book::find($id);
        $book_id = $id;
        $quantity = $data->quantity;
        
        if($quantity >='1'){
            if(Auth::id()){
                $user = Auth::id();
                $borrow = new Borrow;
                $borrow->book_id = $book_id;
                $borrow->user_id = $user;
                $borrow->status = 'Pending';
                $borrow->save();
                return redirect()->back()->with('message','Request Sent Successfully! Admin will approve it soon and you will get a email notification.');
            }
            else{
                return redirect('/login');
            }
        }
        else{
            return redirect()->back()->with('message','Book is not available');
        }
        
    }

    public function book_history(){
        if(Auth::id()){
            $userid = Auth::id();
            $data = Borrow::where('user_id','=',$userid)->get();
            return view('home.book_history',compact('data'));
        }
    }

    public function cancel_req($id){
        $data= Borrow::find($id);
        $data->delete();
        return redirect()->back()->with('message','Request Cancelled Successfully!');
    }
    public function explore(){
        $data= Book::all();
        return view('home.explore',compact('data'));
    }

    public function search(Request $request){
        $search= $request->search;
        $data= Book::where('title','LIKE','%'.$search.'%')->orWhere('author_name','LIKE','%'.$search.'%')->get();
        return view('home.explore',compact('data'));
    }
}
