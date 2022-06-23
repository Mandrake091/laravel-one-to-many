<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Doctrine\DBAL\Tools\Dumper;
use Facade\Ignition\DumpRecorder\Dump;
use Psy\VarDumper\Dumper as VarDumperDumper;
use Symfony\Component\Console\Helper\Dumper as HelperDumper;

class CategoryController extends Controller
{

      protected $validationRule = [
        'name'=>'required|string|max:100',
      
        
    ];

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
      
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate($this->validationRule);
     $data = $request->all();
     $newCategory = new Category();
     $newCategory->name = $data['name'];
     $slug = Str::of($data['name'])->slug('-');
     $count = 1;
     while(Category::where('slug', $slug)->first()){
        $slug = Str::of($data['name'])->slug('-')."-{$count}";
        $count++;
     }
     $newCategory->slug = $slug;
     $newCategory->save();
     return redirect()->route('admin.categories.show', $newCategory->id);
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        
        if($category->name != $data['name']){
            $category->name = $data['name'];
            $slug = Str::of($category->name)->slug('-');
            if($slug != $category->slug){
                $category->slug = $this->getSlug($category->name);
            }
        }
        
        $category->update();
        
        return redirect()->route('admin.categories.index', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
        $category->delete();
        return redirect()->route('admin.categories.index');
    }


    
    private function getSlug($name){
        $slug = Str::of($name)->slug('-');
        $count = 1;
        while( Category::where('slug', $slug)->first() ){
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}