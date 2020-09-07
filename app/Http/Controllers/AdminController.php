<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin');
    }



    public function show_table() {
        return view('showtable');
    }

    

    public function readItems() {
        $data = Book::all();
        return $data;
    }

    public function editItem(Request $request, $id) {

        return view('edit');
    }

    public function getBookDetails(Request $request){
       // print_r($request['0']);exit();
        $id = $request['0'];
        $data = Book::where('id', $id)->first();

        return $data;

    }

    public function deleteItem(Request $request) {
        
        $data = Book::find($request->id)->delete();
    }


    public function store(Request $request) {

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:books|max:255',
            'author' => 'required',
            'publish' => 'required',
            'rent' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }

        $post = new Book();
        $post->user_id = $id;
        $post->name = $request['name'];
        $post->author = $request['author'];
        $post->publish_date = $request['publish'];
        $post->price = $request['rent'];
        $post->save();
        return response()->json([
            'status' => true,
            'message' => 'New book created'
        ]);
    }


    public function update(Request $request) {

        $userId = Auth::user()->id;
        $userId  = User::findOrFail($userId);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'author' => 'required',
            'publish_date' => 'required',
            'price' => 'required',
        ]);

        // print_r($validator->errors());exit;
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }

        // Store the new books...
        $post = Book::find($request->id);
        $post->name = $request->name;
        $post->author = $request->author;
        $post->publish_date = $request->publish_date;
        $post->price = $request->price;
        $post->save();
        return response()->json([
            'status' => true,
            'message' => 'book updated',
            'data' =>$post
        ]);
        
    }

}
