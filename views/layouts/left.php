<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Opciones', 'options' => ['class' => 'header']],
                    ['label' => 'Mi perfil', 'icon' => 'user', 'url' => ['/usuario']],
                    ['label' => 'Categoria', 'icon' => 'list', 'url' => ['/categoria']],
                    ['label' => 'Mis password', 'icon' => 'fa fa-circle-o', 'url' => ['/wsite']],
                    ['label' => 'Notas', 'icon' => 'file', 'url' => ['/notas']],
                    ['label' => 'Log', 'icon' => 'cog', 'url' => ['/log']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
