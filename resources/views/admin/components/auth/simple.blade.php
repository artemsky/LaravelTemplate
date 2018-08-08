<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('/admin/assets/images/static/bg-pattern-inverse.png');">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-6 col-xl-4">
            <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-30 text-center">
                    <a class="link-effect font-w700" href="{{route('admin.index')}}">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                    </a>
                    <h1 class="h4 font-w700 mt-30 mb-10">Добро пожаловать в административную панель</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Сегодня прекрасный день!</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in pages/login.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin" action="{{--route('login')--}}" method="post">
                    <div class="block block-themed block-rounded block-shadow">
                        <div class="block-header bg-gd-dusk">
                            <h3 class="block-title">Выполните вход</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12{{$errors->any() ? ' invalid' : ''}}">
                                    <label for="login-username">E-mail</label>
                                    <input type="text" class="form-control" id="login-username" name="email" value="{{ old('email') }}">
                                    @if ($errors->any())
                                    <div id="login-username-error" class="invalid-feedback animated fadeInDown">Неверный email или пароль.</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="login-password">Пароль</label>
                                    <input type="password" class="form-control" id="login-password" name="password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-6 d-sm-flex align-items-center push">
                                    <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                        <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember">
                                        <label class="custom-control-label" for="login-remember-me">Запомнить меня</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-sm-right push">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="si si-login mr-10"></i> Войти
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->