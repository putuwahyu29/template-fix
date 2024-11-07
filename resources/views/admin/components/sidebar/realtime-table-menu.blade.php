@include('admin.components.sidebar.menu-header', ['textMenuHeader' => 'Realtime Table Menu'])

@include('admin.components.sidebar.item', [
        'menuId' => 'master_shp',
        'menuText' => 'Master SHP',
        'menuUrl' => route('master_shp'),
        'menuIcon' => 'bx bx-food-menu',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'master_shpb',
        'menuText' => 'Master SHPB',
        'menuUrl' => route('master_shpb'),
        'menuIcon' => 'bx bx-food-menu',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-petugas',
        'menuText' => 'Daftar Petugas',
        'menuUrl' => route('petugas'),
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

@include('admin.components.sidebar.item', [
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
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-trackings',
        'menuText' => 'Tracking',
        'menuUrl' => route('trackings'),
        'menuIcon' => 'bx bx-map-pin',
        'subMenuData' => null,
    ])