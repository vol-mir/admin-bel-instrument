<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Setting\UpdateAction;
use App\Dto\Setting\IndexDto;
use App\Http\Requests\Setting\UpdateRequest;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::where('slug', 'base')->first();

        return view('settings.edit', [
            'setting' => $setting,
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(UpdateRequest $request, UpdateAction $updateAction): RedirectResponse
    {
        $setting = Setting::where('slug', 'base')->firstOrFail();

        $dto = new IndexDto($request->validated());
        $updateAction->run($dto, $request->keys(), $setting);

        return redirect()->route('settings.edit');
    }
}
