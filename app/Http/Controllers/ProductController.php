<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request){
        $request->validate([
        'name'=>'required|min:3',
        'price'=>'required|min:3',
        'company'=>'required|min:3'

        ]);

        $product= new Product;
        $product-> name = $request->name;
        $product-> price = $request->price;
        $product-> company = $request->company;
        $product->save();

        return redirect()->route('adminsCharts')->with('success','La tarea ha sido completada');
    }


    public function index(){
        $products= Product::all();
        return view('charts',['products'=>$products]);
    }

    public function indexadmins(){
        $products= Product::all();
        return view('adminsCharts',['products'=>$products]);
    }
    public function update(Request $request, $id)
    {
        
        error_log($id);
        error_log($request->name);
        error_log($request->price);
        error_log($request->company);
        $product = Product::find($id);
        // $product->update($request->only('name', 'price', 'company'));
        $product->name = $request->name;
        $product->price = $request->price;
        $product->company = $request->company;
        $product->save();
        return redirect()->route('adminsCharts')->with('success','La tarea ha sido actualizada');
    }
    
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('adminsCharts')->with('success','La tarea ha sido eliminada');
    }

}
