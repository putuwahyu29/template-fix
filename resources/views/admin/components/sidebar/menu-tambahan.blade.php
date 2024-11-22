@include('admin.components.sidebar.menu-header', ['textMenuHeader' => 'Menu Tambahan'])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-plot',
        'menuText' => 'Plot Petugas',
        'menuUrl' => route('plot'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-ringkasan',
        'menuText' => 'Ringkasan',
        'menuUrl' => route('ringkasan'),
        'menuIcon' => 'bx bx-bar-chart-square',
        'subMenuData' => null,
    ])
