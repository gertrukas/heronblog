<div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
  <div class="xl:flex sm:mr-auto">
    @if ($buttons['search'])
      <form wire:submit.prevent="search" class="xl:flex sm:mr-auto">
        <div class="items-center mt-2 sm:flex sm:mr-4 xl:mt-0  ">
          <input type="text" class="mt-2 form-control sm:w-40 2xl:w-full sm:mt-0" wire:model.defer="filters.search" placeholder="Buscar...">
        </div>
        <div class="mt-2 xl:mt-0">
          <x-icon-button
                  use-button-element
                  x-on:click="resetCollapse()"
                  wire:click="search"
                  type="submit"
                  class-name=" h-9 mx-1 rounded-md  btn-primary w-full sm:w-14 tooltip"
                  id="tabulator-html-filter-go"
                  icon-name="search"
                  tooltip="Buscar"
          />
        </div>
      </form>
    @endif

    @if ($buttons['filter'])
      <div class="relative flex w-full mr-auto sm:w-auto lg:block" >
        <x-icon-button
                use-button-element
                @click="showFilters = !showFilters"
                class-name="btn  w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-class="buttonClass"
                id="tabulator-filter-reset"
                icon-name="sliders"
                tooltip="Filtros"
        />
        <div class="absolute right-0 flex items-center lg:block inbox-filter"
             x-show="showFilters"
             style="z-index: 111;padding-top: 4px;"  >
          <div class="inbox-filter__dropdown-menu" x-show="showFilters" style="display: none">
            <div class="p-5 dropdown-menu__content box">

              <div class="col-span-12 lg:col-span-12">
                <h1 class="text-lg">Filtros</h1>
                <div class="p-5 intro-y">
                  <form wire:submit.prevent="search" class="mr-2 sm:w-auto">
                  @isset($filters)
                    {{ $filters }}
                  @endif
                    <div class="grid grid-cols-12 gap-4 py-4 mr-4 gap-y-3 sm:w-auto">
                      <div class="col-span-12">
                        <x-icon-button
                                use-button-element
                                type="button"
                                wire:click="resetFilters"
                                class="bottom-0 right-0 mr-4 cursor-pointer btn btn-secondary"
                                id="btn-reset-filters"
                                icon-name="search"
                                icon-class="w-5 h-5"
                                text="Limpiar"
                        />
                        <x-icon-button
                                use-button-element
                                type="submit"
                                wire:click="search"
                                class="bottom-0 right-0 mr-4 cursor-pointer btn btn-primary"
                                id="btn-reset-filters"
                                icon-name="search"
                                icon-class="w-4 h-4"
                                text="Buscar"
                        />
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    @endif

    @if ($buttons['duplicate'])
      <div class="mt-2 xl:mt-0">
        <x-icon-button
                use-button-element
                wire:click="cloneRegisterButtons"
                class-name="btn  w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-disabled="!(selected.length==1)"
                x-class="selected.length==1 ? 'btn-primary' : 'btn-secondary'"
                id="tabulator-html-duplicate"
                icon-name="copy"
                tooltip="Duplicar"
        />
      </div>
    @endif

    @if ($buttons['modify_application'])
      <div class="mt-2 xl:mt-0">
        <x-icon-button
                use-button-element
                wire:click="toggleShowFilters"
                class-name="btn  w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-class="buttonClass"
                x-disabled="!(selected.length==1)"
                x-class="selected.length==1 ? 'btn-primary' : 'btn-secondary'"
                id="tabulator-html-application-reset"
                icon-name="codesandbox"
                tooltip="Modificar Aplicación"
        />
      </div>
    @endif

    @if (isset($buttons['modify_unit']) && $buttons['modify_unit'])
      <div class="mt-2 xl:mt-0">
        <x-icon-button
                use-button-element
                wire:click="$emit('showModal', '{{$this->modalIdEditMassiveUnit}}')"
                class-name="btn  w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-disabled="selected.length == 0"
                x-class="selected.length >= 1 ? 'btn-primary' : 'btn-secondary'"
                id="tabulator-html-modify-unit"
                icon-name="tool"
                tooltip="Modificar Unidad"
        />
      </div>
    @endif

    @if ($buttons['edit'])
      <div class="mt-2 xl:mt-0">
        <x-icon-button
                use-button-element
                wire:click="editsButtons"
                class-name="btn w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-disabled="!(selected.length == 1)"
                x-class="selected.length==1 ? 'btn-primary' : 'btn-secondary'"
                id="tabulator-html-edits"
                icon-name="edit-3"
                tooltip="Editar"
        />
      </div>
    @endif

    @if ($buttons['remove'])
      <div class="mt-2 xl:mt-0">
        @isset($buttons['customRemove'])
        <x-icon-button
                use-button-element
                wire:click="{{$buttons['customRemove']}}"
                class-name="btn w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-disabled="selected.length == 0"
                x-on:click="$wire.set('selected', selected);"
                x-class="selected.length >= 1 ? 'btn-primary' : 'btn-secondary'"
                id="tabulator-html-remove"
                icon-name="x"
                tooltip="Eliminar"
        />
        @else
        <x-icon-button
                use-button-element
                x-on:click="$wire.set('selected', selected);"
                wire:click="$set('showDeleteModal', true)"
                class-name="btn w-full sm:w-16 mt-2 sm:mt-0 sm:ml-2 dropdown-toggle tooltip"
                x-disabled="selected.length == 0"
                x-class="selected.length >= 1 ? 'btn-primary' : 'btn-secondary'"
                id="tabulator-html-remove"
                icon-name="x"
                tooltip="Eliminar"
        />
        @endisset
      </div>
    @endif

  </div>

  @if($buttons['export']
  || (isset($buttons['import']) && $buttons['import'])
  || (isset($buttons['edit_quantities']) && $buttons['edit_quantities'])
  || (isset($buttons['add_concepts']) && $buttons['add_concepts'])
  )
    <div class="flex mt-5 sm:mt-0 ">
        @if(isset($buttons['edit_quantities']) && $buttons['edit_quantities'])
            <x-icon-button
                    use-button-element
                    class-name="btn w-60 mr-3 mb-2"
                    id="btn-edit-quantities"
                    icon-name="edit-3"
                    text="Editar Cantidades"
                    x-class="enableEditQuantity ? 'btn-primary' : 'btn-dark'"
                    @click="enableEditQuantity = !enableEditQuantity"
            />
        @endif

        @if(isset($buttons['add_concepts']) && $buttons['add_concepts'])
            <x-icon-button
                    use-button-element
                    @click="$dispatch('action-modal-add-supplies')"
                    class-name="btn btn-dark w-60 mr-3 mb-2"
                    id="btn-add-concepts"
                    icon-name="plus"
                    text="Agregar Insumo"
            />
        @endif

        @if(isset($buttons['add_category']) && $buttons['add_category'])
            <x-icon-button
                    use-button-element
                    @click="$dispatch('action-modal-add-categories')"
                    class-name="btn btn-dark w-60 mr-3 mb-2"
                    id="btn-add-categories"
                    icon-name="plus"
                    text="Agregar Partida"
            />
        @endif

        @if(isset($buttons['add_analysis']) && $buttons['add_analysis'])
            <x-icon-button
                    use-button-element
                    @click="$dispatch('action-modal-add-analysis')"
                    class-name="btn btn-dark w-60 mr-3 mb-2"
                    id="btn-add-analysis"
                    icon-name="plus"
                    text="Agregar Insumo"
            />
        @endif

      @isset ($buttons['import'])
        @if ($buttons['import'])
          @isset($buttons['import']['buttonEvent'])
            @if ($buttons['import']['buttonEvent'] === 'alpine')
              <x-icon-button
                      use-button-element
                      x-on:click="$dispatch('set-show-modal-{{ $this->importModalId }}')"
                      class-name="btn btn-outline-secondary  w-1/2 sm:w-auto mr-2"
                      id="tabulator-filter-reset"
                      icon-name="upload"
                      text="Importar"
              />
            @else
              <x-icon-button
                      use-button-element
                      wire:click="$toggle('showExportModal')"
                      class-name="btn btn-outline-secondary  w-1/2 sm:w-auto mr-2"
                      id="tabulator-filter-reset"
                      icon-name="upload"
                      text="Importar"
              />
            @endif
          @else
            <x-icon-button
                    use-button-element
                    wire:click="$toggle('showExportModal')"
                    class-name="btn btn-outline-secondary  w-1/2 sm:w-auto mr-2"
                    id="tabulator-filter-reset"
                    icon-name="upload"
                    text="Importar"
            />
          @endisset
        @endif
      @endif
      @if (isset($buttons['multi']) && $buttons['multi'])
      <div class="flex items-center gap-2  ml-auto mr-1 my-auto">
           <label for="" class="inline-block align-baseline ">Multiplicador:</label>
           <input id="input" type="text"
               class="mt-2 form-control w-16 sm:mt-0   @error('multiplier') border-theme-6 @enderror"
               wire:model.defer="multiplier" wire:change="updateMultiplier">
       </div>
        
      @endif

      <div class="w-1/2 dropdown sm:w-auto">
        @if($buttons['export'])
        <button class="w-full dropdown-toggle btn btn-outline-secondary sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown">
          <i data-feather="download" class="w-4 h-4 mr-2"></i> Exportar <i data-feather="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i>
        </button>
        @endif
        <div class="w-40 dropdown-menu">
          <div class="p-2 dropdown-menu__content box dark:bg-dark-1">

            @if ($buttons['export']['print'])
            <x-icon-button
                        wire:click="exportHtml"
                        class-name="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                        style="justify-content: left!important;"
                        id="export-button-prints"
                        icon-name="print"
                        text="Imprimir"
                />

            @endif

            @if ($buttons['export']['excel'])
                <x-icon-button
                        wire:click="exportExcel"
                        class-name="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                        style="justify-content: left!important;"
                        id="export-button-excel"
                        icon-name="database"
                        text="Excel"
                />
            @endif

            @if ($buttons['export']['pdf'])
                <x-icon-button
                        wire:click="exportPdf"
                        class-name="flex items-center justify-left block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                        style="justify-content: left!important;"
                        id="export-button-pdf"
                        icon-name="file-text"
                        text="PDF"
                />
            @endif
          </div>
        </div>
      </div>
    </div>
  @endif

</div>
