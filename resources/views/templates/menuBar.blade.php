<div class="menu_bar" style="cursor: pointer;">
    <div class="dropdown">
        <span class="" data-bs-toggle="dropdown" aria-expanded="false">
            @include('component.menu_bar')
        </span>
        <ul class="dropdown-menu" style="margin-top: 10px;">
            <li>
                <a href="{{ url('/home') }}" class="dropdown-item" type="button" href="/">
                    OneX : 5Acts Photo Kiosk
                </a>
            </li>
            <li>
                <a href="{{ url('/picture_8') }}" class="dropdown-item" type="button">
                    8X Photo Kiosk UI 1920x1080
                </a>
            </li>
            <li>
                <a href="{{ url('/video') }}" class="dropdown-item" type="button">
                    4X VDO Kiosk UI_TON
                </a>
            </li>
        </ul>
    </div>
</div>
