<aside class="tt-sidebar bg-light-subtle" id="sidebar">
    <style>
        .tt-brand-link {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .tt-brand-content {
            display: flex;
            align-items: center;
        }

        .tt-brand-favicon {
            margin-right: 5px;
        }

        .tt-brand-logo {
            margin-left: 5px;
        }

        .tt-brand-name {
            margin-left: 5px;
        }
    </style>

    <div class="tt-brand">
        {{-- <a href="{{ auth()->user()->user_type != 'deliveryman' ? route('admin.dashboard') : route('deliveryman.dashboard') }}"
            class="tt-brand-link">
            <img src="{{ uploadedAsset(getSetting('favicon')) }}" class="tt-brand-favicon ms-1" alt="favicon" />
            <img src="{{ uploadedAsset(getSetting('admin_panel_logo')) }}" class="tt-brand-logo ms-2" alt="logo" />
        </a> --}}

        <a href="{{ auth()->user()->user_type != 'deliveryman' ? route('admin.dashboard') : route('deliveryman.dashboard') }}"
            class="tt-brand-link overflow-x-hidden">
            <img src="{{ uploadedAsset(getSetting('favicon')) }}" class="tt-brand-favicon ms-1" alt="favicon" />
            @if ((getSetting('admin_panel_logo')))
                <img src="{{ uploadedAsset(getSetting('admin_panel_logo')) }}" class="tt-brand-logo ms-2" alt="logo" />
            @else
                <span id="appname_part" class="overflow-x-hidden"><h3 class="d-inline-block px-2 m-auto">{{ env('APP_NAME') }}</h3></span>
            @endif
        </a>
        <a href="javascript:void(0);" class="tt-toggle-sidebar">
            <span><i data-feather="chevron-left"></i></span>
        </a>

        
    </div>

    <div class="tt-sidebar-nav pb-9 pt-4" data-simplebar>

        <ul class="tt-side-nav">
            <li class="side-nav-item nav-item tt-sidebar-user">
                <div class="side-nav-link bg-secondary-subtle mx-2 rounded-3 px-2">
                    <div class="tt-user-avatar lh-1">
                        <div class="avatar avatar-md status-online">
                            <img class="rounded-circle" src="{{ uploadedAsset(auth()->user()->avatar) }}"
                                alt="avatar">
                        </div>
                    </div>
                    <div class="tt-nav-link-text ms-2">
                        <h6 class="mb-0 lh-1 tt-line-clamp tt-clamp-1">{{ auth()->user()->name }}</h6>
                        @if (auth()->user()->user_type != 'deliveryman')
                            <span
                                class="text-muted fs-sm">{{ auth()->user()->role ? auth()->user()->role->name : localize('Super Admin') }}</span>
                        @else
                            <span class="text-muted fs-sm">{{ localize('Deliveryman') }}</span>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
        <nav class="navbar navbar-vertical navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="w-100" id="leftside-menu-container">
                    @if (auth()->user()->user_type != 'deliveryman')
                        @include('backend.inc.sidebarMenus')
                    @else
                        @include('backend.inc.deliverymanSidebarMenus')
                    @endif
                </div>
            </div>
        </nav>
    </div>
</aside>
