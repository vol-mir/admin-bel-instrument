<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Shop;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'registration_number' => 'required|max:255|unique:shops',
        ]);

        Shop::create(array_merge($validated, [
            'slug' => Str::slug($request->input('name')),
            'physical_address' => '{}',
        ]));

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
        ]);
    }

    public function update(Request $request, Shop $shop): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'registration_number' => 'required|max:255|unique:shops,registration_number,'.$shop->id,
        ]);

        $shop->update(array_merge($validated, [
            'slug' => Str::slug($request->input('name')),
            'physical_address' => '{}',
        ]));

        return redirect()->route('shops.index');
    }

    public function destroy(Shop $shop): JsonResponse
    {
        $shop->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
