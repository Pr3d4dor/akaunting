<html>

    @include('partials.install.head')

    <body class="installation-page">

        <div class="main-content">
            <div class="header pt-3 pb-2">
                <div class="container">
                    <div class="header-body text-center mb-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8">
                                <img class="login-logo pb-6" src="{{ asset('public/img/akaunting-logo-white.png') }}" alt="Akaunting"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt--7 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card">
                            {!! Form::open([
                                'url' => url()->current(),
                                '@submit.prevent' => 'onSubmit',
                                'role' => 'form',
                                'id' => 'form-install'
                            ]) !!}
                            <div id="app">
                                <div class="card-body">
                                    <div class="text-center text-muted mt-2 mb-4">
                                        <small>@yield('header')</small>
                                    </div>

                                     @include('flash::message')

                                     @yield('content')
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        @if (Request::is('install/requirements'))
                                            <a href="{{ url('install/requirements') }}" class="btn btn-success"> {{ trans('install.refresh') }} &nbsp;<i class="fa fa-refresh"></i></a>
                                        @else
                                            {!! Form::button(
                                                '<i v-if="loading" :class="(loading) ? \'show \' : \'\'" class="fas fa-spinner fa-spin d-none"></i> ' .
                                                trans('install.next') .
                                                ' &nbsp;<i class="fa fa-arrow-right"></i>',
                                                [
                                                    ':disabled' => 'loading',
                                                    'type' => 'submit',
                                                    'id' => 'next-button',
                                                    'class' => 'btn btn-success',
                                                    'data-loading-text' => trans('general.loading')
                                                ]
                                            ) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.install.scripts')

    </body>

</html>
