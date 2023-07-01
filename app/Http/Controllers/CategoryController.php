<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Category\StoreAction;
use App\Actions\Category\UpdateAction;
use App\Dto\Category\IndexDto;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $categories = Category::with('parent')->get();

            return Datatables::of($categories)->addIndexColumn()->make();
        }

        return view('category.index');
    }

    public function create(): View
    {
        return view('category.create', [
            'parents' => Category::where('parent_id', null)->get(),
        ]);
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
            return redirect()->route('categories.create');
        }

        return redirect()->route('categories.index');
    }

    /**
     * @throws Exception
     */
    public function edit(Category $category): View
    {
        return view('category.edit', [
            'category' => $category,
            'parents' => Category::where('parent_id', null)->get(),
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(
        UpdateRequest $request,
        Category $category,
        UpdateAction $updateAction
    ): RedirectResponse {
        $dto = new IndexDto($request->validated());
        $updateAction->run($dto, $request->keys(), $category);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
