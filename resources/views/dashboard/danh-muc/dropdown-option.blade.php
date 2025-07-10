<option value="{{ $category->id }}">
    {{ $prefix . $category->name }}
</option>

@if ($category->children && $category->children->count())
    @foreach ($category->children as $child)
        @include('dashboard.danh-muc.dropdown-option', ['category' => $child, 'prefix' => $prefix . '— '])
    @endforeach
@endif
