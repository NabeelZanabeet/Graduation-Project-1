<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//so you can access post model or table
use App\Post;
//to access storage file
use Illuminate\Support\Facades\Storage;
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
        // Here is the validation of the form
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File upload 
        if($request->hasFile('cover_image')){
            //get file name with the extention
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //get just file name 
            $filename =pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // get just extention
            $extention =$request->file ('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =$filename.'_'.time().'.'.$extention;
            // uplpoad image
            // we did mimic the storage file to be accessed by the browser using php artisan storage:link
            $path =$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore); 
        }   
        else
        {
            $fileNameToStore='noimage.jpg';
        }
        //Tinker way
        $post = new Post();
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image =$fileNameToStore;
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
        if($request->hasFile('cover_image')){
            //get file name with the extention
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //get just file name 
            $filename =pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // get just extention
            $extention =$request->file ('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =$filename.'_'.time().'.'.$extention;
            // uplpoad image
            // we did mimic the storage file to be accessed by the browser using php artisan storage:link
            $path =$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore); 
        }   
        
        $post = Post::find($id);
        $post->title =$request->input('title');
        $post->body =$request->input('body');
         if($request->hasFile('cover_image')){
             $post->cover_image=$fileNameToStore;
         }
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

        if($post->cover_image != 'noimage.jpg')
        {
            //delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);

        }
        $post->delete();
        return redirect('/post')-> with('success','Post Deleted ');
    }
}
