<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="#">
        <!-- <img src="{{ asset('assets/admin/img/115.png') }}" class="header-brand-img desktop-logo " alt="لوگو">
            <img src="{{ asset('assets/admin/img/68-30.png') }}" class="header-brand-img icon-logo " alt="لوگو"> -->
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="">
                    <span class="shape1"></span><span class="shape2"></span>
                    <i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">داشبورد</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                    <i class="ti-package sidemenu-icon"></i>
                    <span class="sidemenu-label">مدیریت منابع انسانی </span>
                    <i class="angle fe fe-chevron-left"></i>
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{ route('employee.index') }}">پرسنل</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span class="shape1"></span><span class="shape2"></span>
                    <i class="ti-power-off sidemenu-icon"></i>
                    <span class="sidemenu-label">خروج</span>
                </a>
            </li>
            {{--end-done--}}
        </ul>
    </div>
</div>

<div class="main-header side-header sticky">
    <div class="container-fluid">
        <div class="main-header-right">
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        <div class="main-header-center">
            <div class="responsive-logo">
                <svg style="width: 150px;margin-right: 15px" viewBox="0 0 100.07 35.88">

                    <rect style=" fill: var(--primery_color);" x="32.39" y="15.34" width="6.69" height="3.34"/>
                    <rect style=" fill: var(--primery_color);" x="36.61" y="21.52" width="3.36" height="11"/>
                    <rect style=" fill: var(--primery_color);" x="57.57" y="21.52" width="3.36" height="11.04"/>
                    <rect style=" fill: var(--primery_color);" x="22.05" y="21.53" width="3.36" height="11"/>
                    <path style=" fill: var(--primery_color);"
                          d="M35.16,25.24a.52.52,0,0,1-.52.52h-5.1v-3.5H26.18V29.9H22.46a2.14,2.14,0,0,1,0-4.28H24V22.27H22.46a5.5,5.5,0,1,0,0,11h7.08V29.12h5.1a3.88,3.88,0,0,0,3.88-3.88v-3H35.16Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M38.18,19.36H48.53V15.22h5.94a3.88,3.88,0,0,0,3.87-3.88v-3H55v3a.52.52,0,0,1-.52.52H48.53V10.05H45.17V16h-7a2.14,2.14,0,0,1,0-4.28h2.23V8.37H38.18a5.5,5.5,0,0,0,0,11Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M57.49,19.36a5.45,5.45,0,0,0,5.45-5.45V8.36H59.58v5.55A2.08,2.08,0,0,1,57.49,16Z"
                          transform="translate(-16.96 -0.7)"/>
                    <rect style=" fill: var(--primery_color);" x="57.57" y="7.66" width="3.36" height="11.01"/>
                    <rect style=" fill: var(--primery_color);" x="24.16" y="7.67" width="3.34" height="3.34"/>
                    <path style=" fill: var(--primery_color);" d="M73.62,7.52h6.21V4.16H73.22a3,3,0,0,0-3,3v.19l3.36,2Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M73.28,13.86a5.49,5.49,0,0,0-5.49-5.49H64v3.35h3.8a2.14,2.14,0,1,1,0,4.28H64v3.36h3.8A5.5,5.5,0,0,0,73.28,13.86Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M71,26H69.21v-.46h3.25V22.22H65.85V29.4h4.69v.5H63.66a2.14,2.14,0,1,1,0-4.28h.88V22.27h-.88a5.5,5.5,0,1,0,0,11H73.89V28.9A2.86,2.86,0,0,0,71,26Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M49.4,22.28H45.74v4H43.62v7H47V29.6h6.09V25.94A3.66,3.66,0,0,0,49.4,22.28ZM50,26.57H48.79V25.32h.59a.63.63,0,0,1,.63.62Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M85.67,24.55l2.93,1.72.25.13,4,2.37.15.07v0a2.24,2.24,0,0,0,.78.15c1.07,0,1.79-.94,1.83-2.4A6.5,6.5,0,0,0,93,21.35c-.07-.36-.16-.72-.26-1.06l-.06-.19a10.19,10.19,0,0,0-2.19-3.83A7.25,7.25,0,0,0,89,15.06a2.86,2.86,0,0,0-3.39,0,2.89,2.89,0,0,0-1.2-.29c-1.35,0-2.25,1.21-2.28,3.09A8.23,8.23,0,0,0,85.67,24.55Zm-.61-6.81a.57.57,0,0,1,.37-.12,1.35,1.35,0,0,1,.65.2l.08.05.06-.08a1.34,1.34,0,0,1,1.21-.55,3.68,3.68,0,0,1,2,1.52,7,7,0,0,1,.88,4.1V23h.1a2.31,2.31,0,0,1,2.18,2.3c-.83-.46-4.69-2.64-5.66-3.3a4.52,4.52,0,0,1-2.07-2.84C84.75,18.61,84.77,18,85.06,17.74Z"
                          transform="translate(-16.96 -0.7)"/>
                    <path style=" fill: var(--primery_color);"
                          d="M116.17,12.15a7.94,7.94,0,0,0-2.89-3.37L112.12,8,100,1.05a2.68,2.68,0,0,0-2.63,0L83.81,8.9a1.92,1.92,0,0,0-1,1.65v3.19a.51.51,0,0,0,.23.43.49.49,0,0,0,.47,0,2.21,2.21,0,0,1,1.38-.13.47.47,0,0,0,.57-.47v-.5a.21.21,0,0,1,.1-.17.21.21,0,0,1,.19,0l11.28,6.4.23.14a10.46,10.46,0,0,1,2.63,2.21,5.59,5.59,0,0,1,1,3.34v.65a.92.92,0,0,0,1.37.79l9.36-5.37v3.13a.15.15,0,0,1-.07.12.15.15,0,0,1-.13,0l-1.77-.93a.92.92,0,0,0-.84,0l-1.16.67a.87.87,0,0,0,0,1.53l2.26,1.2A.12.12,0,0,1,110,27a.12.12,0,0,1-.07.12l-9.66,5.57a.07.07,0,0,1-.08,0,.08.08,0,0,1,0-.07v-8a4.16,4.16,0,0,0-.57-2.26,5.71,5.71,0,0,0-1.41-1.47.6.6,0,0,0-.62-.05.58.58,0,0,0-.32.54V32.57a.09.09,0,0,1,0,.07.07.07,0,0,1-.08,0L86,26.2a.4.4,0,0,1-.21-.35V25.8a.62.62,0,0,0-.28-.51l-1-.76a4.73,4.73,0,0,1-.4-.34,3.94,3.94,0,0,1-.77-1,.13.13,0,0,0-.13-.09.16.16,0,0,0-.15.08,1.19,1.19,0,0,0-.15.58v2.74A2.2,2.2,0,0,0,84,28.4l13.66,7.89a2.23,2.23,0,0,0,2.2,0l13.66-7.89a2.2,2.2,0,0,0,1.1-1.91V19.43l1.86-1.06a1.13,1.13,0,0,0,.57-1v-.51A10.36,10.36,0,0,0,116.17,12.15ZM115,16a.72.72,0,0,1-.33.43l-11,6.43a.73.73,0,0,1-1-.27.72.72,0,0,1,.27-1l11-6.43a.73.73,0,0,1,.35-.09.68.68,0,0,1,.2,0,.72.72,0,0,1,.43.34A.7.7,0,0,1,115,16Zm-13.75,2.56a.7.7,0,0,1,.34-.43l10.83-6.26a.65.65,0,0,1,.36-.1.72.72,0,0,1,.36,1.34l-10.83,6.26a.72.72,0,0,1-1.06-.81Zm-2.61-3.33a1.44,1.44,0,0,0,1.1-.39,1.47,1.47,0,0,0,.47-1.07V4.62a.07.07,0,0,1,0-.06s0,0,.07,0l9.55,5.52a.21.21,0,0,1,.11.16.25.25,0,0,1-.06.2L99.1,16.62a.92.92,0,0,1-.91,0L87.6,10.5a.24.24,0,0,1,0-.42l9.55-5.52h.08a.09.09,0,0,1,0,.06v9.1A1.48,1.48,0,0,0,98.61,15.21Z"
                          transform="translate(-16.96 -0.7)"/>
                </svg>
            </div>
        </div>
        <div class="main-header-right">
            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link" href="#">
                    <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                    <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                </a>
            </div>
            <div class="dropdown main-header-notification">
                <a class="nav-link icon" href="#">
                    <i class="fe fe-bell header-icons"></i>
                    {{-- <span --}}
                    {{-- class="badge badge-danger nav-link-badge">{{$orders->where('status','confirmation')->count()}}</span> --}}
                </a>
                <div class="dropdown-menu" style="overflow: auto;height: 400px">
                    <div class="main-notification-list">
                        {{-- @foreach ($orders->where('status', 'confirmation') as $order) --}}
                        {{-- <div class="media new"> --}}
                        {{-- <div class="media-body"> --}}
                        {{-- <a target="_blank" href="{{ route('admin.orders.edit',$order->id) }}"> --}}
                        {{-- <p>سفارش جدید : شماره سفارش <strong> {{$order->id}}</strong></p> --}}
                        {{-- <span> --}}
                        {{-- {{verta($order->created_at)->format("%d %B %Y")}} --}}
                        {{-- </span> --}}
                        {{-- </a> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- @endforeach --}}
                    </div>
                    {{-- <div class="dropdown-footer"> --}}
                    {{-- <a href="{{ route('admin.orders.index') }}">مشاهده همه سفارشات </a> --}}
                    {{-- </div> --}}
                </div>
            </div>

            <div class="dropdown main-profile-menu">
                <a class="d-flex" href="#">
                    {{--                    <span class="main-img-user">--}}
                    {{-- <img alt="آواتار" src="{{ asset('assets/admin/img/users/1.jpg') }}"></span> --}}
                </a>
                <div class="dropdown-menu">
                    <p class="dropdown-item m-0"> عزیز خوش آمدید </p>
                    <a class="dropdown-item" href="">
                        <i class="fe fe-settings"></i> تغییر رمز
                    </a>
                    <a class="dropdown-item" href="">
                        <i class="ti-power-off"></i> خروج از سیستم
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile-header closed -->
