<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('tramos.index', $autopista) }}"><i class="fa fa-fw fa-arrow-left"></i>Regresar a tramos</a>
            </li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is("autopistas/{$autopista->id}/tramos/{$tramo->id}/secciones*") ? ' active' : '' }}">
                <a href="">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Secciones</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
