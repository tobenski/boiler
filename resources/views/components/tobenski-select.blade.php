@props(['disabled' => false])
<div class="mb-6">
    <x-label for="{{ $attr }}" :value="$title" />

    <select {{ $disabled ? 'disabled' : '' }}
            id="{{ $attr }}"
            name="{{ $attr }}"
            {!! $attributes->merge([
                'class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            ]) !!}
            >
            <option value=null>{{ __('Choose') . ' ' . $title }}</option>
            @foreach($collection as $option)
                <option value='{{ $option->id }}' @if($option->id == $model->parent_id) selected @endif>{{ $option->name }}</option>
            @endforeach
    </select>
    @error($attr) <span class="text-xs italic text-danger">{{ $message }}</span>@enderror
</div>
