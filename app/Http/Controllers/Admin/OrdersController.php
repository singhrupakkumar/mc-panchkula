<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Order, Product, User, OrderItem};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class OrdersController extends Controller{

    public function index(Request $request){
       
                            
       if ($request->ajax()) {
             $data = Order::select('orders.id','orders.user_id','orders.created_at','orders.address','orders.order_type','users.name as user_name','users.email as user_email','orders.HKRN_Id','users.phone as user_phone','products.name as product_name','products.unique_code as unique_code','order_items.product_price','order_items.product_stock_qty')
                            ->join('order_items','orders.id','=','order_items.order_id')
                            ->join('users','orders.user_id','=','users.id')
                            ->join('products','order_items.product_id','=','products.id')
                            ->orderBy('orders.id','desc')
                            ->get();
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    return $row->id ? $row->id : 'N/A';
                })
                ->addColumn('product_name', function ($row) {
                    return $row->product_name ? $row->product_name : 'N/A';
                })
                ->addColumn('unique_code', function ($row) {
                    return $row->unique_code ? $row->unique_code : 'N/A';
                })
                ->addColumn('product_price', function ($row) {
                    return $row->product_price ? $row->product_price : 'N/A';
                })
                ->addColumn('product_stock_qty', function ($row) {
                    return $row->product_stock_qty ? $row->product_stock_qty : 'N/A';
                })
                ->addColumn('user_name', function ($row) {
                    return $row->user_name ? ucwords($row->user_name) : 'N/A';
                })
				->addColumn('HKRN_Id', function ($row) {
                    return $row->HKRN_Id ? $row->HKRN_Id : 'N/A';
                })
                ->addColumn('user_email', function ($row) {
                    return $row->user_email ? $row->user_email : 'N/A';
                })
                ->addColumn('user_phone', function ($row) {
                    return $row->user_phone ? $row->user_phone : 'N/A';
                })
                ->addColumn('order_type', function ($row) {
                    return $row->order_type ? ucwords(str_replace( '_', ' ', $row->order_type)) : 'N/A';
                })
                ->addColumn('address', function ($row) {
                    return $row->address ?  Str::of(ucfirst($row->address))->limit('50') : 'N/A';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? date('M d, Y ', strtotime($row->created_at)) : 'N/A';
                })
                
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $url =  route('admin.category.destroy');
                    $btn .= '<a href=" ' . route('admin.orders-details.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>';       
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.orders.index');
    }

    public function ordersDetails(Request $request, $id){
      
        $data = Order::select('orders.id','orders.user_id','orders.upload_recipt','orders.created_at','orders.address','orders.order_type','users.name as user_name','users.email as user_email','users.phone as user_phone','products.name as product_name','order_items.product_price','order_items.product_stock_qty')
                            ->join('order_items','orders.id','=','order_items.order_id')
                            ->join('users','orders.user_id','=','users.id')
                            ->join('products','order_items.product_id','=','products.id')
                            ->orderBy('orders.id','desc')
                            ->where('orders.id', \App\Helpers::decrypt($id))
                            ->get();
         return view('admin.orders.show' , compact('data'));
    }
       
    public function addRecipts(Request $request){
         $productItems = Product::select('id', 'name')->get();
         return view('admin.orders.create' , compact('productItems'));
    }



    public function stockReceived(){
        $productItems = Product::select('id', 'name')->get();
        return view('admin.stockReceived',compact('productItems'));
    }

    public function stockOut(){
        $productItems = Product::select('id', 'name')->get();
        return view('admin.stockOut',compact('productItems'));
    }

    public function getProducts(){
        $productItems = Product::select('id', 'name')->get();
        $output = '';
        
        foreach($productItems as $val){
            $output .= '<option value="'.$val->id.'">' . $val->name .'</option>' ;
        }
        return response()->json(['output' => $output]);
    } 

    public function storeProductItems(Request $request){
        $data = $request->all();
        $checkUser = User::where('HKRN_Id', $data['HKRN_Id'])->get();

        if(count($checkUser) >= 1){
            $userId = $checkUser[0]->id;
        }else{
            $userInfo = array(
                'name' => $data['user_name'],
				'HKRN_Id' => $data['HKRN_Id'],
                'email' => $data['HKRN_Id'].'@gmail.com',  
                'phone' => $data['phone_number'],
                'role_type' => 3,
                'password' => Hash::make('123456789'),
            );
            $users = User::create($userInfo);
            $userId = $users->id;
        }
		
		$orderInfo = array(
            'user_id' => $userId,
            'HKRN_Id' => $data['HKRN_Id'],
			'name' => $data['user_name'],
			'phone' => $data['phone_number'],
			'order_type' => $data['arrival_address_type'],
            'list_type' => $data['arrival_address_type'],
            'address' => $data['address']
        );

        if ($request->hasFile('upload_recipt')) {

            $filenameWithExt = $request->file('upload_recipt')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('upload_recipt')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('upload_recipt')->storeAs('public/upload_image', $fileNameToStore);
			
			$orderInfo['upload_recipt'] = $fileNameToStore;
        }
        
	//	dd($orderInfo);
      

        $order = Order::create($orderInfo);
        
        if (isset($data['name']) && $data['name'][0] != null) {

                $finalOrderItemsArray = [];
                $count = count((array)$data['name']);
                $productName = $data['name'];
                for ($i = 0; $i < $count; $i++) {
                    
                    $finalOrderItemsArray[] = array(
                        'order_id' => $order->id,
                        'name' => strip_tags($productName[$i]),
                        'price' => $data['price'][$i],
                        'product_unit' => $data['product_unit'][$i],
                    );
                   
                }
               foreach($finalOrderItemsArray as $product){
                $finalOrderArr = array(
                    'order_id' => $product['order_id'],
                    'product_id' => $product['name'],
                    'product_price' => $product['price'],
                    'product_stock_qty' => $product['product_unit'],
                );
                
                    OrderItem::create($finalOrderArr);
               }
            }
        if($data['arrival_address_type'] == 'arrival_form'){
            return redirect()->route('admin.orders.addRecipts')
                ->with('message', 'Product Info Successfully Updated!!');
        }else{
            return redirect()->route('admin.orders.addRecipts')
                ->with('message', 'Product Info Successfully Updated!!');
        }    
        
    }

   
}