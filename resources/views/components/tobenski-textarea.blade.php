@props(['disabled' => false])
<div class="mb-6">
    <x-label for="{{ $attr }}" :value="$title" />
    <textarea {{ $disabled ? 'disabled' : '' }}
              id="{{ $attr }}"
              name="{{ $attr }}"
              {!! $attributes->merge([
                'class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
                'rows' => '10',
                ]) !!}
              >{{ $model->$attr }}</textarea>
    @error('{{ $attr }}') <span class="text-xs italic text-danger">{{ $message }}</span>@enderror
</div>
