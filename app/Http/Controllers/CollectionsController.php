<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
class CollectionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collections = Collection::orderBy('created_at', 'desc')->paginate(10);
        // return $collections;
        return view('collections.index')->with('collections', $collections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //#]
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
           
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= Str::random(8). time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
  
        } else {
            $fileNameToStore = 'noImage.png';
        }

        // Create Post 
        $post = new Collection;
        $post->name = $request->input('title');
        $post->description	 = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->Subscribers = 0;
        $post->cover_image = $fileNameToStore; 
        $post->save();

        return redirect('/collections/')->with('success', 'Post Created');
   
        //
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
        #endregion
       $collection = Collection::find($id);
       $posts = Post::where('collection_id', $id)->orderBy('created_at', 'desc')->paginate(10);
       $arrayName = array('collection' => $collection,
       'posts'=>$posts 
    
    );
       return view('collections.show')->with($arrayName);
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
    public function destroy($id)
    {
        //
    }
}
