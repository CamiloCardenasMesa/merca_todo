<select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="{{ $name }}" id="{{ $name }}">
    @foreach ($options as $optionValue => $optionText)
        <option value="{{ $optionValue }}">{{ $optionText }}</option>
    @endforeach
</select>