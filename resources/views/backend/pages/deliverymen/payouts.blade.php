@extends('backend.layouts.master')

@section('title')
    {{ localize('Payout Histories') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Payouts') }}</h2>
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
                                                    id="search" name="search"
                                                    placeholder="{{ localize('Search by name') }}"
                                                    @isset($searchKey)
                                            value="{{ $searchKey }}"
                                            @endisset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <select class="form-select select2" name="payout_status"
                                            data-minimum-results-for-search="Infinity" id="payout_status">
                                            <option value="">{{ localize('Payout Status') }}</option>
                                            <option value="pending" @if (isset($paymentStatus) && $paymentStatus == 'pending') selected @endif>
                                                {{ localize('Pending') }}</option>
                                            <option value="accepted" @if (isset($paymentStatus) && $paymentStatus == 'accepted') selected @endif>
                                                {{ localize('Accepted') }}</option>
                                            <option value="rejected" @if (isset($paymentStatus) && $paymentStatus == 'rejected') selected @endif>
                                                {{ localize('Rejected') }}</option>
                                        </select>
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
                                    <th class="text-center">{{ localize('S/L') }}</th>
                                    <th>{{ localize('Deliveryman') }}</th>
                                    <th>{{ localize('Requested On') }}</th>
                                    <th data-breakpoints="xs">{{ localize('Amount') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Status') }}</th>
                                    <th data-breakpoints="xs sm" class="text-end">{{ localize('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payouts as $key => $payout)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($payouts->currentPage() - 1) * $payouts->perPage() }}</td>
                                        <td>{{ $payout->deliveryman->name }}</td>
                                        <td>{{ $payout->created_at->format('d, M Y') }}</td>
                                        <td>{{ $payout->amount }}</td>
                                        <td>{{ $payout->status }}</td>
                                        <td class="text-end">
                                            <a data-instruction="{{ $payout->instruction }}"
                                                class="btn btn-sm p-0 tt-view-details instruction" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="View Instruction">
                                                <i data-feather="eye"></i>
                                            </a>

                                            @if ($payout->status == 'pending')
                                                <a data-href="{{ route('admin.deliverymen.payout.accept', $payout) }}"
                                                    class="btn btn-sm p-0 tt-view-details accept" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Accept Payout">
                                                    <i data-feather="check"></i>
                                                </a>

                                                <a data-href="{{ route('admin.deliverymen.payout.reject', $payout) }}"
                                                    class="btn btn-sm p-0 tt-view-details reject" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Reject Payout">
                                                    <i data-feather="x"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span>{{ localize('Showing') }}
                                {{ $payouts->firstItem() }}-{{ $payouts->lastItem() }} {{ localize('of') }}
                                {{ $payouts->total() }} {{ localize('results') }}</span>
                            <nav>
                                {{ $payouts->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="instruction" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ localize('Payout Instruction') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="instruction_text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ localize('Close') }}</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="accept" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ localize('Payout Accept') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ localize('Are you sure to accept this payout') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            data-bs-dismiss="modal">{{ localize('Accept') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ localize('Close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="reject" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ localize('Payout Reject') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label for="note">{{ localize('Rejection Note') }}</label>
                            <textarea name="note" class="form-control" id="note" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            data-bs-dismiss="modal">{{ localize('Reject') }}</button>
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
        "use strict";
        $(function() {


            $(document).on('click', '.instruction', function() {

                const modal = $('#instruction')

                modal.find('#instruction_text').html($(this).data('instruction'))

                modal.modal('show')
            })

            $(document).on('click', '.accept', function() {

                const modal = $('#accept')

                modal.find('form').attr('action', $(this).data('href'))

                modal.modal('show')
            })


            $(document).on('click', '.reject', function() {

                const modal = $('#reject')

                modal.find('form').attr('action', $(this).data('href'))

                modal.modal('show')
            })



        });
    </script>
@endsection
