<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Str;
use App\ChildCategory;
use App\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $childCategory = ChildCategory::with('subcategory')->get();

        if ($request->isMethod('post')){
            
            $rules = [
                'childcategory_name' => 'unique:child_categories|string',
                'childcategory_url' => 'unique:child_categories|string',
                'thumbnail_image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
                'cover_image' => 'image|mimes:jpeg,jpg,png,gif',
                // 'status' => 'required',
            ];
            $customMessages = [
                'childcategory_name.unique' => 'This Category Name has been used already.',
                'childcategory_name.string' => 'This Category Name must have a word.',
                'childcategory_url.unique' => 'This Category URL has been used already.',
                'childcategory_url.string' => 'This Category URL must have a word.',
                'thumbnail_image.image' => 'Upload a valid Image',
                'thumbnail_image.mimes' => 'Upload a valid Image',
                'cover_image.image' => 'Upload a valid Image',
                'cover_image.mimes' => 'Upload a valid Image',
                // 'status.required' => 'Status is required',
            ];
            $this->validate($request, $rules, $customMessages);

            $childcategory = new ChildCategory;
            $childcategory->childcategory_name = strtoupper($request->childcategory_name);
            $childcategory->childcategory_url = Str::slug($request->childcategory_url);
            $childcategory->subcategory_id = $request->subcategory_id;

           $childcategory->status = 1;

            if ($request->hasFile('thumbnail_image')) {
                $thumbnail_image = $request->file('thumbnail_image');
                if ($thumbnail_image->isValid()){
                    $thumb_image = time().$thumbnail_image->getClientOriginalName();
                    $thumb_path = 'uploads/frontend/image/childcategory/thumbnail/'. $thumb_image;
                    Image::make($thumbnail_image)->resize(210, 270)->save($thumb_path);
                    $childcategory->thumbnail_image = url($thumb_path);
                }
            }

            if ($request->hasFile('cover_image')) {
                $cover_image = $request->file('cover_image');
                if ($cover_image->isValid()){
                    $image = time().$cover_image->getClientOriginalName();
                    $path = 'uploads/frontend/image/childcategory/cover/'. $image;
                    Image::make($cover_image)->resize(870, 220)->save($path);
                    $childcategory->cover_image = url($path);
                }
            }

            $success = $childcategory->save();
            if ($success) {
                $notification=array(
                'message' => 'ChildCategory Added Successfully ',
                'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }

        return view('backend.categories.childcategory.index', compact('childCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChildCategory  $childCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editChildCategory = ChildCategory::find($id);
        $subcategories = SubCategory::all();

        return view('backend.categories.childcategory.edit', compact('editChildCategory', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChildCategory  $childCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $childcategoryUpdate = ChildCategory::find($id);
        $childcategoryUpdate->childcategory_name = $request->childcategory_name;
        $childcategoryUpdate->childcategory_url = $request->childcategory_url;
        $childcategoryUpdate->subcategory_id = $request->subcategory_id;

        if (is_null($childcategoryUpdate->status)) {
            $status = 0;
        }
        else {
            $status = 1;
        }
        $childcategoryUpdate->status = $request->status;

        if ($request->hasFile('thumbnail_image')) {

            if (File::exists('uploads/frontend/image/childcategory/thumbnail/'.$childcategoryUpdate->thumbnail_image)) {
                File::delete('uploads/frontend/image/childcategory/thumbnail/'.$childcategoryUpdate->thumbnail_image);
            }
            
            $thumbnail_image = $request->file('thumbnail_image');
            $imageName = time().$thumbnail_image->getClientOriginalName();
            $imagePath = 'uploads/frontend/image/childcategory/thumbnail/'. $imageName;
            Image::make($thumbnail_image)->resize(210, 270)->save($imagePath);
            $childcategoryUpdate->thumbnail_image = url($imagePath);
        }

        if ($request->hasFile('cover_image')) {

            if (File::exists('uploads/frontend/image/childcategory/cover/'.$childcategoryUpdate->cover_image)) {
                File::delete('uploads/frontend/image/childcategory/cover/'.$childcategoryUpdate->cover_image);
            }

            $cover_image = $request->file('cover_image');
            $image = time().$cover_image->getClientOriginalName();
            $path = 'uploads/frontend/image/childcategory/cover/'. $image;
            Image::make($cover_image)->resize(870, 220)->save($path);
            $childcategoryUpdate->cover_image = url($path);
        }

        $success = $childcategoryUpdate->save();
        if ($success) {
            $notification=array(
            'message' => 'Product ChildCategory Updated Successfully ',
            'alert-type' => 'success'
            );
        return redirect()->route('child.category')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChildCategory  $childCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $childcategoryDelete = ChildCategory::find($id);
        if (!is_null($childcategoryDelete)) {
            if (File::exists('uploads/frontend/image/childcategory/thumbnail/'.$childcategoryDelete->thumbnail_image)) {
                File::delete('uploads/frontend/image/childcategory/thumbnail/'.$childcategoryDelete->thumbnail_image);
            }
            if (File::exists('uploads/frontend/image/childcategory/cover/'.$childcategoryDelete->cover_image)) {
                File::delete('uploads/frontend/image/childcategory/cover/'.$childcategoryDelete->cover_image);
            }

        $dlt = $childcategoryDelete->delete();
            if ($dlt) {
                    $notification=array(
                     'message' => 'ChildCategory Deleted.',
                     'alert-type' => 'error'
                    );
                    return redirect()->route('child.category')->with($notification);
                }
            else
                {
                    $notification=array(
                    'message' => 'Something Went wrong!',
                    'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
        }
    }

    public function checkSlug(Request $request)
    {
        $childcategory_url = Str::slug($request->childcategory_name);

        return response()->json(['childcategory_url' => $childcategory_url]);
    }
}
