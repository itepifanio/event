<div class="content" style="min-height: 0;padding-bottom: 0; position: relative;">
    <div class="system-alerts">

        {{--        @if(session('notificacao'))--}}

        {{--            <a href="#" id="link" class="btn btn-lg btn-success hidden" data-toggle="modal" data-target="#newsModal">Clique para abrir o modal</a>--}}
        {{--            @if(\App\Facades\Perfil::recuperar()->FindLastnotificacao()->titulo)--}}
        {{--                <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModal" aria-hidden="true">--}}
        {{--                    <div class="modal-dialog">--}}
        {{--                        <div class="modal-content">--}}
        {{--                            <div class="modal-header">--}}
        {{--                                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->--}}
        {{--                                <h4 class="modal-title text-center" id="myModalLabel"><img src="http://localhost:8000/img/logo.png" alt="RET-SUS" width="150px"> | SISTEMA DE GESTÃO ACADÊMICA</h4>--}}
        {{--                            </div>--}}
        {{--                            <div class="modal-img">--}}
        {{--                                <img src="{{ asset(\App\Facades\Perfil::recuperar()->FindLastnotificacao()->imagem) }}" alt="RET-SUS" class="img-responsive">--}}
        {{--                            </div>--}}
        {{--                            <div class="modal-body text-center">--}}
        {{--                                <h2>{{ \App\Facades\Perfil::recuperar()->FindLastnotificacao()->titulo}}</h2>--}}
        {{--                                {!! \App\Facades\Perfil::recuperar()->FindLastnotificacao()->conteudo !!}--}}
        {{--                            </div>--}}
        {{--                            <div class="modal-footer">--}}
        {{--                                <ul class="modal-logos">--}}
        {{--                                    <li><img src="http://localhost:8000/img/lais.png" alt="LAIS | HUOL" class="img-responsive" width="100px"></li>--}}
        {{--                                    <li><img src="http://localhost:8000/img/ufrn.png" alt="UFRN" class="img-responsive" width="100px" style="padding-bottom: 2px;"></li>--}}
        {{--                                    <li><img src="http://localhost:8000/img/ms.png" alt="BRASIL - MS" class="img-responsive" width="140px" style="padding-bottom: 4px;"></li>--}}
        {{--                                </ul>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @else--}}
        {{--                <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModal" aria-hidden="true">--}}
        {{--                    <div class="modal-dialog">--}}
        {{--                        <div class="modal-content">--}}
        {{--                            <img src="{{ asset(\App\Facades\Perfil::recuperar()->FindLastnotificacao()->imagem) }}" alt="RET-SUS" class="img-responsive">--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            @endif--}}
        {{--        @endif--}}

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Alert!</strong> {!! session('error') !!}
                <?php session()->forget('error'); ?>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Alert!</strong> {!! session('success') !!}
                <?php session()->forget('success'); ?>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Alert!</strong> {!! session('info') !!}
                <?php session()->forget('info'); ?>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Alert!</strong> {!! session('warning') !!}
                <?php session()->forget('warning'); ?>
            </div>
        @endif
        @if(session('aviso_do_programador'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>Alert!</strong> {!! session('aviso_do_programador') !!}
                <?php session()->forget('aviso_do_programador'); ?>
            </div>
        @endif

    </div>
</div>

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

{{--        @push('scripts')--}}
{{--            <script type="text/javascript">--}}
{{--                if ({{!empty(session('notificacao'))}}) {--}}
{{--                    $('#link').click();--}}
{{--                }--}}
{{--            </script>--}}
{{--@endpush--}}
