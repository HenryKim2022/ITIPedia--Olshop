@foreach ($categories as $category)
    <option value="{{ $category->id }}" {{isset($product) ?  ($product->categories()->pluck('category_id')->contains($category->id) ? 'selected' : '') : '' }}>
        {{ $category->collectLocalization('name') }}</option>
    @foreach ($category->childrenCategories as $childCategory)
        @include('backend.pages.products.products.subCategory', [
            'subCategory' => $childCategory,
        ])
    @endforeach
@endforeach
