<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Shop\Image\StoreAction;
use App\Actions\Shop\Image\UpdateAction;
use App\Dto\Shop\Image\IndexDto;
use App\Http\Requests\Shop\Image\StoreRequest;
use App\Http\Requests\Shop\Image\UpdateRequest;
use App\Models\Shop;
use App\Models\ShopImage;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShopImageController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request, Shop $shop): JsonResponse
    {
        if ($request->ajax()) {
            return Datatables::of($shop->images)
                ->addIndexColumn()
                ->addColumn('slug', function (ShopImage $image) {
                    return $image->shop?->slug;
                })
                ->make();
        }

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    public function create(Shop $shop): View
    {
        return view('shop.image.create', [
            'shop' => $shop,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreRequest $request, Shop $shop, StoreAction $storeAction): RedirectResponse
    {
        $dto = new IndexDto($request->validated());
        $storeAction->run($dto, $shop);

        if ($request->input('save') === 'save-next') {
            return redirect()->route('shops.images.create', ['shop' => $shop]);
        }

        return redirect()->route('shops.edit', ['shop' => $shop]);
    }

    /**
     * @throws Exception
     */
    public function edit(Shop $shop, ShopImage $image): View
    {
        return view('shop.image.edit', [
            'shop' => $shop,
            'image' => $image,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(
        UpdateRequest $request,
        Shop $shop,
        ShopImage $image,
        UpdateAction $updateAction
    ): RedirectResponse {
        $dto = new IndexDto($request->validated());
        $updateAction->run($dto, $request->keys(), $image);

        return redirect()->route('shops.edit', ['shop' => $shop]);
    }

    public function destroy(ShopImage $image): JsonResponse
    {
        $image->delete();
        Storage::disk('public')->delete('images/shops/' . $image->shop?->slug . '/' . $image->name);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
