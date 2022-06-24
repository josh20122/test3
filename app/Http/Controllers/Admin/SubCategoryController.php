<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cartegory;
use App\Models\Country;
use App\Models\Image as ModelsImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategory = SubCategory::query()->with('cartegory', 'cartegory.country')->paginate();
        return Inertia::render('Admin/SubCategory', [
            'subcategory' => $subcategory,
        ]);
    }

    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        return Inertia::render('Admin/EditSubcategory', [
            'title' => $subcategory->title,
            'id' => $id,
            'country' => $subcategory->cartegory->country->country,
            'category' => $subcategory->cartegory->title,
            'image' => $subcategory->image->path,
        ]);
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        if ($image && $image->getSize() === false) {
            return back()->withErrors(['image' => 'Image size must be less than 2048Kib']);
        }
        $validate = $request->validate([
            'image' => 'nullable|image|max:2048|mimes:png,jpg,jpeg',
            'title' => 'required|string|max:20',
        ]);

        $subcategory = SubCategory::where('id', $id)->update([
            'title' => $validate['title'],
        ]);

        if ($image) {
            $imageName = $id . '-' . time() . $image->getClientOriginalName();
            Image::make($image)->resize(500, 500)->save(public_path("subcategory/{$imageName}"));
            ModelsImage::where('imageable_id', $id)->where('imageable_type', 'App\Models\SubCategory')->update([
                'path' => "/subcategory/{$imageName}",
            ]);

            if (File::exists(public_path($request->trash))) {
                File::delete(public_path($request->trash));
            }
        }

        return back();
    }

    public function create()
    {

        $countries = Country::with('cartegory')->get();
        return Inertia::render('Admin/CreateSubCategory', [
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        if ($image && $image->getSize() === false) {
            return back()->withErrors(['image' => 'Image size must be less than 2048Kib']);
        }
        $validate = $request->validate([
            'title' => 'required|max:20',
            'country' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $category = Cartegory::find($validate['category']);
        $subcategory =  $category->subCategories()->create([
            'title' => $validate['title'],
        ]);
        $imageName = $subcategory->id . '-' . time() . $image->getClientOriginalName();
        Image::make($image)->resize(500, 500)->save(public_path("subcategory/{$imageName}"));
        $subcategory->image()->create([
            'path' => "/subcategory/{$imageName}",
        ]);
        return back();
    }
}
