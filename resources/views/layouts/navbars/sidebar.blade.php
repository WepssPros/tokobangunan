<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ ('TB') }}</a>
            <a href="#" class="simple-text logo-normal">{{ ('Toko Bangunan') }}</a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ ('Dashboard') }}</p>
                </a>
            </li>

            <li class="active ">
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ ('User Profile') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('dashboard.user.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ ('User Menegement') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('dashboard.product.index')  }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>{{ ('Product Menegement') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('dashboard.category.index')  }}">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p>{{ ('Category Management') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('dashboard.transaction.index')  }}">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ ('Transaction Management') }}</p>
                </a>
            </li>
            {{-- <li class="active ">
                <a href="{{ route('pages.icons') }}">
            <i class="tim-icons icon-atom"></i>
            <p>{{ ('Icons') }}</p>
            </a>
            </li>
            <li class="active ">
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ ('Maps') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ ('Notifications') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ ('Table List') }}</p>
                </a>
            </li>
            <li class="active ">
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ ('Typography') }}</p>
                </a>
            </li>

            <li class=" {{ 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ ('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
