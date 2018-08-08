@php
    // You can use the following array to create your main menu

    Codebase::$main_nav = array(
        array(
            'name'  => 'Пользователи',
            'icon'  => 'si si-user',
            'url'   => route('admin.users.index'),
        ),
        #array(
        #    'name'  => 'Меню с подпунктами',
        #    'icon'  => 'si si-briefcase',
        #    'sub'   => array(
        #        array(
        #            'name'  => 'Первый',
        #            'url'   => '#',
        #        ),
        #        array(
        #            'name'  => 'Второй',
        #            'url'   => '#',
        #        ),
        #        array(
        #            'name'  => 'Третий',
        #            'url'   => '#',
        #        ),
        #    )
        #),
    );
    Codebase::build_nav(true, true);
@endphp
