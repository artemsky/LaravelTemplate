<!-- Page Content -->
<div class="bg-image" style="background-image: url('/admin/assets/images/static/photo26@2x_blurred.jpg');">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white">
                    Система управления интернет-магазином
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; ArtemSky <span class="js-year-copy">2017</span>
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="{{route('admin.index')}}">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Добро пожаловать в административную панель</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Выполните вход</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/login.js) -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin px-30" action="{{--route('login')--}}" method="post">
                    <div class="form-group row">
                        <div class="col-12 {{$errors->any() ? ' invalid' : ''}}">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="login-username" name="email">
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
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember">
                                <label class="custom-control-label" for="login-remember-me">Запомнить меня</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                            <i class="si si-login mr-10"></i> Вход
                        </button>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
