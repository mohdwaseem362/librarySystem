<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use App\Rent;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userTable');
    }

    public function readItems() {
        $data = Book::all();
        return $data;
    }

    public function returnBookShow(){
        return view('return');
    }


    public function rented_book_list(){
        $id = Auth::user()->id;
        $books= [];
        $rents = DB::table('rents')->where('user_id', $id)->get();
        // print_r($rents);exit();

        foreach ($rents as  $rent) {
           
           $books[]=DB::table('books')->where('id',$rent->book_id)->get();

        }
        // $a =json_encode($books);
        // $b =json_encode($a);
        // print_r($books);exit();

        // $users = DB::table('rents')
        // ->rightJoin('books', 'rents.book_id', '=', 'books.id')
        // ->select('rents.id','rents.book_id','rents.user_id','books.name','books.author','books.price','books.publish_date')
        // ->where('user_id',$id)
        // ->get();

        return $books;


        // print_r($data);exit;
        // $data='SELECT rents.user_id, rents.book_id, books.name,books.author,books.price 
        // FROM rents 
        // RIGHT JOIN Books ON rents.book_id = books.id 
        // ORDER BY rents.id';
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rentBookStore(Request $request)
    {
        $userId = Auth::user()->id;
        $req_data =$request->all();
        $data =($req_data['0']);
        $id =json_encode($data['id']);
   
        // $user = User::find(1);

        $post = new Rent();
        $post->user_id = $userId;
        $post->book_id = $id;
        $post->save();

        // update book table status
       
           $booked = DB::table('books')
           ->where('id', $id)
           ->update(['booked_status' => '1']);
    
        

        // rent redirect path wiil be here
        
        return response()->json([
            'status' => true,
            // 'data' => $post,
            'booked' =>0,
            'msg'=> "class booked successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $req =$request['0'];
        // print_r($req);exit();

        // $data =Rent::find($req['id'])->where('book_id',$req['book_id'])->delete();
        $data =DB::table('rents')->where('book_id', $req['id'])->delete();

        $booked = DB::table('books')
           ->where('id', $req['id'])
           ->update(['booked_status' => '0']);
        
    }
}
