{{-- @extends('layouts.app') --}}

{{-- @section('sidebar') --}}
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{getRouterValue()}}dashboard/analytics">
                        <img src="{{Vite::asset('resources/images/logo.svg')}}" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{getRouterValue()}}dashboard/analytics" class="nav-link"> CORK </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu {{ ($catName === 'dashboard') ? 'active' : '' }}">
    <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <span>Dashboard</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled {{ ($catName === 'dashboard') ? 'show' : '' }}" id="dashboard" data-bs-parent="#accordionExample">
        <li class="{{ Request::routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}">Home</a>
        </li>
    </ul>
</li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
            </li>

               <li class="menu {{ ($catName === 'core') ? 'active' : '' }}">
                <a href="#core" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'core') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                        <span>Core</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'core') ? 'show' : '' }}" id="core" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('audit.index') ? 'active' : '' }}">
                    <a href="{{ route('audit.index') }}">
                        Auditoría
                    </a>
                </li>
                </ul>
            </li>

             <li class="menu {{ ($catName === 'users') ? 'active' : '' }}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'users') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'users') ? 'show' : '' }}" id="users" data-bs-parent="#accordionExample">
                <li class="{{ Request::routeIs('users.list') ? 'active' : '' }}">
                    <a href="{{ route('users.list') }}"> Usuarios </a>
                </li>
                <li class="{{ Request::routeIs('profile') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}user/profile"> Profile </a>
                    </li>
                    <li class="{{ Request::routeIs('accountSetting') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}user/account-setting"> Account Settings </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ ($catName === 'apps') ? 'active' : '' }}">
                <a href="#apps" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'apps') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Apps</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'apps') ? 'show' : '' }}" id="apps" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('apps.calendar') ? 'active' : '' }}">
                        <a href="{{ route('apps.calendar') }}"> Calendar </a>
                    </li>
                    <li class="{{ Request::routeIs('chat') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}app/chat"> Chat </a>
                    </li>
                    <li class="{{ Request::routeIs('mailbox') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}app/mailbox"> Mailbox </a>
                    </li>
                    <li class="{{ Request::routeIs('todolist') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}app/todolist"> Todo List </a>
                    </li>
                    <li class="{{ Request::routeIs('notes') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}app/notes"> Notes </a>
                    </li>
                    <li class="{{ Request::routeIs('scrumboard') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}app/scrumboard"> Scrumboard </a>
                    </li>
                    <li class="{{ Request::routeIs('contacts') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}app/contacts"> Contacts </a>
                    </li>
                    <li> 
                        <a href="#invoice" data-bs-toggle="collapse" aria-expanded="{{ isset($submenu) && $submenu === 'invoice' ? 'true' : 'false' }}" class="dropdown-toggle collapsed">Invoice <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="collapse list-unstyled sub-submenu {{ isset($submenu) && $submenu === 'invoice' ? 'show' : '' }}" id="invoice" data-bs-parent="#apps"> 
                            <li class="{{ Request::routeIs('ilist') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/invoice/list"> List </a>
                            </li>
                            <li class="{{ Request::routeIs('ipreview') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/invoice/preview"> Preview </a>
                            </li>
                            <li class="{{ Request::routeIs('icreate') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/invoice/create"> Add </a>
                            </li>
                            <li class="{{ Request::routeIs('iedit') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/invoice/edit"> Edit </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#ecommerce" data-bs-toggle="collapse" aria-expanded="{{ isset($submenu) && $submenu === 'ecommerce' ? 'true' : 'false' }}" class="dropdown-toggle collapsed">Ecommerce <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="collapse list-unstyled sub-submenu {{ isset($submenu) && $submenu === 'ecommerce' ? 'show' : '' }}" id="ecommerce" data-bs-parent="#apps"> 
                            <li class="{{ Request::routeIs('bshop') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/ecommerce/shop"> Shop </a>
                            </li>
                            <li class="{{ Request::routeIs('bproduct') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/ecommerce/product"> Product </a>
                            </li>
                            <li class="{{ Request::routeIs('blist') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/ecommerce/list"> List </a>
                            </li>
                            <li class="{{ Request::routeIs('bcreate') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/ecommerce/create"> Create </a>
                            </li>                            
                            <li class="{{ Request::routeIs('bedit') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/ecommerce/edit"> Edit </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#blog" data-bs-toggle="collapse" aria-expanded="{{ isset($submenu) && $submenu === 'blog' ? 'true' : 'false' }}" class="dropdown-toggle collapsed">Blog <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="collapse list-unstyled sub-submenu {{ isset($submenu) && $submenu === 'blog' ? 'show' : '' }}" id="blog" data-bs-parent="#apps"> 
                            <li class="{{ Request::routeIs('bgrid') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/blog/grid"> Grid </a>
                            </li>
                            <li class="{{ Request::routeIs('blist') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/blog/list"> List </a>
                            </li>
                            <li class="{{ Request::routeIs('bpost') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/blog/post"> Post </a>
                            </li>
                            <li class="{{ Request::routeIs('bcreate') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/blog/create"> Create </a>
                            </li>                            
                            <li class="{{ Request::routeIs('bedit') ? 'active' : '' }}">
                                <a href="{{getRouterValue()}}app/blog/edit"> Edit </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
            </li>

            <li class="menu {{ ($catName === 'component') ? 'active' : '' }}">
                <a href="#components" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'component') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Components</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'component') ? 'show' : '' }}" id="components" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('tabs') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/tabs"> Tabs </a>
                    </li>
                    <li class="{{ Request::routeIs('accordions') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/accordions"> Accordions  </a>
                    </li>
                    <li class="{{ Request::routeIs('modals') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/modals"> Modals </a>
                    </li>                            
                    <li class="{{ Request::routeIs('cards') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/cards"> Cards </a>
                    </li>
                    <li class="{{ Request::routeIs('carousel') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/carousel">Carousel</a>
                    </li>
                    <li class="{{ Request::routeIs('splide') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/splide">Splide</a>
                    </li>
                    <li class="{{ Request::routeIs('sweetAlert') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/sweet-alerts"> Sweet Alerts </a>
                    </li>
                    <li class="{{ Request::routeIs('timeline') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/timeline"> Timeline </a>
                    </li>
                    <li class="{{ Request::routeIs('notifications') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/notifications"> Notifications </a>
                    </li>
                    <li class="{{ Request::routeIs('mediaObject') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/media-objects"> Media Object </a>
                    </li>
                    <li class="{{ Request::routeIs('listGroup') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/list-group"> List Group </a>
                    </li>
                    <li class="{{ Request::routeIs('pricingTable') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/pricing-tables"> Pricing Tables </a>
                    </li>
                    <li class="{{ Request::routeIs('lightbox') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/lightbox"> Lightbox </a>
                    </li>
                    <li class="{{ Request::routeIs('dragDrop') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/drag-drop"> Drag and Drop </a>
                    </li>
                    <li class="{{ Request::routeIs('fontIcons') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/font-icons"> Font Icons </a>
                    </li>
                    <li class="{{ Request::routeIs('flagIcons') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}component/flag-icons"> Flag Icons </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ ($catName === 'element') ? 'active' : '' }}">
                <a href="#elements" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'element') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>Elements</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'element') ? 'show' : '' }}" id="elements" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('alerts') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/alerts"> Alerts </a>
                    </li>
                    <li class="{{ Request::routeIs('avatar') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/avatar"> Avatar </a>
                    </li>
                    <li class="{{ Request::routeIs('badges') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/badges"> Badges </a>
                    </li>
                    <li class="{{ Request::routeIs('breadcrumbs') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/breadcrumbs"> Breadcrumbs </a>
                    </li>                            
                    <li class="{{ Request::routeIs('buttons') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/buttons"> Buttons </a>
                    </li>
                    <li class="{{ Request::routeIs('buttonGroups') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/button-groups"> Button Groups </a>
                    </li>
                    <li class="{{ Request::routeIs('colorLibrary') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/color-library"> Color Library </a>
                    </li>
                    <li class="{{ Request::routeIs('dropdown') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/dropdown"> Dropdown </a>
                    </li>
                    <li class="{{ Request::routeIs('infobox') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/infobox"> Infobox </a>
                    </li>
                    <li class="{{ Request::routeIs('loader') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/loader"> Loader </a>
                    </li>
                    <li class="{{ Request::routeIs('pagination') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/pagination"> Pagination </a>
                    </li>
                    <li class="{{ Request::routeIs('popovers') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/popovers"> Popovers </a>
                    </li>
                    <li class="{{ Request::routeIs('progressbar') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/progressbar"> Progress Bar </a>
                    </li>
                    <li class="{{ Request::routeIs('search') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/search"> Search </a>
                    </li>
                    <li class="{{ Request::routeIs('tooltips') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/tooltips"> Tooltips </a>
                    </li>
                    <li class="{{ Request::routeIs('treeview') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/treeview"> Treeview </a>
                    </li>
                    <li class="{{ Request::routeIs('typography') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}element/typography"> Typography </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ Request::routeIs('maps') ? 'active' : '' }}">
                <a href="{{getRouterValue()}}maps" aria-expanded="{{ Request::routeIs('maps') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                        <span>Maps</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ Request::routeIs('charts') ? 'active' : '' }}">
                <a href="{{getRouterValue()}}charts" aria-expanded="{{ Request::routeIs('charts') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                        <span>Charts</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ Request::routeIs('widgets') ? 'active' : '' }}">
                <a href="{{getRouterValue()}}widgets" aria-expanded="{{ Request::routeIs('widgets') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span>Widgets</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ ($catName === 'layout') ? 'active' : '' }}">
                <a href="#layouts" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'layout') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                        <span>Layouts</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'layout') ? 'show' : '' }}" id="layouts" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('blank') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}layout/blank"> Blank Page </a>
                    </li>
                    <li class="{{ Request::routeIs('empty') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}layout/empty"> Empty Page </a>
                    </li>
                    <li class="{{ Request::routeIs('boxed') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}layout/boxed"> Boxed </a>
                    </li>
                    <li class="{{ Request::routeIs('collapsed') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}layout/collapsible"> Collapsed Menu </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TABLES AND FORMS</span></div>
            </li>

            <li class="menu {{ Request::routeIs('tables') ? 'active' : '' }}">
                <a href="{{getRouterValue()}}tables" aria-expanded="{{ Request::routeIs('tables') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Tables</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ ($catName === 'datatable') ? 'active' : '' }}">
                <a href="#datatables" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'datatable') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>DataTables</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'datatable') ? 'show' : '' }}" id="datatables" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('basic') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}datatable/basic"> Basic </a>
                    </li>
                    <li class="{{ Request::routeIs('striped') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}datatable/striped"> Striped </a>
                    </li>
                    <li class="{{ Request::routeIs('custom') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}datatable/custom"> Custom </a>
                    </li>
                    <li class="{{ Request::routeIs('miscellaneous') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}datatable/miscellaneous"> Miscellaneous </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ ($catName === 'form') ? 'active' : '' }}">
                <a href="#forms" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'form') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Forms</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'form') ? 'show' : '' }}" id="forms" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('basic') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form.basic"> Basic </a>
                    </li>
                    <li class="{{ Request::routeIs('inputGroup') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/input-group"> Input Group </a>
                    </li>
                    <li class="{{ Request::routeIs('layouts') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/layouts"> Layouts </a>
                    </li>
                    <li class="{{ Request::routeIs('validation') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/validation"> Validation </a>
                    </li>
                    <li class="{{ Request::routeIs('inputMask') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/input-mask"> Input Mask </a>
                    </li>
                    <li class="{{ Request::routeIs('tomSelect') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/tom-select"> Tom Select </a>
                    </li>
                    <li class="{{ Request::routeIs('tagify') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/tagify"> Tagify </a>
                    </li>
                    <li class="{{ Request::routeIs('touchspin') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/touchspin"> TouchSpin </a>
                    </li>
                    <li class="{{ Request::routeIs('maxlength') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/maxlength"> Maxlength </a>
                    </li>                          
                    <li class="{{ Request::routeIs('checkbox') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/checkbox"> Checkbox </a>
                    </li>
                    <li class="{{ Request::routeIs('radio') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/radio"> Radio </a>
                    </li>
                    <li class="{{ Request::routeIs('switches') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/switches"> Switches </a>
                    </li>
                    <li class="{{ Request::routeIs('wizards') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/wizards"> Wizards </a>
                    </li>
                    <li class="{{ Request::routeIs('fileUpload') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/file-upload"> File Upload </a>
                    </li>
                    <li class="{{ Request::routeIs('quillEditor') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/quill-editor"> Quill Editor </a>
                    </li>
                    <li class="{{ Request::routeIs('markdownEditor') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/markdown-editor"> Markdown Editor </a>
                    </li>
                    <li class="{{ Request::routeIs('dateTimePicker') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/date-time-picker"> Date Time Picker </a>
                    </li>
                    <li class="{{ Request::routeIs('slider') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/slider"> Slider </a>
                    </li>
                    <li class="{{ Request::routeIs('clipboard') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/clipboard"> Clipboard </a>
                    </li>
                    <li class="{{ Request::routeIs('autoComplete') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}form/auto-complete"> Auto Complete </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER AND PAGES</span></div>
            </li>                    

            <li class="menu {{ ($catName === 'user') ? 'active' : '' }}">
                <a href="#users" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'user') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'user') ? 'show' : '' }}" id="users" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('profile') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}user/profile"> Profile </a>
                    </li>
                    <li class="{{ Request::routeIs('accountSetting') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}user/account-setting"> Account Settings </a>
                    </li>
                </ul>
            </li>

            <li class="menu {{ ($catName === 'page') ? 'active' : '' }}">
                <a href="#pages" data-bs-toggle="collapse" aria-expanded="{{ ($catName === 'page') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span>Pages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($catName === 'page') ? 'show' : '' }}" id="pages" data-bs-parent="#accordionExample">
                    <li class="{{ Request::routeIs('knowledgeBase') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}pages/knowledge-base"> Knowledge Base </a>
                    </li>
                    <li class="{{ Request::routeIs('faq') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}pages/faq"> FAQ </a>
                    </li>
                    <li class="{{ Request::routeIs('contactForm') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}pages/contact-us"> Contact Us </a>
                    </li>
                    <li class="{{ Request::routeIs('error404') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}pages/404" target="_blank"> Error </a>
                    </li>
                    <li class="{{ Request::routeIs('maintenance') ? 'active' : '' }}">
                        <a href="{{getRouterValue()}}pages/maintenance" target="_blank"> Maintanence </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#authentication" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <span>Authentication</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="authentication" data-bs-parent="#accordionExample">
                    <li>
                        <a href="{{getRouterValue()}}authentication/boxed/sign-in" target="_blank"> Sign In </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/boxed/sign-up" target="_blank"> Sign Up </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/boxed/lockscreen" target="_blank"> Unlock </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/boxed/password-reset" target="_blank"> Reset </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/boxed/2-step-verification" target="_blank"> 2 Step </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/cover/sign-in" target="_blank"> Sign In Cover </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/cover/sign-up" target="_blank"> Sign Up Cover </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/cover/lockscreen" target="_blank"> Unlock Cover </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/cover/password-reset" target="_blank"> Reset Cover </a>
                    </li>
                    <li>
                        <a href="{{getRouterValue()}}authentication/cover/2-step-verification" target="_blank"> 2 Step Cover </a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>MISCELLANEOUS</span></div>
            </li>

            <li class="menu">
                <a href="#menuLevel1" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        <span>Item Level</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="menuLevel1" data-bs-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Item Level 1a </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Item Level 1b </a>
                    </li>

                    <li>
                        <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"> Item Level 1c <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="collapse list-unstyled sub-submenu" id="level-three" data-bs-parent="#pages"> 
                            <li>
                                <a href="javascript:void(0);"> Item Level 2a </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Item Level 2b </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Item Level 2c </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle disabled">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        <span>Item Disabled</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        <span>Item Label</span>
                        <span class="badge badge-primary sidebar-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle badge-icon"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> New</span>
                    </div>
                </a>
            </li>
            
            <li class="menu">
                <a target="_blank" href="https://designreset.com/cork/documentation/laravel/index.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>Documentation</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a target="_blank" href="https://designreset.com/cork/documentation/laravel/changelog.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                        <span>Changelog</span>
                    </div>
                </a>
            </li>
            
        </ul>
        
    </nav>

</div>
{{-- @endsection --}}