<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Product};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ProductsController extends Controller{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Product::select('products.*','categories.name as cat_name')->join('categories','products.cat_id','=','categories.id')->get();
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    return $row->id ? $row->id : 'N/A';
                })
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('cat_name', function ($row) {
                    return $row->cat_name ?  $row->cat_name : 'N/A';
                })
                ->addColumn('unique_code', function ($row) {
                    return $row->unique_code ?  $row->unique_code : 'N/A';
                })
                ->addColumn('product_unit', function ($row) {
                    return $row->product_unit ?  $row->product_unit : 'N/A';
                })
				->addColumn('product_stock', function ($row) {
                    return $row->product_stock ?  $row->product_stock : '0';
                })
                
                ->addColumn('description', function ($row) {
                    return $row->description ?  Str::of(ucfirst($row->description))->limit('17') : 'N/A';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? date('M d, Y ', strtotime($row->created_at)) : 'N/A';
                })
                
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $url =  route('admin.product.delete');
                    $btn .= '<a href=" ' . route('admin.product.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>';
                    if(\Auth::user()->role_type == 1){
                        $btn .=  '<a href="' . route('admin.product.edit', \App\Helpers::encrypt($row->id)) . '" class="btn btn-warning" title="Edit"><i class="mdi mdi-pencil"></i></a>';
                        $btn .=  '<a onclick="deleteProductItems(this)" data-url ="'.$url.'" data-id="'.$row->id.'" class="btn btn-danger" title="Delete"><i class="mdi mdi-delete"></i></a>';
                    }
                    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    public function create(){
        $cat = Category::get();
        return view('admin.product.create', compact('cat'));
    }

    public function store(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'unique_code' => 'required|unique:App\Models\Product,unique_code',
            'product_unit' => 'required',
            'cat_id' => 'required',
            'product_img' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('product_img')) {

            $filenameWithExt = $request->file('product_img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_img')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('product_img')->storeAs('public/upload_image', $fileNameToStore);
        }
       
        $input['name'] = $input['name'];
        $input['description'] = $input['description'];
        $input['unique_code'] = $input['unique_code'];
        $input['product_unit'] = $input['product_unit'];
		$input['product_stock'] = $input['product_stock']?$input['product_stock']:100;
        $input['price'] = $input['price'];
        $input['cat_id'] = $input['cat_id'];
        $input['product_img'] = @$fileNameToStore;
        $input['description'] = strip_tags($input['description']);

        Product::create($input);
        
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }

    public function show($id){
        $productDetail =Product::select('products.*','categories.name as cat_name','categories.name as cat_name','categories.id as cat_id')->join('categories','products.cat_id','=','categories.id')
                        ->where('products.id', '=', \App\Helpers::decrypt($id))->first();
                      
        return view('admin.product.show', compact('productDetail'));
    }

    public function edit($id){
        $productDetail =Product::select('products.*','categories.name as cat_name','categories.name as cat_name','categories.id as cat_id')->join('categories','products.cat_id','=','categories.id')
                        ->where('products.id', '=', \App\Helpers::decrypt($id))->first();
                         $cat = Category::get();
        return view('admin.product.edit', compact('productDetail','id','cat'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            //'unique_code' => 'required|unique:App\Models\Product,unique_code'.\App\Helpers::decrypt($id),
            'unique_code' => [
                              'required',
                              Rule::unique('products', 'unique_code')->ignore(\App\Helpers::decrypt($id)),
                            ],
            'product_unit' => 'required',
            'cat_id' => 'required',
        ]);
      
        if ($request->hasFile('product_img')) {

            $filenameWithExt = $request->file('product_img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_img')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('product_img')->storeAs('public/upload_image', $fileNameToStore);
        }
        if($request->hasFile('image') != null){
            $hotalImg = $fileNameToStore;
        }else{
            $hotalImg = $request->oldProductImg;
        }

        $updateHotalInfo = array(
            'name' => $input['name'],
            'description' => $input['description'],
            'unique_code' => $input['unique_code'],
            'product_unit' => $input['product_unit'],
			'product_stock'=> $input['product_stock'],
            'price' => $input['price'],
            'cat_id' => $input['cat_id'],
            'product_img' => isset($fileNameToStore) ? $fileNameToStore : $input['oldProductImg'],
        );
        Product::where('id', \App\Helpers::decrypt($id))->update($updateHotalInfo);
       
          return redirect()->route('admin.product.index')
            ->with('message', 'Product Information Updated Successfully!!');
    }

    public function deleteProductItem(Request $request){
        $product = \DB::table('products')->where('id', $request->id)->delete();
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        return redirect()->route('admin.product.index')->with('message', 'Product deleted successfully.');
    }
}