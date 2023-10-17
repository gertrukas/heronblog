<h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
    @if ($this->token)
        Activación de Cuenta
    @else
        Registro
    @endif
</h2>
<div class="intro-x mt-8">
    <input type="text"
           class="intro-x login__input form-control py-3 px-4 border-gray-300 block
           @error('name') border-theme-6 @enderror"
           wire:model.defer="name"
           placeholder="Nombre">
    <x-error property="name"/>
    <input type="text"
           class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4
                      @error('last_name') border-theme-6 @enderror"
           wire:model.defer="last_name"
           placeholder="Apellidos">
    <x-error property="last_name"/>
    <input type="text"
           class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4
                                 @error('email') border-theme-6 @enderror"
           wire:model.defer="email"
           @if ($this->token)
           disabled
           @endif
           placeholder="Correo Electrónico">
    <x-error property="email"/>
    <input type="password"
           class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4
                                 @error('password') border-theme-6 @enderror"
           wire:model.defer="password"
           placeholder="Contraseña">
    <x-error property="password"/>
    <input type="password"
           class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4
                                 @error('password_confirmation') border-theme-6 @enderror"
           wire:model.defer="password_confirmation"
           placeholder="Confirmación de Contraseña">
    <x-error property="password_confirmation"/>
</div>
<div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
    <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
    <label class="cursor-pointer select-none" for="remember-me">He leído y acepto los </label>
    <a class="text-theme-17 dark:text-gray-300 mr-1" href="{{ route('terminos-y-condiciones')}}">Términos y Condiciones </a> y <a class="text-theme-17 dark:text-gray-300 ml-1" href="{{ route('aviso-de-privacidad') }}">Aviso de Privacidad</a>.
</div>
<div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
    <x-button
            wire:click="submit"
            text="{{ ($this->token) ? 'Activar Cuenta' : 'Registrar' }}"
            class="btn btn-primary py-3 px-4 w-full @if($this->token) xl:w-40 @else xl:w-32 @endif xl:mr-3 align-top"/>
</div>
