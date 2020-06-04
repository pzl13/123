<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

    class CategoryController extends Controller
     {
        public function CreateCategory(Request $request, Categories $categories)
            {
                        $message = 'Error user not create';

                        $validatedData = $request->validate([
                            'name_category' => 'required|string|unique:categories,name_category|max:25',
                            'img_category.*' => 'required|file|mimes:jpeg,jpg,png,gif|max:1000',
                            'description' => 'string|max:100',
                        ]);

                        $category = new Categories;
                        $category->name_category=$request->name_category;
                        $category->description=$request->description;
                        $category->user_id = Auth::user()->id;


                        if ($request->file('img_category')) {
                            $category->image=$request->file('img_category');
                        }

                        if ($category->save()) {
                            $message = 'Успешное создание';
                        }

                        return $message;

                }

            public function manyAction(Categories $category)
                {
                            $categories = Categories::all();

                            return view ('createCategory', compact('categories'));
                }

            public function showAllCategories()
                {
                    $categories = Categories::sortable()->paginate(5);

                    return view('showallcategories', ['categories' => $categories]);
                }

            public function categoriesId(Request $request)
                {
                    $category = DB::table('categories')->where('id', $request->id)->first();

                    return view('category', ['category' => $category]);
                }

            public function updateCategory(Request $request, Categories $category)
                {
                    $category = Categories::find($request->id);
                    $category->name_category=$request->name_category;
                    $category->description=$request->description;

                    if ($request->file('img_category')) {
                        $category->image=$request->file('img_category');
                    }

                    $category->update($request->all());

                    return view('category', ['category' => $category]);
                }

            public function deleteCategory(Request $request)
                {
                    $category = Categories::find($request->id);
                    $category->delete();

                    return redirect('showAllCategories');
                }

}




