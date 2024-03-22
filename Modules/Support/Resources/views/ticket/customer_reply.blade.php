@extends('frontend.default.layouts.master')
@section('title')
    {{ localize('Reply Ticket') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
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
                      <div class="card">
                          <div class="card-header d-flex justify-content-between flex-wrap align-items-center">
                              <h5 class="mb-0">{{ localize('Ticket') }}: #{{ $ticket->id }} {{ $ticket->title }}</h5>
                              @if ($ticket->is_active == 1)
                                  <button class="btn btn-primary" id="post_a_reply">{{ localize('Post a Reply') }}</button>
                              @endif
                          </div>
                          <div class="card-body">
                              @if ($ticket->is_active == 1)
                                  <div class="reply-ticket d-none" id="post_reply">
                                      <form action="{{ route('support.reply.store') }}" method="POST"
                                          enctype="multipart/form-data" class="profile-form">
                                          @csrf
                                          <div class="row">
                                              <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                              <div class="mb-3">
                                                  <textarea class="editor" name="description"> {{ old('description') }} </textarea>
                                              </div>

                                              
                                              <div class="file-upload text-center rounded-3 mb-5">
                                                <input type="file" name="files">
                                                <img src="{{ staticAsset('frontend/default/assets/img/icons/image.svg') }}"
                                                    alt="dp" class="img-fluid">
                                                <p class="text-dark fw-bold mb-2 mt-3">{{ localize('Drop your files here or browse') }}
                                                  <small>* (Only .jpg, .png, will be accepted) </small>
                                                </p>
                                                <p class="mb-0 file-name"></p>
                                            </div>
                                              <div class="mb-3">
                                                  <button class="btn btn-primary" type="submit">
                                                      <i data-feather="save" class="me-1"></i>
                                                      {{ localize('Reply Ticket') }}
                                                  </button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              @endif
                              <ul class="mb-0 list-unstyled tt-reply-list">

                                  @foreach ($ticket->replies as $reply)
                                      <li class="tt-single-ticket-reply py-4 border-bottom">
                                          <div class="d-flex align-items-start">
                                             <div class="achievement-box">
                                                  <img class="rounded-circle icon"
                                                      src="{{ uploadedAsset($reply->user->avatar) }}" alt="avatar"
                                                      onerror="this.onerror=null;this.src='{{ staticAsset('/backend/assets/img/avatar/1.jpg') }}';">
                                              </div>
                                              <div class="ms-3 w-100">
                                                  <div class="d-flex justify-content-between tt-reply-head">
                                                      <div class="mb-2">
                                                          <h6 class="mb-0">{{ $reply->user->name }}</h6>
                                                          <span class="text-muted fs-sm">
                                                              {{ date('d-M-y h:i:s A', strtotime($reply->created_at)) }}</span>
                                                      </div>

                                                      <div class="tt-ticket-edit">
                                                          <button
                                                              class="border-0 p-2 bg-transparent text-muted confirm-delete"
                                                              data-href="{{ route('support.reply.destroy', $reply->id) }}"><i
                                                                  data-feather="trash-2"></i></button>
                                                      </div>
                                                  </div>

                                                  <p> {!! $reply->replied !!}</p>
                                                  @foreach ($reply->replyImages as $image)
                                                      <a href="{{ asset($image->file_path) }}" class="d-block mt-3"
                                                          download="">
                                                          <i data-feather="paperclip"
                                                              class="icon-14 me-2"></i>{{ localize('download') }}</a>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </li>
                                  @endforeach

                                  <li class="tt-single-ticket-reply py-4 border-bottom">
                                      <div class="d-flex align-items-start">
                                          <div class="achievement-box">
                                              <img class="rounded-circle icon"
                                                  src="{{ uploadedAsset($ticket->createdBy->avatar) }}" alt="avatar"
                                                  onerror="this.onerror=null;this.src='{{ staticAsset('/backend/assets/img/avatar/1.jpg') }}';">
                                          </div>
                                          <div class="ms-3 w-100">
                                              <div class="d-flex justify-content-between tt-reply-head">
                                                  <div class="mb-2">
                                                      <h6 class="mb-0">{{ $ticket->createdBy->name }}</h6>
                                                      <span
                                                          class="text-muted fs-sm">{{ date('d-M-y h:i:s A', strtotime($ticket->created_at)) }}</span>
                                                  </div>
                                                  <div class="tt-ticket-edit">

                                                  </div>
                                              </div>

                                              {!! $ticket->description !!}
                                              @foreach ($ticket->images as $item)
                                                  <a href="{{ asset($item->file_path) }}" class="d-block mt-3"
                                                      download="">
                                                      <i data-feather="paperclip"
                                                          class="icon-14 me-2"></i>{{ localize('download') }}</a>
                                              @endforeach

                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>                     
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ staticAsset('backend/assets/js/vendors/summernote-lite.min.js') }}"></script>
    <script>
        // summernote
        $(".editor").each(function(el) {
            var $this = $(this);
            var buttons = $this.data("buttons");
            var minHeight = $this.data("min-height");
            var placeholder = $this.attr("placeholder");
            var format = $this.data("format");

            buttons = !buttons ? [
                    ["font", ["bold", "underline", "italic", "clear"]],
                    ['fontname', ['fontname']],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["style", ["style"]],
                    ['fontsize', ['fontsize']],
                    ["color", ["color"]],
                    ["insert", ["link", "picture", "video"]],
                    ["view", ["undo", "redo"]],
                ] :
                buttons;
            placeholder = !placeholder ? "" : placeholder;
            minHeight = !minHeight ? 150 : minHeight;
            format = typeof format == "undefined" ? false : format;

            $this.summernote({
                toolbar: buttons,
                placeholder: placeholder,
                height: minHeight,
                codeviewFilter: false,
                codeviewIframeFilter: true,
                disableDragAndDrop: true,
                callbacks: {

                },
            });

            var nativeHtmlBuilderFunc = $this.summernote(
                "module",
                "videoDialog"
            ).createVideoNode;

            $this.summernote("module", "videoDialog").createVideoNode = function(url) {
                var wrap = $(
                    '<div class="embed-responsive embed-responsive-16by9"></div>'
                );
                var html = nativeHtmlBuilderFunc(url);
                html = $(html).addClass("embed-responsive-item");
                return wrap.append(html)[0];
            };
        });
    </script>
    <script>
        $(document).on('click', '#post_a_reply', function() {
            $("#post_reply").toggleClass("d-none");
        })
        $(document).on('click', '.confirm-delete', function(e) {
            e.preventDefault();
            var url = $(this).data("href");
            $("#delete-modal").modal("show");
            $("#delete-link").attr("href", url);
        })

        function updateStatus(el) {
            if (el.checked) {
                var is_active = 0;
            } else {
                var is_active = 1;
            }
            $.post('{{ route('support.ticket.updateStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    is_active: is_active
                },
                function(data) {
                    if (data.demo) {
                        notifyMe('warning', data.message);
                    } else {
                        if (data.status == true) {
                            notifyMe('success', data.message);
                        } else {
                            notifyMe('danger', data.message);
                        }
                    }
                });
        }
    </script>
@endsection
