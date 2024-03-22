@extends('frontend.default.layouts.master')

@section('title')
    {{ localize('Tickets') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="my-account pt-6 pb-120">
        <div class="container">

            @include('frontend.default.pages.users.partials.customerHero')

            <div class="row g-4">
                <div class="col-xl-3">
                    @include('frontend.default.pages.users.partials.customerSidebar')
                </div>

                <div class="col-xl-9">
                    <div class="recent-orders bg-white rounded py-5">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="mb-0">{{localize('All Tickets')}}</h5>
                        </div>
                        <div class="card-body p-0">
                          <div class="list-group list-group-flush">
                            @foreach ($tickets as $ticket)
                                
                            <a href="{{route('support.reply.index', $ticket->id)}}" target="_blank" class="list-group-item list-group-item-action py-3">
                              <div class="d-flex">
                                <div class="achievement-box">
                                    <img class="rounded-circle icon" src="{{ uploadedAsset($ticket->createdBy->avatar) }}" alt="avatar" onerror="this.onerror=null;this.src='{{ staticAsset('/backend/assets/img/avatar/1.jpg') }}';">
                                </div>
                                <div class="ms-2">
                                  <h6 class="mb-1">{{$ticket->title}}  #{{$ticket->id}}
                                    <span
                                      class="fs-ms fw-medium rounded-pill badge shadow-sm" style="background-color:{{$ticket->priority->color}}">{{$ticket->priority->name}}</span></h6>
                                  <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                      <span class="text-muted"><i data-feather="folder" class="icon-14 me-1"></i>{{localize('Category')}}:{{$ticket->category->name}}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                      <span class="text-muted"><i data-feather="user" class="icon-14 me-1"></i>{{localize('Assigned')}}: {{$ticket->category->staff->name}}</span>
                                    </li>
                                    <li class="list-inline-item">
                                      <span class="text-muted"><i data-feather="calendar" class="icon-14 me-1"></i>{{localize('Date')}}: {{date('d-M-y h:i:s A', strtotime($ticket->created_at))}}</span>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </a>
                            @endforeach
                            
            
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="d-flex align-items-center justify-content-between">
                            <span>{{ $tickets->firstItem() ?? 0 }}-{{ $tickets->lastItem() ?? 0 }}
                                {{ localize('of') }}
                                {{ $tickets->total() }} {{ localize('results') }}</span>
                                <nav>
                                    {{ $tickets->appends(request()->input())->onEachSide(0)->links() }}
                                </nav>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


