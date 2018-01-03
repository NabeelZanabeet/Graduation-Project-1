<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//so you can access post model or table
use App\Post;
class PostController extends Controller
{

     /**Access Control Bu Authintication (login required except for index and show pages)*/
     public function __construct()
     {
         $this->middleware('auth',['except'=>['index','show']]);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$postContent= Post::orderBy('title','desc')->get();
       $posts= Post::orderBy('created_at','desc')->paginate(10);
        return view('Posts.index')->with ('posts',$posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required'
        ]);
        //Tinker way
        $post = new Post();
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/post')-> with('success','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   //Tinker Way
        $post= Post::find($id);
        return view('Posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        //check for correct user (if not redirect)
        if(auth()->user()->id !==  $post->user_id){
            return redirect('/post')->with('error','Unauthrized page');
        }
        return view('Posts.edit')->with('post',$post);
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
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required'
        ]);
        
        $post = Post::find($id);
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->save();

        return redirect('/post')-> with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //check for correct user (if not redirect)
        if(auth()->user()->id !==  $post->user_id){
            return redirect('/post')->with('error','Unauthrized page');
        }
        $post->delete();
        return redirect('/post')-> with('success','Post Deleted ');
    }
}
