<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\UnitType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:1', 'max:150'],
            'description' => ['nullable', 'max:255'],
            'buy_price' => ['required'],
            'sell_price' => ['required'],
            'stock' => ['required'],
            'supplier_id' => ['required'],
            'unit_type' => ['required'],
            'status' => ['required']
        ]);

        $product = Product::create($incomingFields);

        return redirect('/dashboard/p/list')->with([
            'alert' => 'Producto: ' . $product->name . ' registrado con exito!',
            'alertColor' => 'alert-primary',
            'alertIcon' => 'info'
        ]);
    }

    public function getCreateProduct()
    {
        $unitTypes = UnitType::all();
        $suppliers = Supplier::all();
        if (count($unitTypes) < 1) {
            return redirect('/dashboard/p/list')->with([
                'alert' => 'Ups! No se pudo recuperar el listado de tipos de unidad. Debe añadirlas antes de agregar productos.',
                'alertColor' => 'alert-primary',
                'alertIcon' => 'info'
            ]);
        } else if (count($suppliers) < 1) {
            return redirect('/dashboard/p/list')->with([
                'alert' => 'Ups! No se pudo recuperar el listado de proveedores. Debe añadir uno antes de agregar un producto.',
                'alertColor' => 'alert-primary',
                'alertIcon' => 'info'
            ]);
        } else {
            return view(
                'product.new_product',
                [
                    'unitTypes' => $unitTypes,
                    'suppliers' => $suppliers
                ]
            );
        }
    }

    public function listProducts()
    {
        $products = Product::all();
        return view('product.product_list', ['products' => $products]);
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('product.product_detail', ['p' => $product]);
        }
        else {
            return redirect('/dashboard/p/list')->with([
                'alert' => 'Error! El detalle del producto de código: ' . $id . ' no esta disponible actualmente o el producto no existe.',
                'alertColor' => 'alert-danger',
                'alertIcon' => 'error'
            ]);
        }
    }
}
