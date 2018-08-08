@php(config([
  'codebase.l_m_content' => 'boxed',
]))
<!-- Page Content -->
<div class="bg-gd-dusk">
    <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
        <!-- Header -->
        <div class="py-30 px-5 text-center">
            <a class="link-effect font-w700" href="{{route('admin.index')}}">
                <i class="si si-fire"></i>
                <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
            </a>
            <h1 class="h2 font-w700 mt-50 mb-10">Добро пожаловать в административную панель </h1>
            <h2 class="h4 font-w400 text-muted mb-0">Выполните вход</h2>
        </div>
        <!-- END Header -->

        <!-- Sign In Form -->
        <div class="row justify-content-center px-5">
            <div class="col-sm-8 col-md-6 col-xl-4">
                <!-- jQuery Validation (.js-validation-signin class is initialized in pages/login.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin" action="{{--route('login')--}}" method="post">
                    <div class="form-group row">
                        <div class="col-12 {{$errors->any() ? ' invalid' : ''}}">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="login-username" name="email" value="{{ old('email') }}">
                                <label for="login-username">E-mail</label>
                            </div>
                            @if ($errors->any())
                                <div id="login-username-error" class="invalid-feedback animated fadeInDown">Неверный email или пароль.</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="login-password" name="password">
                                <label for="login-password">Пароль</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row gutters-tiny">
                        <div class="col-12 mb-10">
                            <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                <i class="si si-login mr-10"></i> Вход
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Sign In Form -->
    </div>
</div>
<!-- END Page Content -->
