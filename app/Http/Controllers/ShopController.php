<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Shop\StoreAction;
use App\Actions\Shop\UpdateAction;
use App\Dto\Shop\IndexDto;
use App\Http\Requests\Shop\StoreRequest;
use App\Http\Requests\Shop\UpdateRequest;
use App\Models\Shop;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShopController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $shops = Shop::all();

            return Datatables::of($shops)->addIndexColumn()->make();
        }

        return view('shop.index');
    }

    public function create(): View
    {
        return view('shop.create');
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreRequest $request, StoreAction $storeAction): RedirectResponse
    {
        $dto = new IndexDto($request->validated());
        $storeAction->run($dto);

        if ($request->input('save') === 'save-next') {
            return redirect()->route('shops.create');
        }

        return redirect()->route('shops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop): void
    {
        //
    }

    public function edit(Shop $shop): View
    {
        return view('shop.edit', [
            'shop' => $shop,
            'physical_address' => json_decode($shop->physical_address),
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(UpdateRequest $request, Shop $shop, UpdateAction $updateAction): RedirectResponse
    {
        $dto = new IndexDto($request->validated());
        $updateAction->run($dto, $shop);

        return redirect()->route('shops.index');
    }

    public function destroy(Shop $shop): JsonResponse
    {
        $shop->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
