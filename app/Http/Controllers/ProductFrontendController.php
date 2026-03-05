<?php
namespace App\Http\Controllers;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFrontendController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu sản phẩm từ bảng "product"
        $products = DB::table('product')->get();

        // Trả về view kèm dữ liệu
        return view('product_list', compact('products'));
    }
    public function detail($id){
        // Lấy sản phẩm theo id, join category nếu muốn hiển thị tên danh mục
        $product = ProductModel::join('category','product_category','=','category_id')
                    ->where('product_id', $id)
                    ->select('product.*','category.category_name')
                    ->first(); // lấy 1 sản phẩm
        
        if(!$product){
            abort(404); // nếu không tìm thấy sản phẩm
        }
    
        return view('product_show', ['product' => $product]);
    }
}
