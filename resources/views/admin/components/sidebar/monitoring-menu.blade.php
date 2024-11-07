@include('admin.components.sidebar.menu-header', ['textMenuHeader' => 'Monitoring Menu'])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-ringkasan',
        'menuText' => 'Ringkasan',
        'menuUrl' => route('ringkasan'),
        'menuIcon' => 'bx bx-bar-chart-square',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-rutinan',
        'menuText' => 'SHP SHPB',
        'menuUrl' => route('rutinan'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-pengawasan',
        'menuText' => 'Pengawasan',
        'menuUrl' => route('pengawasan'),
        'menuIcon' => 'bx bxs-binoculars',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-trackings',
        'menuText' => 'Tracking',
        'menuUrl' => route('tracking'),
        'menuIcon' => 'bx bx-map-pin',
        'subMenuData' => null,
    ])

