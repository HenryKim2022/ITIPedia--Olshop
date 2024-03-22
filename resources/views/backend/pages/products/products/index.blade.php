@extends('backend.layouts.master')

@section('title')
    {{ localize('Products') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Products') }}</h2>
                            </div>
                            <div class="tt-action">
                                <a href="{{ route('admin.products.export') }}" class="btn btn-danger"> <i
                                        data-feather="download"></i> {{ localize('Export') }}</a>

                                <button class="btn btn-primary import"> <i data-feather="upload"></i>
                                    {{ localize('Import') }}</button>

                                @can('add_products')
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i
                                            data-feather="plus"></i> {{ localize('Add Product') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search" placeholder="{{ localize('Search') }}"
                                                    @isset($searchKey)
                                                value="{{ $searchKey }}"
                                                @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <select class="form-select select2" name="brand_id">
                                                <option value="">{{ localize('Select Brand') }}</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        @isset($brand_id)
                                                         @if ($brand_id == $brand->id) selected @endif
                                                        @endisset>
                                                        {{ $brand->collectLocalization('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <select class="form-select select2" name="is_published"
                                                data-minimum-results-for-search="Infinity">
                                                <option value="">{{ localize('Select Status') }}</option>
                                                <option value="1"
                                                    @isset($is_published)
                                                         @if ($is_published == 1) selected @endif
                                                        @endisset>
                                                    {{ localize('Published') }}</option>
                                                <option value="0"
                                                    @isset($is_published)
                                                         @if ($is_published == 0) selected @endif
                                                        @endisset>
                                                    {{ localize('Hidden') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary">
                                            <i data-feather="search" width="18"></i>
                                            {{ localize('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ localize('S/L') }}
                                    </th>
                                    <th>{{ localize('Product Name') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Brand') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Categories') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Price') }}</th>
                                    <th data-breakpoints="xs sm md">{{ localize('Published') }}</th>
                                    <th data-breakpoints="xs sm md">{{ localize('Themes') }}</th>
                                    <th data-breakpoints="xs sm md" class="text-end">{{ localize('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $product->slug) }}"
                                                class="d-flex align-items-center" target="_blank">
                                                <div class="avatar avatar-sm">
                                                    <img class="rounded-circle"
                                                        src="{{ uploadedAsset($product->thumbnail_image) }}" alt=""
                                                        onerror="this.onerror=null;this.src='{{ staticAsset('backend/assets/img/placeholder-thumb.png') }}';" />
                                                </div>
                                                <h6 class="fs-sm mb-0 ms-2">{{ $product->collectLocalization('name') }}
                                                </h6>
                                            </a>
                                        </td>
                                        <td>
                                            <span
                                                class="fs-sm">{{ optional($product->brand)->collectLocalization('name') }}</span>
                                        </td>
                                        <td>
                                            @forelse ($product->categories as $category)
                                                <span
                                                    class="badge rounded-pill bg-secondary">{{ $category->collectLocalization('name') }}</span>

                                            @empty
                                                <span class="badge rounded-pill bg-secondary">{{ localize('N/A') }}</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <div class="tt-tb-price fs-sm fw-bold">
                                                <span class="text-accent">
                                                    @if ($product->max_price != $product->min_price)
                                                        {{ formatPrice($product->min_price) }}
                                                        -
                                                        {{ formatPrice($product->max_price) }}
                                                    @else
                                                        {{ formatPrice($product->min_price) }}
                                                    @endif
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            @can('publish_products')
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" onchange="updatePublishedStatus(this)"
                                                        class="form-check-input"
                                                        @if ($product->is_published) checked @endif
                                                        value="{{ $product->id }}">
                                                </div>
                                            @endcan

                                        </td>
                                        <td> {{ $product->themes->pluck('name')}}</td>
                                        <td class="text-end">
                                            <div class="dropdown tt-tb-dropdown">
                                                <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end shadow">
                                                    @can('edit_products')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.products.edit', ['id' => $product->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                            <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                        </a>
                                                    @endcan

                                                    <a class="dropdown-item"
                                                        href="{{ route('products.show', $product->slug) }}"
                                                        target="_blank">
                                                        <i data-feather="eye"
                                                            class="me-2"></i>{{ localize('View Details') }}
                                                    </a>

                                                    @can('delete_products')
                                                        <a href="#" class="dropdown-item confirm-delete"
                                                            data-href="{{ route('admin.products.delete', $product->id) }}"
                                                            title="{{ localize('Delete') }}">
                                                            <i data-feather="trash-2" class="me-2"></i>
                                                            {{ localize('Delete') }}
                                                        </a>
                                                    @endcan

                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span>{{ localize('Showing') }}
                                {{ $products->firstItem() }}-{{ $products->lastItem() }} {{ localize('of') }}
                                {{ $products->total() }} {{ localize('results') }}</span>
                            <nav>
                                {{ $products->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="import" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.products.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        
                            <h5 class="modal-title">{{ localize('Import Products') }}</h5>
                            
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between mb-3 align-items-center">
                            <label for="import" class="h6 mb-0">{{ localize('Import File') }}</label>
                            <a href="{{asset('public/sample_product.xlsx')}}" douwnload class="btn btn-sm rounded-pill btn-secondary py-1 px-2 fs-ms"><i
                                data-feather="download"></i> {{ localize('Sample File') }}</a>
                        </div>

                            <input type="file" id="import" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ localize('Import') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ localize('Close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        "use strict"

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.warning("{{$error}}")
            @endforeach
        @endif


        $('.import').on('click', function() {
            const modal = $('#import')

            modal.modal('show');
        })

        // update feature status
        function updateFeatureStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.products.updateFeatureStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '{{ localize('Status updated successfully') }}');
                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }

        // update publish status 
        function updatePublishedStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.products.updatePublishedStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '{{ localize('Status updated successfully') }}');
                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }
    </script>
@endsection
