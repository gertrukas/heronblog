@extends('../layout/' . $layout)

@section('head')
    <title>Login - Heron</title>
@endsection

@section('content')
    <div class="">
        <div class="block xl:grid grid-cols-2 ">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col  min-h-screen sm:h-screen ">
      
                <img alt="star" class="h-full w-full object-contain  "
                src="{{ asset('images/undraw_articles_wbpb.svg') }}">
            
            </div>
            <!-- END: Login Info -->

            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex flex-col  justify-center items-center align-middle   dark:bg-darkmode-600 px-5  ">

                <a href="" class=" lg:hidden -intro-x flex items-center mt-auto">
                 
           
                </a>

                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5  sm:px-8 py-2 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Iniciar Sessión</h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Blog</div>
                    <div class="intro-x mt-8">
                        <form id="login-form">
                            <x-error property="error" />
                            <input id="email" type="text" class="intro-x login__input form-control py-3 px-4 block"
                                placeholder="Email" value="">
                            <div id="error-email" class="login__input-error text-danger mt-2"></div>
                            <input id="password" type="password"
                                class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password"
                                value="">
                            <div id="error-password" class="login__input-error text-danger mt-2"></div>
                        </form>
                    </div>
                  
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="btn-login"
                        class="btn bg-purple-500 text-white font-semibold py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Entrar</button>
                        {{-- <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> --}}
                    </div>
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                        Blog <a class="text-primary dark:text-slate-200" href="">Terminos y
                            condiciónes</a> & <a class="text-primary dark:text-slate-200" href="">Politica de
                            Privacidad</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        (function () {
            async function login() {
                // Reset state
                $('#login-form').find('.login__input').removeClass('border-danger')
                $('#login-form').find('.login__input-error').html('')

                // Post form
                let email = $('#email').val()
                let password = $('#password').val()

                // Loading state
                // Loading state
                $('#btn-login').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)

                axios.post(`login`, {
                    email: email,
                    password: password
                }).then(res => {
                    location.href = '/admin/dashboards'
                }).catch(err => {
                    $('#btn-login').html('Login')
                    if (err.response.data.message != 'Wrong email or password.') {
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            $(`#${key}`).addClass('border-danger')
                            $(`#error-${key}`).html(val)
                        }
                    } else {
                        $(`#password`).addClass('border-danger')
                        $(`#error-password`).html(err.response.data.message)
                    }
                })
            }

            $('#login-form').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    login()
                }
            })

            $('#btn-login').on('click', function() {
                login()
            })
        })()
    </script>
@endsection
