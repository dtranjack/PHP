<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // product
    public function index()
    {
        $successMessage = session('success');
        $successRecoverMsg = session('successRecovery');
        $successRecoverAllMsg = session('successRecoveryAll');
        $successUpdatedMsg = session('successUpdated');
        $successCreateMsg = session('successCreate');
        $data = DB::table('product_tbl')->where('status', 1)->paginate(10); // Change 10 to your desired items per page
        return view('admin.ProductList', compact('data', 'successMessage', 'successRecoverMsg', 'successUpdatedMsg', 'successRecoverAllMsg', 'successCreateMsg'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = DB::table('product_tbl')->where('status', 1)->where(
            function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', $query)
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('manufacturer', 'like', '%' . $query . '%');
            })->paginate(10);
        return view('admin.ProductList', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adminCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // api url : /product (method : post)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'manufacturer' => 'required|string|max:255',
            'stock' => 'required|integer',
            'created_date' => 'sometimes|required|date',
            'updated_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|integer|in:0,1'
        ]);

        $fieldsToInsert = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'size' => $request->input('size'),
            'manufacturer' => $request->input('manufacturer'),
            'stock' => $request->input('stock'),
            'created_date' => now(),
            'updated_date' => now(),
            'status' => 1
            ];

        try {
            DB::table('product_tbl')->insert($fieldsToInsert);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create the product']);
        }

        return redirect()->route('admin.product.index')->with('successCreate', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // api url : product/{id} (http method get)
        $editItem = DB::table('product_tbl')->where('id', $id)->where('status', 1)->first();
        if (!$editItem) {
            return redirect()->back()->with('error', 'Product not found');
        }
        return view('admin.adminEdit', ['editItem' => $editItem]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editItem = DB::table('product_tbl')->where('id', $id)->first();
        if (!$editItem) {
            return redirect()->back()->with('error', 'Product not found');
        }
        return view('admin.adminEdit', ['editItem' => $editItem]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'size' => 'sometimes|required|integer',
            'manufacturer' => 'sometimes|required|string|max:255',
            'stock' => 'sometimes|required|integer',
            'created_date' => 'sometimes|required|date',
            'updated_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|integer|in:0,1'
        ]);
        $fieldsToUpdate = $request->only([
            'name', 'price', 'size', 'manufacturer', 'stock', 'created_date', 'status'
        ]);
        $fieldsToUpdate['updated_date'] = now();
        DB::table('product_tbl')->where('id', $id)->update($fieldsToUpdate);
        return redirect()->route('admin.product.index')->with('successUpdated', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemHidden = DB::table('product_tbl')->where('id', $id)->update(['status' => 0]);
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully');
    }

    public function showHiddenItem()
    {
        $data = DB::table('product_tbl')->where('status', 0)->paginate(10);
        return view('admin.adminDeletedItem', ["data" => $data]);
    }

    public function recover(string $id)
    {
        $itemRecover = DB::table('product_tbl')->where('id', $id)->where('status', '0')->update(['status' => 1]);
        return redirect()->route('admin.product.index')->with('successRecovery', 'Product recovered successfully');
    }

    public function recoverAll()
    {
        $recover = DB::table('product_tbl')->where('status', '0')->update(['status' => 1]);
        return redirect()->route('admin.product.index')->with('successRecoveryAll', 'All Product recovered successfully');
    }

}
