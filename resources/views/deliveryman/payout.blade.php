@extends('backend.layouts.master')

@section('title')
    {{ localize('Payout') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
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

                            <div>
                                <button class="btn btn-sm btn-primary payout">{{ localize('Payout') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">


                        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ localize('S/L') }}</th>
                                    <th>{{ localize('Payout Amount') }}</th>
                                    <th>{{ localize('Payout Instruction') }}</th>
                                    <th>{{ localize('Status') }}</th>
                                    <th>{{ localize('Payout Date') }}</th>
                                    <th>{{ localize('Action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($payouts as $key => $payout)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($payouts->currentPage() - 1) * $payouts->perPage() }}</td>
                                        <td>{{ $payout->amount }}</td>
                                        <td>{{ strip_tags($payout->instruction) }}</td>
                                        <td>
                                            {{ $payout->status }}
                                        </td>

                                        <td>
                                            {{ $payout->created_at->format('d, M Y') }}
                                        </td>


                                        @if ($payout->status == 'rejected')
                                            <td>
                                                <button class="btn btn-sm p-0 tt-view-details note ms-1" data-note="{{$payout->note}}"><i
                                                        data-feather="eye"></i></button>
                                            </td>
                                        @else

                                            <td>{{localize('n/a')}}</td>

                                        @endif
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


                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="payout" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ localize('Payout Request') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ localize('Current Balance ' . auth()->user()->user_balance . ' ' . getSetting('default_currency')) }}
                        </h4>

                        <div class="col-md-12 my-3">
                            <label for="payout">{{ localize('Payout Amount') }}</label>
                            <input type="number" step="any" name="payout" class="form-control" id="payout"
                                value="{{ old('payout') }}">
                            @error('payout')
                                <p class="text-danger">{{ $errors->first('payout') }}</p>
                            @enderror
                        </div>


                        <div class="col-md-12 my-3">
                            <label for="instruction">{{ localize('Payout Instruction') }}</label>
                            <textarea name="instruction" id="instruction" cols="30" rows="20" class="form-control editor">{{ old('instruction') }}</textarea>
                            @error('instruction')
                                <p class="text-danger">{{ $errors->first('instruction') }}</p>
                            @enderror

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ localize('Payout') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ localize('Close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="note" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{localize('Rejection Note')}}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="note_de"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{localize('Close')}}</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script>
        "use strict";
        $(function() {

            const modal = $('#payout')

            @if ($errors->any())
                modal.modal('show')
            @endif

            $('.payout').on('click', function() {
                modal.modal('show');
            })


            $(document).on('click','.note', function() {
                const modal = $('#note')

                modal.find('#note_de').text($(this).data('note'));

                modal.modal('show');
            })
        });
    </script>
@endsection
