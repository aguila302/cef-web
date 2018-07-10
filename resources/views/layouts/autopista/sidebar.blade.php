<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('autopistas.index') }}"><i class="fa fa-fw fa-arrow-left"></i>Regresar a autopistas</a>
            </li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is("autopistas/{$autopista->id}/tramos*") ? ' active' : '' }}">
                <a href="">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Tramos</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
