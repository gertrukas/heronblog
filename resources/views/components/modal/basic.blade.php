@isset($static)
    <div x-data="{
                showModal: false,
                zIndex: 50,
                show() {
                    setTimeout(() => {
                        // document.querySelector('html').style.setProperty('overflow-y', 'hidden');
                        this.showModal = true;
                        dispatchEvent(new CustomEvent(`reload-init-datepickers`));
                        dispatchEvent(new CustomEvent(`reload-tail-selects`));
                        const modals = cash('.show-basic-modal').length;
                        this.zIndex += modals;
                        scrollTo({ top: 0, behavior: 'smooth' })
                    }, 200);
                },
                dismiss() {
                    // document.querySelector('html').style.setProperty('overflow-y', 'auto');
                    this.showModal = false;
                }
             }"
         @set-show-modal-{{ $id }}.window="show"
         @set-dismiss-modal-{{ $id }}.window="dismiss"
         @set-dismiss-all-modal.window="dismiss">
        {{--<x-modalview :id="$id">--}}
            {{--{{$slot}}--}}
        {{--</x-modalview>--}}
        <x-modal.container :id="$id" {{ $attributes }}>
            {{$slot}}
        </x-modal.container>
    </div>
@else
{{-- @push('modal') --}}
    <div x-data="{
            showModal: false,
            zIndex: 50,
            show() {
                setTimeout(() => {
                    // document.querySelector('html').style.setProperty('overflow-y', 'hidden');
                    this.showModal = true;
                    dispatchEvent(new CustomEvent(`reload-init-datepickers`));
                    dispatchEvent(new CustomEvent(`reload-tail-selects`));
                    const modals = cash('.show-basic-modal').length;
                    this.zIndex += modals;
                }, 200);
            },
            dismiss() {
                // document.querySelector('html').style.setProperty('overflow-y', 'auto');
                this.showModal = false;
            }
         }"
         @set-show-modal-{{ $id }}.window="show"
         @set-dismiss-modal-{{ $id }}.window="dismiss"
         @set-dismiss-all-modal.window="dismiss">
        <x-modal.container :id="$id" {{ $attributes }}>
            {{$slot}}
        </x-modal.container>
    </div>
{{-- @endpush --}}
@endisset

