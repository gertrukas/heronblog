<div>
    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
        aria-expanded="false" data-tw-toggle="dropdown">

        @if (auth()->user()->photo)
            <img alt="" src="{{ asset('storage/' . auth()->user()->photo) }}">
        @else
            <img alt="" src="{{ asset('images/user.png') }}">
        @endif
    </div>
    <div class="dropdown-menu w-56">
        <ul class="dropdown-content bg-primary text-white">
            <li class="p-2">
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ auth()->user()->type }}</div>
            </li>
            <li>
                <hr class="dropdown-divider border-white/[0.08]">
            </li>
            <li>
                <a href="{{route('users.profile')}}" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="user" class="w-4 h-4 mr-2"></i> Perfil
                </a>
            </li>
            <li>
                <a href="{{ route('dark-mode-switcher') }}" class="dropdown-item hover:bg-white/5">
                    @if ($dark_mode)
                        <i class="fa-regular fa-sun w-4 h-4 mr-2"></i> Activar Modo Claro
                    @else
                        <i class="fa-solid fa-moon w-4 h-4 mr-2"></i> Activar Modo Noche
                    @endif
                </a>
            </li>
            {{-- <li>
                <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password
                </a>
            </li>
            <li>
                <a href="" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help
                </a>
            </li> --}}
            <li>
                <hr class="dropdown-divider border-white/[0.08]">
            </li>
            <li>
                <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5">
                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i>
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </div>
</div>
