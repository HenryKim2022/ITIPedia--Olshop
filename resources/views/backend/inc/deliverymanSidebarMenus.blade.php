<ul class="tt-side-nav">

    <!-- dashboard -->
    <li class="side-nav-item nav-item">
        <a href="{{ route('deliveryman.dashboard') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="pie-chart"></i></span>
            <span class="tt-nav-link-text">{{ localize('Dashboard') }}</span>
        </a>
    </li>

    <!-- assigned orders -->
    <li class="side-nav-item nav-item {{ areActiveRoutes(['deliveryman.assigned'], 'tt-menu-item-active') }}">
        <a href="{{ route('deliveryman.assigned') }}"
            class="side-nav-link {{ areActiveRoutes(['deliveryman.assigned']) }}">
            <span class="tt-nav-link-icon"><i data-feather="check-square"></i></span>
            <span class="tt-nav-link-text">
                <span>{{ localize('Assigned Orders') }}</span>

                @php
                    $user = auth()->user();
                    $orders = App\Models\Order::where('deliveryman_id', $user->id)->latest();
                    $orders = $orders
                        ->where(function ($q) {
                            $q->where('delivery_status', 'order_placed')
                                ->orWhere('delivery_status', 'pending')
                                ->orWhere('delivery_status', 'processing');
                        })
                        ->count();
                @endphp

                @if ($orders > 0)
                    <small class="badge bg-danger">{{ $orders }}</small>
                @endif
            </span>
        </a>
    </li>

    <!-- picked orders -->
    <li class="side-nav-item nav-item {{ areActiveRoutes(['deliveryman.pickedUp'], 'tt-menu-item-active') }}">
        <a href="{{ route('deliveryman.pickedUp') }}"
            class="side-nav-link {{ areActiveRoutes(['deliveryman.pickedUp']) }}">
            <span class="tt-nav-link-icon"><i data-feather="shopping-bag"></i></span>
            <span class="tt-nav-link-text">
                <span>{{ localize('Picked Orders') }}</span>

                @php
                    $orders = App\Models\Order::where('deliveryman_id', $user->id)->latest();
                    $orders = $orders
                        ->where(function ($q) {
                            $q->where('delivery_status', 'picked_up');
                        })
                        ->count();
                @endphp

                @if ($orders > 0)
                    <small class="badge bg-info">{{ $orders }}</small>
                @endif
            </span>
        </a>
    </li>

    <!-- out for delivery orders -->
    <li class="side-nav-item nav-item {{ areActiveRoutes(['deliveryman.outForDelivery'], 'tt-menu-item-active') }}">
        <a href="{{ route('deliveryman.outForDelivery') }}"
            class="side-nav-link {{ areActiveRoutes(['deliveryman.outForDelivery']) }}">
            <span class="tt-nav-link-icon"><i data-feather="truck"></i></span>
            <span class="tt-nav-link-text">
                <span>{{ localize('Out For Delivery') }}</span>

                @php
                    $orders = App\Models\Order::where('deliveryman_id', $user->id)->latest();
                    $orders = $orders
                        ->where(function ($q) {
                            $q->where('delivery_status', 'out_for_delivery');
                        })
                        ->count();
                @endphp

                @if ($orders > 0)
                    <small class="badge bg-warning">{{ $orders }}</small>
                @endif
            </span>
        </a>
    </li>

    <!-- delivered orders -->
    <li class="side-nav-item nav-item {{ areActiveRoutes(['deliveryman.delivered'], 'tt-menu-item-active') }}">
        <a href="{{ route('deliveryman.delivered') }}"
            class="side-nav-link {{ areActiveRoutes(['deliveryman.delivered']) }}">
            <span class="tt-nav-link-icon"><i data-feather="gift"></i></span>
            <span class="tt-nav-link-text">
                <span>{{ localize('Delivered Orders') }}</span>

                @php
                    $orders = App\Models\Order::where('deliveryman_id', $user->id)->latest();
                    $orders = $orders
                        ->where(function ($q) {
                            $q->where('delivery_status', 'delivered');
                        })
                        ->count();
                @endphp

                @if ($orders > 0)
                    <small class="badge bg-success">{{ $orders }}</small>
                @endif
            </span>
        </a>
    </li>

    <!-- cancelled orders -->
    <li class="side-nav-item nav-item {{ areActiveRoutes(['deliveryman.cancelled'], 'tt-menu-item-active') }}">
        <a href="{{ route('deliveryman.cancelled') }}"
            class="side-nav-link {{ areActiveRoutes(['deliveryman.cancelled']) }}">
            <span class="tt-nav-link-icon"><i data-feather="x-square"></i></span>
            <span class="tt-nav-link-text">
                <span>{{ localize('Cancelled Orders') }}</span>

                @php
                    $orders = App\Models\Order::where('deliveryman_id', $user->id)->latest();
                    $orders = $orders
                        ->where(function ($q) {
                            $q->where('delivery_status', 'cancelled');
                        })
                        ->count();
                @endphp

                @if ($orders > 0)
                    <small class="badge bg-soft-danger">{{ $orders }}</small>
                @endif
            </span>
        </a>
    </li>


    <!-- Earning Histories -->
    <li class="side-nav-item nav-item">
        <a href="{{ route('deliveryman.earning-history') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="dollar-sign"></i></span>
            <span class="tt-nav-link-text">{{ localize('Earning Histories') }}</span>
        </a>
    </li>

    <!-- Payment Histories -->
    <li class="side-nav-item nav-item">
        <a href="{{ route('deliveryman.payout') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="credit-card"></i></span>
            <span class="tt-nav-link-text">{{ localize('payout Histories') }}</span>
        </a>
    </li>
</ul>
