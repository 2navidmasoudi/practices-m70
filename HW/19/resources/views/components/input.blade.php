<div>
    <label for="{{ $id ?? $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $id ?? $name }}"
        value="{{ $value ?? '' }}" class="{{ $class ?? '' }}" @isset($disabled) disabled @endisset>
</div>
