<select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="{{ $name }}" id="{{ $name }}">
    @foreach ($options as $optionValue => $translationKey)
        <option value="{{ $optionValue }}">{{ $translationKey }}</option>
    @endforeach
</select>   