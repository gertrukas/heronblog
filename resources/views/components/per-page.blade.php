<select  wire:model="perPage" class="w-20 form-select box mt-3 sm:mt-0 btn btn-outline-secondary " style="border-color: rgba(226,232,240)">
    @foreach ($options ?? [10, 25, 50, 100, 200, 500] as $option)
        <option>{{ $option }}</option>
    @endforeach
</select>
