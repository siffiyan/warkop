<?php

namespace App\Http\Controllers\Tentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog'] = Blog::where('created_by',session()->get('id'))->get();

        return view('tentor.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tentor.blog.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->input('image');
        $photo = $request->file('image')->getClientOriginalName();
        var_dump($request->file('image'));
        $destination = base_path() . '/public/berkas/blog';
        $request->file('image')->move($destination, $photo);

        Blog::create(
            [
                'judul' => $request->judul,
                'image' => $photo,
                'status' => 'pending',
                'kategori' => $request->kategori,
                'content' => $request->content,
                'created_by' => session()->get('id'),
                'isactive' => '1',
                'role' => 'Tentor',
            ]
        );
        return redirect('/tentor/blog')->with('msg', 'data Blog berhasil ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['blog'] = DB::table('blog')
                        ->leftJoin('mitra', 'blog.created_by', '=', 'mitra.id')
                        ->select('blog.*', 'mitra.nama')
                        ->where('blog.id',$id)
                        ->first();
        return view('tentor.blog.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blog'] = Blog::find($id);
        return view('tentor.blog.update',$data);
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
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = Blog::find($id);
        $blog->judul = e($request->input('judul'));
        $blog->kategori = e($request->input('kategori'));
        $blog->content = e($request->input('content'));

        if($request->hasfile('image')){
            $data = $request->input('image');
            $photo = $request->file('image')->getClientOriginalName();
            var_dump($request->file('image'));
            $destination = base_path() . '/public/berkas/blog';
            $request->file('image')->move($destination, $photo);
            $blog->image = $photo;
        }

        $blog->save();

        return redirect('tentor/blog/index')->with('msg', 'data Blog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Blog::destroy($request->id);
        return redirect('tentor/blog/index')->with('msg', 'data Blog berhasil dihapus');
    }
}
