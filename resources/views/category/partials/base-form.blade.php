<div class="form-group">
    <x-input-label for="name" :value="__('name')"/>
    <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                  :value="isset($category) ? $category->name : old('name')" autofocus
                  autocomplete="name"/>
    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
</div>

@if (!isset($category) || isset($category) && $category->children->count() == 0)
<div class="form-group">
    <x-input-label for="parent_id" :value="__('parent')"/>
    <select id="parent_id" name="parent_id" placeholder="{{ __('parent') }}" class="form-control select2bs4e" data-allow-clear=true style="width: 100%;">
        @foreach ($parents as $value)
            <option value="{{ $value->id }}"
                    @if (isset($category) && $value->id === $category->parent_id)
                        selected="selected"
                @endif
            >{{ $value->name }}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('parent_id')"/>
</div>
@endif

<div class="form-group">
    <x-input-label for="description" :value="__('description')"/>
    <x-textarea-input id="description" name="description"
                      placeholder="{{ __('description') }}"
                      :value="isset($category) ? $category->description : old('description')"
                      autocomplete="description"/>
    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
</div>
