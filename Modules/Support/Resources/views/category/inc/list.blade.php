<div class="col-12">
    <div class="card mb-4" id="section-1">
        <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
            <div class="card-header border-bottom-0">
                <div class="row justify-content-between g-3">
                    <div class="col-auto flex-grow-1">
                        <div class="tt-search-box">
                            <div class="input-group">
                                <span
                                    class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                    <i data-feather="search"></i></span>
                                <input class="form-control rounded-start w-100" type="text"
                                    id="search" name="search"
                                    placeholder="{{ localize('Search') }}..."
                                    @isset($searchKey)
                    value="{{ $searchKey }}"
                @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">
                            <i data-feather="search" width="18"></i>
                            {{ localize('Search') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
            <thead>
                <tr>
                    <th class="text-center" width="7%">{{ localize('S/L') }}</th>
                    <th>{{ localize('Name') }}</th>
                    <th>{{localize('Assign Staff')}}</th>
                    <th>{{localize('Status')}}</th>
                    <th data-breakpoints="xs sm" class="text-end">{{ localize('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td class="text-center">
                            {{ $key + 1 + ($categories->currentPage() - 1) * $categories->perPage() }}
                        </td>

                        <td class="">
                            <div class="fw-semibold d-flex align-items-center">                               
                                <div class="ms-1">{{ $category->name }}
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$category->staff->name}}
                        </td>
                        <td>
                            <x-status-change :modelid="$category->id" :table="$category->getTable()"
                                :status="$category->is_active" />
                        </td>
                        <td class="text-end">
                            @if (auth()->user()->user_type != 'customer')
                                <div class="dropdown tt-tb-dropdown">
                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end shadow">
                                        <a class="dropdown-item"
                                            href="{{ route('support.category.edit', ['id' => $category->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                            <i data-feather="edit-3"
                                                class="me-2"></i>{{ localize('Edit') }}
                                        </a>

                                        <a href="#" class="dropdown-item confirm-delete"
                                            data-href="{{ route('support.category.destroy', $category->id) }}"
                                            title="{{ localize('Delete') }}">
                                            <i data-feather="trash-2" class="me-2"></i>
                                            {{ localize('Delete') }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                @if ((int) $category->user_id == auth()->user()->id)
                                    <div class="dropdown tt-tb-dropdown">
                                        <button type="button" class="btn p-0"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end shadow">
                                            <a class="dropdown-item"
                                                href="{{ route('support.category.edit', ['id' => $category->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                <i data-feather="edit-3"
                                                    class="me-2"></i>{{ localize('Edit') }}
                                            </a>

                                            <a href="#" class="dropdown-item confirm-delete"
                                                data-href="{{ route('support.category.destroy', $category->id) }}"
                                                title="{{ localize('Delete') }}">
                                                <i data-feather="trash-2" class="me-2"></i>
                                                {{ localize('Delete') }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!--pagination start-->
        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
            <span>{{ localize('Showing') }}
                {{ $categories->firstItem() }}-{{ $categories->lastItem() }} {{ localize('of') }}
                {{ $categories->total() }} {{ localize('results') }}</span>
            <nav>
                {{ $categories->appends(request()->input())->links() }}
            </nav>
        </div>
        <!--pagination end-->
    </div>
</div>