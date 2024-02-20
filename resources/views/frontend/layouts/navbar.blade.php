
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand logo-section" href="{{ route('home') }}"><img src="{{ asset('images/rezilla-logo.png') }}" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 main-menu">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Buy
                            <i class="fa-solid fa-angle-down"></i>
                    </a>
                    @php
                    $buyPropertyTypes = App\Models\PropertyCategory::where('status',1)->get();
                   @endphp
                    <ul class="dropdown-menu">
                        @foreach($buyPropertyTypes as $buyPropertyType)
                        <li><a class="dropdown-item" href="{{ route('BuyPropertyList',['id'=>encrypt($buyPropertyType->id)]) }}">{{ $buyPropertyType->category_name}}</a></li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="#">View All</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rent
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    @php
                    $rentPropertyTypes = App\Models\PropertyCategory::where('status',2)->get();
                   @endphp
                    <ul class="dropdown-menu">
                        @foreach($rentPropertyTypes as $rentPropertyTypes)
                        <li><a class="dropdown-item" href="{{ route('RentPropertyList',['id'=>encrypt($rentPropertyTypes->id)]) }}">{{ $rentPropertyTypes->category_name	 }}</a></li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="#">View All</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PG
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    @php
                    $pgPropertyTypes = App\Models\PropertyCategory::where('status',3)->get();
                   @endphp
                    <ul class="dropdown-menu">
                        @foreach($pgPropertyTypes as $pgPropertyTypes)
                        <li><a class="dropdown-item" href="{{ route('PgPropertyList',['id'=>encrypt($pgPropertyTypes->id)]) }}">{{ $pgPropertyTypes->category_name	 }}</a></li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="#">View All</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Commercial
                            <i class="fa-solid fa-angle-down"></i>
                    </a>
                    @php
                    $commPropertyTypes = App\Models\PropertyCategory::where('status',4)->get();
                   @endphp
                    @if($commPropertyTypes->isNotEmpty())
                    <ul class="dropdown-menu">
                        @foreach($commPropertyTypes as $commPropertyTypes)
                        <li><a class="dropdown-item" href="{{ route('CommPropertyList',['id'=>encrypt($commPropertyTypes->id)]) }}">{{ $commPropertyTypes->category_name	 }}</a></li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="#">View All</a></li> --}}
                    </ul>
                    @endif
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{ route('News') }}" >
                        News and events
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('companyProfile') }}">
                        About
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
