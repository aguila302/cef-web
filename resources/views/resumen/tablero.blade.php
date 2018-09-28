
<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="4">Sección</th>
                            <th rowspan="4">Longitud</th>
                            <th rowspan="4">Estado fisico</th>
                            <th colspan="5">Calificacion por Elemento</th>
                        </tr>
                    </thead>
                    <tbody>
                       {{--  {{ $valoresCalificaciones }}
                        @foreach ($calificaciones as $calificacion)
                        <tr>
                             <td>{{ $calificacion->seccion }}</td>
                            <td>{{ $calificacion->longitud }}</td>
                            <td>{{ $calificacion->longitud }}</td>

                            <td>

                                {{ $calificacion->inicio }}
                            </td>
                            @foreach ($valoresCalificaciones as $valorCalificacion)
                            <td>
                                {{ $valorCalificacion->descripcion }}
                                <br>
                                <br>
                                {{ $valorCalificacion->calificacion_total }}
                                <br>
                                <br>
                                 @if ( $calificacion->inicio)
                                    I have one record!
                                @elseif (count($records) > 1)
                                    I have multiple records!
                                @else
                                    I don't have any records!
                                @endif
                            </td>

                            @endforeach
                        </tr>
                        @endforeach --}}

                    </tbody>
                </table>