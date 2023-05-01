@props(['disabled' => false])
@props(['rows' => 3])
@props(['value' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!} rows={{ $rows ? $rows : '3' }}>{{ $value ? $value : '' }}</textarea>
