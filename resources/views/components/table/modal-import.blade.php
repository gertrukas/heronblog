<x-modal.basic :id="$this->importModalId" static {{$attributes}}>
    <div class="modal-content" x-data="{
                dropingFile: false,
                archiveUpload:false,
                files:[],
                nameFile:'',
                fileSize:0,
                upload:@entangle('upload').defer,
                handleFileDrop(e) {
                    if (event.dataTransfer.files.length > 0) {
                         files = e.dataTransfer.files;
                         this.verification(files);
                    }
                },
                verification(files) {
                    if (files[0].type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                     this.upload = files[0];
                     this.archiveUpload=true;
                     this.nameFile=files[0].name
                     this.fileSize = parseFloat(files[0].size / 1048576).toFixed(2);
                     } else {
                        this.files =[];
                        this.archiveUpload=false;
                        window.livewire.emit('error_upload',true);
                     }
                },
                limpiar() {
                    this.archiveUpload=false;
                    this.files =[];
                    this.upload = null;
                },
                importData() {
                    let input = document.createElement('input');
                    input.type = 'file';
                    input.onchange = _ => {
                        let files =   Array.from(input.files);
                        this.verification(files)
                    };
                    input.click();
                },
                submitUpload(e) {
                    if (this.upload) {
                        var reader = new FileReader();
                        reader.readAsDataURL(this.upload);
                        reader.onload = function () {
                            $wire.call('singleFileUploaded', reader.result);
                        };
                    } else {
                        this.archiveUpload=false;
                        window.livewire.emit('error_upload',false);
                    }
                },
                downloadFormat() {
                    console.log('dowload format');
                    $wire.call('downloadFormat')
                }
        }">

        <!-- BEGIN: Modal Header -->
        <div class="modal-header">
            <h2 class="font-medium text-base mr-auto">Importar Archivo</h2>
            <x-icon-button
                    use-button-element
                    class="btn btn-outline-secondary hidden sm:flex cursor-pointer"
                    icon-name="download"
                    id="download-format"
                    wire:click="downloadFormat"
                    text="Descargar Formato"
            />
            {{--<button class="btn btn-outline-secondary hidden sm:flex" wire:click="downloadFormat">--}}
                {{--<x-feather-download class="w-4 h-4 mr-2" /> Descargar Formato--}}
            {{--</button>--}}
            <div class="dropdown sm:hidden">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                    <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-600"></i>
                </a>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <x-feather-download class="w-4 h-4 mr-2" /> Descargar Formato
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- END: Modal Header -->

        <!-- BEGIN: Modal Body -->
        <div class="modal-body grid-cols-12 upload-area" id="uploadfile" x-on:drop="dropingFile = false" x-on:drop.prevent="
           handleFileDrop($event)
            " x-on:dragover.prevent="dropingFile = true" x-on:dragleave.prevent="dropingFile = false" x-on:click.prevent="importData">
            <div class="intro-y row">

                <div class="dropzone h-100">
                    <div class="fallback">

                    </div>
                    <template x-if="!archiveUpload">
                        <div class="dz-message">
                            <div class="text-lg font-medium mt-12">Por favor, selecciona un archivo en formato CSV para realizar la importación.</div>
                            <div class="text-gray-600 mt-8">
                                Recuerda que en caso de que el ID del registro ya exista se actualizará, de lo contrario se creará.
                            </div>
                            <div class="text-gray-600 mt-2">
                                Peso máximo del Archivo: 50 MB.
                            </div>
                        </div>
                    </template>

                    <template x-if="archiveUpload">
                        <div lass="dz-message">
                            <div class="text-lg font-medium mt-12">
                                <div class="text-lg font-medium mt-12 text-center">¿Estas seguro de cargar este archivo?<br>
                                    <span x-text="nameFile"></span> <span x-text="fileSize"></span> (Mb)
                                </div>
                            </div>
                        </div>
                    </template>
                    {{--@error('upload') <div class="w-5/6 mt-2 login__input-error text-theme-6">{{ $message }}
                </div> @enderror--}}
                {{--@if ($this->upload)--}}
                {{--<div class="text-lg font-medium mt-12 text-center">¿Estas seguro de cargar este archivo?</div>--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
    <!-- END: Modal Body -->
    <!-- BEGIN: Modal Footer -->
    <div class="modal-footer text-right">
        <button type="button" @click="limpiar();$dispatch('set-dismiss-modal-{{ $this->importModalId }}')" class="btn btn-outline-secondary w-48 mr-1">Cancelar</button>
        <button @click="submitUpload($event);limpiar();$dispatch('set-dismiss-modal-{{ $this->importModalId }}')" class="btn btn-primary w-48">
            Iniciar Importación
        </button>
        {{--<button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-48 mr-1">Cancelar</button>--}}
        {{--<button type="button" class="btn btn-primary w-48"></button>--}}
    </div>
    <!-- END: Modal Footer -->

    </div>

</x-modal.basic>
