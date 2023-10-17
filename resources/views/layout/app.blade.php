@extends('../layout/side-menu')

@section('subcontent')
<livewire:messages  :wire:key="'notification-app'" />
    {{ $slot }}
@endsection
