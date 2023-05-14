<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Phone\StoreAction;
use App\Actions\Phone\UpdateAction;
use App\Dto\Phone\IndexDto;
use App\Http\Requests\Phone\StoreRequest;
use App\Http\Requests\Phone\UpdateRequest;
use App\Models\Phone;
use App\Tasks\GetContactTask;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    public function __construct(private GetContactTask $getContactTask)
    {
    }

    /**
     * @throws Exception
     */
    public function index(Request $request, string $type, int $id): JsonResponse
    {
        if ($request->ajax()) {
            $contact = $this->getContactTask->run($type, $id);

            return Datatables::of($contact->phones)->addIndexColumn()->make();
        }

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    public function create(string $type, int $id): View
    {
        return view('phone.create', [
            'contact' => $this->getContactTask->run($type, $id),
            'type' => $type,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreRequest $request, string $type, int $id, StoreAction $storeAction): RedirectResponse
    {
        $dto = new IndexDto($request->validated());
        $contact = $this->getContactTask->run($type, $id);
        $storeAction->run($dto, $contact);

        if ($request->input('save') === 'save-next') {
            return redirect()->route('phones.create', [
                'id' => $contact,
                'type' => $type,
            ]);
        }

        return redirect()->route($type.'.edit', [
            rtrim($type, 's') => $contact,
        ]);
    }

    /**
     * @throws Exception
     */
    public function edit(string $type, int $id, Phone $phone): View
    {
        return view('phone.edit', [
            'contact' => $this->getContactTask->run($type, $id),
            'type' => $type,
            'phone' => $phone,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(UpdateRequest $request, string $type, int $id, Phone $phone, UpdateAction $updateAction): RedirectResponse
    {
        $dto = new IndexDto($request->validated());
        $contact = $this->getContactTask->run($type, $id);
        $updateAction->run($dto, $phone);

        return redirect()->route($type.'.edit', [
            rtrim($type, 's') => $contact,
        ]);
    }

    public function destroy(Phone $phone): JsonResponse
    {
        $phone->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
