<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('autopistas.index') }}"><i class="fa fa-fw fa-arrow-left"></i>Regresar a autopistas</a>
            </li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is("autopistas/{$autopista->id}/tramos*") ? ' active' : '' }}">
                <a href="{{ route('tramos.index', $autopista) }}">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Tramos</span>
                </a>
            </li>
            <li class="{{ Request::is("autopistas/{$autopista->id}/resumen") ? ' active' : '' }}">
                <a href="{{ route('resumen.index', $autopista) }}">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Resumen de calificación</span>
                </a>
            </li>
            <li class="{{ Request::is("autopistas/{$autopista->id}/resumen-por-tramo") ? ' active' : '' }}">
                <a href="{{ route('resumen-por-tramo', $autopista) }}">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Calificación por sección</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
