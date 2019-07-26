<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class imageController extends Controller
{
    public function update(Request $request)
    {
        $path = $request->file('image')->store('blog');
        return $path;
    }
}
