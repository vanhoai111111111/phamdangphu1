<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        $category=new Category();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image=$filename;
        }
       $category->name=$request->input('name');  
       $category->description=$request->input('description'); 
       $category->status=$request->input('status')==TRUE?'Active':'Not Active'; 
       $category->popular=$request->input('popular')==TRUE?'1':'0'; 
       $category->save();
       return redirect('add-category')->with('status',"Đã thêm danh mục thành công");
    }

    public function edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category=Category::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/'.$filename);
            $category->image=$filename;
        }
       $category->name=$request->input('name'); 
      
       $category->description=$request->input('description'); 
       $category->status=$request->input('status')==TRUE?'Active':'Not Active'; 
       $category->popular=$request->input('popular')==TRUE?'1':'0';
       $category->update(); 
       return redirect('/add-category')->with('status',"Category updated Successful");

    }

    public function destroy($id){
        $category=Category::find($id);
        if($category?->image){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category?->delete();
        return redirect('categories')->with('status',"Category Deleted Successful");

    }
}
