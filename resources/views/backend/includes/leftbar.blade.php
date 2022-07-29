<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">
    <li class="br-menu-item">
      <a href="{{route('admin.dashboard')}}" class="br-menu-link active">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    {{-- <li class="br-menu-item">
      <a href="mailbox.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">Mailbox</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item --> --}}
    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Product Managements</label>
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Brand</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('brand.index')}}" class="sub-link">Manage Brand</a></li>
        <li class="sub-item"><a href="{{route('brand.create')}}" class="sub-link">Brand &amp; Create</a></li>

      </ul>
    </li>
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
        <span class="menu-item-label">Category</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('category.index')}}" class="sub-link">Manage Category</a></li>
        <li class="sub-item"><a href="{{route('category.create')}}" class="sub-link">Add Category</a></li>
      </ul>
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
        <span class="menu-item-label">Product Managements</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('product.index')}}" class="sub-link">Manage</a></li>
        <li class="sub-item"><a href="{{route('product.create')}}" class="sub-link"> Add Product</a></li>
      </ul>
    </li><!-- br-menu-item -->

    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Division Managements</label>
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Divesion</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('division.index')}}" class="sub-link">Manage Division</a></li>
        <li class="sub-item"><a href="{{route('division.create')}}" class="sub-link">Add Division</a></li>

      </ul>
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
        <span class="menu-item-label">Distict</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('district.index')}}" class="sub-link">Manage District</a></li>
        <li class="sub-item"><a href="{{route('district.create')}}" class="sub-link">Add District</a></li>
 
      </ul>
    </li><!-- br-menu-item -->
    
    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Order Managements</label>
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Order Manage</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{route('order.manage')}}" class="sub-link">Order Manage</a></li>
        <li class="sub-item"><a href="" class="sub-link">Order Show</a></li>
 
      </ul>
    </li><!-- br-menu-item -->
    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Setting Managements</label>

    <li class="br-menu-item">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
      <a href="{{route('logout')}}" class="br-menu-link with-sub"
      onclick="event.preventDefault();
                  this.closest('form').submit();">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Logout</span>
      </a><!-- br-menu-link -->
    </form>
    </li><!-- br-menu-item -->
    {{-- <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Tables</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub nav flex-column">
        <li class="sub-item"><a href="table-basic.html" class="sub-link">Basic Table</a></li>
        <li class="sub-item"><a href="table-datatable.html" class="sub-link">Data Table</a></li>
      </ul>
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Maps</span>
      </a><!-- br-menu-link -->
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="map-google.html" class="sub-link">Google Maps</a></li>
        <li class="sub-item"><a href="map-leaflet.html" class="sub-link">Leaflet Maps</a></li>
        <li class="sub-item"><a href="map-vector.html" class="sub-link">Vector Maps</a></li>
      </ul>
    </li><!-- br-menu-item --> --}}


    {{-- <li class="br-menu-item">
      <a href="pages.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Apps &amp; Pages</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="layouts.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-book-outline tx-22"></i>
        <span class="menu-item-label">Layouts</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="sitemap.html" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
        <span class="menu-item-label">Sitemap</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item --> --}}
  </ul><!-- br-sideleft-menu -->



  {{-- <div class="info-list">
    <div class="info-list-item">
      <div>
        <p class="info-list-label">Memory Usage</p>
        <h5 class="info-list-amount">32.3%</h5>
      </div>
      <span class="peity-bar" data-peity='{ "fill": ["#336490"], "height": 35, "width": 60 }'>8,6,5,9,8,4,9,3,5,9</span>
    </div><!-- info-list-item -->

    <div class="info-list-item">
      <div>
        <p class="info-list-label">CPU Usage</p>
        <h5 class="info-list-amount">140.05</h5>
      </div>
      <span class="peity-bar" data-peity='{ "fill": ["#1C7973"], "height": 35, "width": 60 }'>4,3,5,7,12,10,4,5,11,7</span>
    </div><!-- info-list-item -->

    <div class="info-list-item">
      <div>
        <p class="info-list-label">Disk Usage</p>
        <h5 class="info-list-amount">82.02%</h5>
      </div>
      <span class="peity-bar" data-peity='{ "fill": ["#8E4246"], "height": 35, "width": 60 }'>1,2,1,3,2,10,4,12,7</span>
    </div><!-- info-list-item -->

    <div class="info-list-item">
      <div>
        <p class="info-list-label">Daily Traffic</p>
        <h5 class="info-list-amount">62,201</h5>
      </div>
      <span class="peity-bar" data-peity='{ "fill": ["#9C7846"], "height": 35, "width": 60 }'>3,12,7,9,2,3,4,5,2</span>
    </div><!-- info-list-item -->
  </div><!-- info-list --> --}}

  <br>
</div><!-- br-sideleft -->