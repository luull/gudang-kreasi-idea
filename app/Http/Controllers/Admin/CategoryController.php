<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        if (session('admin_data') == null) {
            return redirect('/login');
        }
        $data = Company::first();
        $categories = Category::all();
        
        if (session('config') == null) {
            return redirect('/login');
        }

           return view('admin.category', compact('data','categories'));
    }

    public function addCategory(Request $request)
    {
        // dd($request->all());
        if (session('config') == null) {
            return redirect('/login');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        } else {
            $image = '';
            if ($request->hasfile('image')) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('asset-user/category'), $imageName);
                $image = "asset-user/category/$imageName";
            }
            $slug = Str::slug($request->name);
            $category = Category::create([
                'name' => $request->name,
                'image' => $image,
                'description' => $request->description,
                'slug' => $slug,
            ]);
            if ($category) {
                return redirect()->back()->with(['message' => 'Category added successfully.', 'color' => 'alert-light-success']);
            } else {
                return redirect()->back()->with(['message' => 'Failed to add category.', 'color' => 'alert-light-warning']);
            }
        }
    }

    public function editCategory(Request $request)
    {
        if (session('config') == null) {
            return redirect('/login');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['message' => $validator->errors()->first(), 'color' => 'alert-light-warning']);
        } else {
            $image = '';
            if ($request->hasfile('image')) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('asset-user/category'), $imageName);
                $image = "asset-user/category/$imageName";
            } else {
                $image = $request->default;
            }

            $slug = Str::slug($request->name);

            $category = Category::where('id', $request->id)->update([
                'name' => $request->name,
                'image' => $image,
                'description' => $request->description,
                'slug' => $slug,
            ]);

            if ($category) {
                return redirect()->back()->with(['message' => 'Category updated successfully.', 'color' => 'alert-light-success']);
            } else {
                return redirect()->back()->with(['message' => 'Failed to update category.', 'color' => 'alert-light-warning']);
            }
        }
    }

    public function find(Request $request)
    {
        if (session('config') == null) {
            return redirect('/login');
        }

        $category = Category::find($request->id);

        if ($category) {
            return response()->json($category);
        } else {
            return response()->json(['message' => 'Data not found', 'error' => true]);
        }
    }

    public function delete(Request $request)
    {
        if (session('config') == null) {
            return redirect('/login');
        }

        $category = Category::where('id', $request->id)->first();
        $imagePath = public_path($category->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if ($category->delete()) {
            return redirect()->back()->with(['message' => 'Category deleted successfully.', 'color' => 'alert-success']);
        } else {
            return redirect()->back()->with(['message' => 'Failed to delete category.', 'color' => 'alert-danger']);
        }
    }
}
