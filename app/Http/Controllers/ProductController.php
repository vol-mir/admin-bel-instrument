<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Product\StoreAction;
use App\Actions\Product\UpdateAction;
use App\Dto\Product\IndexDto;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $brands = Product::all();

            return Datatables::of($brands)->addIndexColumn()->make();
        }

        return view('product.index');
    }

    public function create(): View
    {
        return view('product.create');
    }

    /**
     * @throws UnknownProperties
     * @throws Exception
     */
    public function store(StoreRequest $request, StoreAction $storeAction): RedirectResponse
    {
        $dto = new IndexDto($request->validated());
        $storeAction->run($dto);

        if ($request->input('save') === 'save-next') {
            return redirect()->route('products.create');
        }

        return redirect()->route('products.index');
    }

    /**
     * @throws Exception
     */
    public function edit(Product $product): View
    {
        return view('product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(
        UpdateRequest $request,
        Product $product,
        UpdateAction $updateAction
    ): RedirectResponse {
        $dto = new IndexDto($request->validated());
        $updateAction->run($dto, $request->keys(), $product);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
