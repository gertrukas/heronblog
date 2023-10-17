<div
        x-data="{
        success: @entangle('success').defer,
        error: @entangle('error').defer,
        warning: @entangle('warning').defer,
     
    }"
        x-init="() => {
        $watch('success', value => value != null ? scrollTo({ top: 0, behavior: 'smooth' }) : null)
        $watch('error', value => value != null ? scrollTo({ top: 0, behavior: 'smooth' }) : null)
        $watch('warning', value => value != null ? scrollTo({ top: 0, behavior: 'smooth' }) : null)
    }"
>
    <div x-show="success"
         {{--class="flex items-center justify-center px-2 py-2 m-0 mt-3 font-medium text-green-700 bg-white bg-green-200 rounded-md dark:text-green-100 dark:bg-green-800" @if(!session('success')) style="display: none" @endif>--}}
         class="flex items-center justify-center px-2 py-2 m-0 mt-3 font-medium text-green-700 rounded-md alert-success" @if(!session('success')) style="display: none" @endif>
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-check-circle">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <div class="flex-initial max-w-full text-lg font-normal">
            {!! $success ?? session('success') !!}
        </div>
        <div @click="success = null" class="flex flex-row-reverse flex-auto">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400 dark:hover:text-green-900">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
    <div x-show="error"
         {{--class="flex items-center justify-center px-2 py-2 m-0 mt-3 font-medium text-red-700 bg-white bg-red-100 border border-red-300 rounded-md dark:text-red-100 dark:bg-red-800" @if(!session('error')) style="display: none" @endif>--}}
         class="flex items-center justify-center px-2 py-2 m-0 mt-3 font-medium text-red-700 rounded-md alert-danger" @if(!session('error')) style="display: none" @endif>
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-alert-octagon">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
        </div>
        <div class="flex-initial max-w-full text-lg font-normal">
            {!! $error ?? session('error') !!}
        </div>
        <div @click="error = null" class="flex flex-row-reverse flex-auto">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-red-400 dark:hover:text-red-900">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
    <div x-show="warning"
         {{--class="flex items-center justify-center px-2 py-2 m-0 mt-3 font-medium text-yellow-700 bg-white bg-yellow-100 border border-yellow-300 rounded-md dark:bg-yellow-700 dark:text-yellow-100 " @if(!session('warning')) style="display: none" @endif>--}}
         class="flex items-center justify-center px-2 py-2 m-0 mt-3 font-medium text-yellow-700 rounded-md alert-warning" @if(!session('warning')) style="display: none" @endif>
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-info">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
        </div>
        <div class="flex-initial max-w-full text-lg font-normal">
            {!! $warning ?? session('warning') !!}
        </div>
        <div @click="warning = null" class="flex flex-row-reverse flex-auto">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-yellow-400 dark:hover:text-yellow-900">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
</div>