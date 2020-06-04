<?php

namespace App\Http\Controllers;

use App\ImagesProducts;
use App\Products;
use DemeterChain\C;
use Illuminate\Http\Request;

use App\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;


class ProductController extends Controller
{

    public function CreateProducts(Request $request, Products $products, Categories $categories, ImagesProducts $images)
    {
        $message = 'Error product not create';
        $validatedData = $request->validate([
            'name_products' => 'required|string|unique:products,name_products|max:100',
            'images.*' => 'required|file|mimes:jpeg,jpg,png,gif|max:1000',
            'name_descriptions' => 'required|string|max:255',
            'categories' => 'required',
        ]);

        $products = new Products;
        $products->name_products=$request->name_products;
        $products->name_descriptions=$request->name_descriptions;
        $products->user_id = Auth::user()->id;


        if ($products->save()) {
            $message = 'Успешное создание';
        }


//        $products->categories()->attach($request->category_id);
        $products->categories()->sync($request->categories);

//        if (empty($request->images)) {
//                $defImage='default.jpg';
//            $images = new ImagesProducts;
//            $images->product_id = $products->id;
//            $images->name = $defImage;
//            $images->save();
//
//        }
        if ($request->file('images')) {
            foreach ($request->file('images') as $newImage) {
                $image = new ImagesProducts;
                $image->product_id = $products->id;
                $image->name = $newImage;
                $image->save();
            }
        }


//        $request->file('images_products')->store('uploads', 'public');
        return $message;
    }


    public function listAction(Categories $category)
    {

        $categories = Categories::all();

        return view ('createProduct', compact('categories'));
//        return view ('createProduct', ['categories' => $categories]);
    }
//        public function listActionProduct(Categories $imagesProducts)
//        {
//
//            $imageProduct = Categories::all();
//
//            return view ('showallproducts', compact('$imageProduct'));
//    //        return view ('createProduct', ['categories' => $categories]);
//        }


        public function showAllProducts(Request $request)
        {
            $categories = Categories::all();
            $products = Products::with('categories')->sortable()->paginate(5);
            $images = ImagesProducts::all();

            if ($request->sort ) {

            }
//            dd($images->main);
//            return view('showallproducts', ['products' => $products], ['categories' => $categories], ['$images' => $images]);
            return view('showallproducts', compact('products','categories','images'));
        }


        public function showCreateProduct(Products $product)
        {

            $product = Products::all();

    //        return view ('createproducts', compact('$product'));
            return view ('createProducts', ['product' => $product]);
        }

        public function productsId(Request $request, Categories $categories, Products $products, ImagesProducts $image)
        {
    //        $product = DB::table('products')->where('id', $request->id)->first();
            $categories = Categories::all();

            $product = Products::where('id',$request->id)->first();
    //        dd($product->categories);
            $image = ImagesProducts::all();

            return view('product', compact('product','categories','products','image'));
        }



        public function updateProduct(Request $request, Products $product, Categories $categories, ImagesProducts $image)
    {
//    dd($request->product->id);
        $validatedData = $request->validate([
            'name_products' => 'required|string|max:100|unique:products,name_products,'. $request->product->id,
            'categories' => 'required',
        ]);

        $product=Products::where('id',$request->product->id)->first();

        $categories = Categories::all();
        $product->name_products=$request->name_products;
        $product->name_descriptions=$request->name_descriptions;
        $product->categories()->sync($request->categories);

        if ($request->file('images')) {
            foreach ($request->file('images') as $newImage) {
                $image = new ImagesProducts;
                $image->product_id = $product->id;
                $image->name = $newImage;
                $image->save();
            }
        }

        if($request->deleteImages) {
            ImagesProducts::query()->whereIn('id', $request->deleteImages)->delete();
        }

        if ($request->imageMain) {
            $image = ImagesProducts::query()->where('product_id',$product->id)->whereNotNull('main')->first();

            if (isset($image->id))
            {
                if($image->id != $request->imageMain) {
                    $image->main = false;
                    $image->save();

                    $image = ImagesProducts::query()->where('id', $request->imageMain)->first();
                    $image->main = true;
                    $image->save();
                }
            }
            $image = ImagesProducts::query()->where('id', $request->imageMain)->first();
            $image->main = true;
            $image->save();

        }


        $product->update($request->all());

        return view('product', compact('product','categories','image'));
    }

    public function deleteProduct(Request $request, ImagesProducts $images, Products $product)
    {
        $product = Products::find($request->id);
        $product->delete();
        return redirect('showAllProducts');
    }





}
//public function Ships() {
////        $products = Products::find(1);
////        $products->categories()->attach(2);
//
////       ***** Второй вид записи
////        $products = Products::find(3);
////        $categories = Categories::find(2);
////        $products->categories()->attach($categories);
////      ****  Вывод всех продуктов категории 3
//    $category = Categories::find(3);
//    $category->products;
//    dd($category);
//    return $category;
//// удаление отношений detach
////        $category = Category::find(2);
////        $product = Product::find(1);
////        $product->categories()->detach($category);
//
//}
