<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            {{-- menu baru --}}
            {{-- directive @foreach --}}
            @foreach ($sidenavmenu as $menus)
                @foreach ($menus as $key => $value)
                    @if ($key == 'heading')
                        <div class="sb-sidenav-menu-heading">
                            {{ $value }}
                        </div>
                    @endif

                    @if ($key == 'menus')
                        @foreach ($values as $menu)
                        {{-- Fungsi isset directive untuk mengecek apakah bernilai NULL/tidak --}}
                           @isset($menu['dropdown'])
                               
                           @endisset
                        @endforeach
                    @endif
                @endforeach
            @endforeach
            {{-- Menu lama --}}

            <a class="nav-link" href="/">
                <div class="sb-nav-link-icon">

                    <x-icon.bs-icon name="bi-speedometer2" />
                </div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Dropdown</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLink1"
                aria-expanded="false" aria-controls="collapseLink1">
                <div class="sb-nav-link-icon">
                    <x-icon.bs-icon name="bi-share" />
                </div>
                Link 1
                <div class="sb-sidenav-collapse-arrow">
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="collapse" id="collapseLink1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/">Link 1.1</a>
                    <a class="nav-link" href="/">Link 1.2</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLink2"
                aria-expanded="false" aria-controls="collapseLink2">
                <div class="sb-nav-link-icon">
                    <x-icon.bs-icon name="bi-share" />
                </div>
                Link 2
                <div class="sb-sidenav-collapse-arrow">
                    <x-icon.bs-icon name="bi-chevron-down" />
                </div>
            </a>
            <div class="collapse" id="collapseLink2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/">Link 2.1</a>
                    <a class="nav-link" href="/">Link 2.2</a>
                </nav>
            </div>
            <a class="nav-link" href="/">
                <div class="sb-nav-link-icon">
                    <x-icon.bs-icon name="bi-share" />
                </div>
                Link 3
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ $user['email'] }}
    </div>
    {{-- menu lama --}}
</nav>
