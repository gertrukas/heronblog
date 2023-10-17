<div x-data="{
  showModal: false
}">
  <x-modal.button :id="$id">
    {{$buttonText}}
  </x-modal.button>
  <x-modal.container :id="$id">
    {{$slot}}
  </x-modal.container>
</div>
