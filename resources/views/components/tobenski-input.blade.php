@props(['disabled' => false])
<div class="mb-6">
    <x-label for="{{ $attr }}" :value="$title" />
    <input {{ $disabled ? 'disabled' : '' }}
        id="{{ $attr }}"
        name="{{ $attr }}"
        value="{{ old('$model->$attr') ? old('$model->$attr') : $model->$attr }}"
        {!! $attributes->merge([
            'class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            'type' => 'text'
            ]) !!}
        @if($attributes->has('type') && $attributes->get('type') == 'checkbox' && $model->online) checked @endif
        >
    @error('{{ $attr }}') <span class="text-xs italic text-danger">{{ $message }}</span>@enderror
</div>
