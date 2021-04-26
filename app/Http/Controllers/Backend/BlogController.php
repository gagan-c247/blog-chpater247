<?php

namespace App\Http\Controllers\Backend;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    protected $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
        parent::__construct();
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->orderby('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create')->with('blog',$this->blog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        if($request->hasFile('blog_image')){
            $data['user_id'] = $request['user_id'];
            $data['type'] = $request->blog_image->extension();
            $data['filepath'] = $request->blog_image->getClientOriginalName();
            $file = $request->blog_image->storeAS('images',$data['filepath'],'public');
            $upload = File::create($data);
            $request['file_id'] = $upload->id;
        }
   
       
        $blog = $this->blog->create($request->except(['_token','blog_image'])); 
        session()->flash('success','Inserted Successfully');
        return redirect()->route('blog.edit',$blog->id);
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
        $blog = $this->blog->find($id);
        return view('admin.blog.create',compact('blog'));
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
        
        if($request->hasFile('blog_image')){
            $data['user_id'] = $request['user_id'];
            $data['type'] = $request->blog_image->extension();
            $data['filepath'] = $request->blog_image->getClientOriginalName();
            $file = $request->blog_image->storeAS('images',$data['filepath'],'public');
            $upload = File::create($data);
            $request['file_id'] = $upload->id;
        }
        $blog = $this->blog->where('id',$id)->update($request->except(['_method','_token','blog_image']));
        session()->flash('success','Updated Successfully');
        return redirect()->route('blog.edit',$id);  
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
