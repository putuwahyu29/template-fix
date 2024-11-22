@include('admin.components.sidebar.menu-header', ['textMenuHeader' => 'Realtime Table Menu'])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-mastershp',
        'menuText' => 'Master SHP',
        'menuUrl' => route('mastershp'),
        'menuIcon' => 'bx bx-food-menu',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-mastershpb',
        'menuText' => 'Master SHPB',
        'menuUrl' => route('mastershpb'),
        'menuIcon' => 'bx bx-food-menu',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-daftarpetugas',
        'menuText' => 'Daftar Petugas',
        'menuUrl' => route('daftarpetugas'),
        'menuIcon' => 'bx bx-list-ul', 
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-pengawasans',
        'menuText' => 'Pengawasan',
        'menuUrl' => route('pengawasans'),
        'menuIcon' => 'bx bxs-binoculars',
        'subMenuData' => null,
    ])

<!-- @include('admin.components.sidebar.item', [
        'menuId' => 'menu-pengawasan1',
        'menuText' => 'Pengawasan 1',
        'menuUrl' => route('pengawasan1'),
        'menuIcon' => 'bx bxs-binoculars',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-sampel2024',
        'menuText' => 'Sampel 2024',
        'menuUrl' => route('sampel2024'),
        'menuIcon' => 'bx bx-notepad',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-tbaru',
        'menuText' => 'Tbaru',
        'menuUrl' => route('tbaru'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ]) -->

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-trackings',
        'menuText' => 'Tracking',
        'menuUrl' => route('trackings'),
        'menuIcon' => 'bx bx-map-pin',
        'subMenuData' => null,
    ])