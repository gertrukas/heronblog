<div id="{{$id ?? 'modal-id'}}"
     class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-51 outline-none focus:outline-none justify-center flex @isset($classModal){{ $classModal }}@endisset"
     :class="{
        'hidden': !showModal,
        'show-basic-modal': showModal
     }"
     @if (!isset($classModal))
        style="@isset($styleContent) {{ $styleContent }} @else top: 50px!important; @endisset"
     @endif
        {{--:style="{--}}
        {{--'z-index': zIndex--}}
     {{--}"--}}
>
    <div id='{{$id ?? 'modal-id'}}-sub-id' style="min-width: 60%"
         class="intro-y relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none dark:bg-dark-3">
            {{$slot}}
        </div>
    </div>
    <div class="hidden opacity-60 fixed inset-0 z-41 bg-black flex-1 @isset($classBackdrop) {{ $classBackdrop }} @endisset" :class="{
           'hidden': !showModal,
        }" x-on:click='dismiss' id="{{$id ?? 'modal-id'}}-backdrop"></div>
</div>
