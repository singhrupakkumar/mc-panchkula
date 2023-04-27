<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class CategoriesController extends Controller{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Category::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    return $row->id ? $row->id : 'N/A';
                })
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('description', function ($row) {
                    return $row->description ?  Str::of(ucfirst($row->description))->limit('17') : 'N/A';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? date('M d, Y ', strtotime($row->created_at)) : 'N/A';
                })
                
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $url =  route('admin.category.destroy');
                    $btn .= '<a href=" ' . route('admin.category.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>';
                    if(\Auth::user()->role_type == 1){
                        $btn .= '<a href="' . route('admin.category.edit', \App\Helpers::encrypt($row->id)) . '" class="btn btn-warning" title="Edit"><i class="mdi mdi-pencil"></i></a>
                            <a onclick="deleteCattems(this)" data-url ="'.$url.'" data-id="'.\App\Helpers::encrypt($row->id).'" class="btn btn-danger" title="Delete"><i class="mdi mdi-delete"></i></a>';
                    }        
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cat_image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('cat_image')) {

            $filenameWithExt = $request->file('cat_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cat_image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('cat_image')->storeAs('public/upload_image', $fileNameToStore);
        }
       
        $input['name'] = $input['name'];
        $input['cat_image'] = @$fileNameToStore;
        $input['description'] = strip_tags($input['description']);

        Category::create($input);
        
        return redirect()->route('admin.category.index')->with('success', 'Category added successfully.');
    }

    public function show($id){
        $categoryDetail =Category::where('id', \App\Helpers::decrypt($id))
                    ->first();
        return view('admin.category.show', compact('categoryDetail'));
    }

    public function edit($id){
        $categoryDetail =Category::where('id', \App\Helpers::decrypt($id))
                    ->first();
        return view('admin.category.edit', compact('categoryDetail','id'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
      
        if ($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/upload_image', $fileNameToStore);
        }
        if($request->hasFile('image') != null){
            $hotalImg = $fileNameToStore;
        }else{
            $hotalImg = $request->oldHotalImg;
        }

        $updateHotalInfo = array(
            'name' => $input['name'],
            'description' => $input['description'],
            'cat_image' => isset($fileNameToStore) ? $fileNameToStore : $input['oldCatImg'],
        );
        Category::where('id', \App\Helpers::decrypt($id))->update($updateHotalInfo);
       
          return redirect()->route('admin.category.index')
            ->with('message', 'Category Information Updated Successfully!!');
    }

    public function destroy(Request $request){
        $category = Category::find(\App\Helpers::decrypt($request->id));
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('message', 'Category deleted successfully.');
    }
}