<div x-data="{
        selectPage: @entangle('selectPage').defer,
        selected: @entangle('selected').defer,
        indexRowsPage: @entangle('indexRowsPage'),
        showFilters: @entangle('showFilters').defer,
        @isset($this->arrayEnableEditQuantity)
            arrayEnableEditQuantity: @entangle('arrayEnableEditQuantity').defer,
            arrayEnableEditQuantities: [],
        @endisset

        buttonClass: 'btn-secondary',
        openedIndex:[],
        enableEditQuantity: false,

        openCollapse(xAction, model = ''){
             if(!this.openedIndex.includes(xAction)){
                if (model !== 'subclasifications'){
                    if (model !== 'type'){
                        deleted = false;
                        a = null;
                        if(this.openedIndex.length >= 1){
                            collapseAction = xAction.split('-');
                            this.openedIndex.forEach(function(value, index){
                                valueAction = value.split('-');
                                if(collapseAction[0] == valueAction[0]) {
                                    if ( index !== -1 ) {
                                        a = index;
                                        deleted = true;
                                    }
                                }
                            })
                            if(deleted == true){
                                this.openedIndex.splice( a, 1 );
                            }
                        }
                    }
                }
                this.openedIndex.push(xAction)
             }else{
                var i = this.openedIndex.indexOf(xAction);
                if ( i !== -1 ) {
                    this.openedIndex.splice( i, 1 );
                }
             }
        },
        Query(id, model, xAction){

            if (model !== 'subclasifications'){
                if (model !== 'type'){
                    if(this.openedIndex.includes(xAction) ){
                        $wire.call('SelectDetailQuery',id,model);
                    }
                }
            }
        },
        resetCollapse(){
            this.openedIndex = [];
        },
        findItem(id, params = null) {
            let indexRowsPages = JSON.parse(this.indexRowsPage);
            if (params) {
            indexRowsPages = indexRowsPages.find((item) => item.id === id);
            return this.findSubItem(indexRowsPages, params);
            }
            return indexRowsPages.find((item) => item.id === id);
        },
        findSubItem(mainItem, params) {
            if (!params) return mainItem;
            let main = mainItem[params.key].find((item) => item.id === params.id);
            return this.findSubItem(main, params.params);
        },
        setUniqueSelectedValues() {
            this.selected = [...new Set(JSON.parse(JSON.stringify(this.selected)))];
        },
        count: $wire.get('count'),
     }" x-init="() => {
         this.showFilters = false;
         @isset($this->arrayEnableEditQuantity)
            try {
                this.arrayEnableEditQuantities = JSON.parse(JSON.stringify(arrayEnableEditQuantity))
            } catch (error) {
            }
         @endisset
         $watch('selectPage', function() {
                let indexRowsPages = JSON.parse(indexRowsPage)
                if (selectPage) {
                    selected = indexRowsPages.map(rowPage=>rowPage.id)

                } else {
                    selected = [];
                }

                $wire.set('selectPage', selectPage)
         })
         $watch('showFilters', value => this.buttonClass = value ? 'btn-primary' : 'btn-secondary')
     }" @if (isset($class)) class="{{ $class }}" @endif>
    @if (!isset($noHeader) || (isset($noHeader)) && !$noHeader)
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $title }}</h2>
        <a href="" class="ml-auto flex items-center  mr-5  ">
            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Actualizar Datos
        </a>
        @isset($addButton)
        <div class="flex w-full mt-4 sm:w-auto sm:mt-0">
            {{ $addButton }}
        </div>
        @endisset
    </div>
    @endif
    {{ $slot }}
</div>
