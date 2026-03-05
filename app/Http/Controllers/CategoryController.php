<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ bảng categories (đổi tên bảng nếu bạn dùng khác)
        $categories = DB::table('category')->get();

        // Trả view kèm biến
        return view('category_list', compact('categories'));
    }
}
