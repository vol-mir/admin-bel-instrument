<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Brand\StoreAction;
use App\Actions\Brand\UpdateAction;
use App\Dto\Brand\IndexDto;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $brands = Brand::all();

            return Datatables::of($brands)->addIndexColumn()->make();
        }

        return view('brand.index');
    }

    public function create(): View
    {
        return view('brand.create');
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
            return redirect()->route('brands.create');
        }

        return redirect()->route('brands.index');
    }

    /**
     * @throws Exception
     */
    public function edit(Brand $brand): View
    {
        return view('brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(
        UpdateRequest $request,
        Brand $brand,
        UpdateAction $updateAction
    ): RedirectResponse {
        $dto = new IndexDto($request->validated());
        $updateAction->run($dto, $request->keys(), $brand);

        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand): JsonResponse
    {
        $brand->delete();
        Storage::disk('public')->delete('images/brands/' . $brand->name);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
