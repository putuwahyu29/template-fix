@include('admin.components.sidebar.menu-header', ['textMenuHeader' => 'Monitoring Menu'])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-ringkasan',
        'menuText' => 'Ringkasan',
        'menuUrl' => route('ringkasan'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-rutinan',
        'menuText' => 'Rutinan',
        'menuUrl' => route('rutinan'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-pengawasan',
        'menuText' => 'Pengawasan',
        'menuUrl' => route('pengawasan'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-susenas',
        'menuText' => 'Susenas',
        'menuUrl' => route('susenas'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-seruti',
        'menuText' => 'Seruti',
        'menuUrl' => route('seruti'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-sakernas',
        'menuText' => 'Sakernas',
        'menuUrl' => route('sakernas'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

@include('admin.components.sidebar.item', [
        'menuId' => 'menu-trackings',
        'menuText' => 'Tracking',
        'menuUrl' => route('tracking'),
        'menuIcon' => 'bx bx-briefcase-alt',
        'subMenuData' => null,
    ])

