<div class="col-span-12 sm:col-span-12 mt-4">
    <div class="form-check">
        <label class="form-check-label" for="checkbox-switch-7">{{$title}}</label>
       
    </div>
    <div class="mt-5" id="uploadfile" x-on:drop="dropingFile = false" x-on:drop.prevent="
           handleFileDrop($event)
            " x-on:dragover.prevent="dropingFile = true" x-on:dragleave.prevent="dropingFile = false" x-on:click.prevent="importData">
        <div class="dropzone">
            <template x-if="!archiveUpload">
                <div class="dz-message" data-dz-message>
                @if($photo !== '')
                <img src="{{ Storage::url($photo) }}" class="object-cover rounded border border-gray-200" style="width: 100px; height: 100px;">
                @endif
                    <div class="text-lg font-medium">Arrastra o Selecciona la Imagen del Producto.</div>
                    <div class="text-gray-600">
                        Dimensiones recomendadas: 720 x 720 px. Formatos aceptados: JPG, JPEG o PNG.
                    </div>
                </div>
            </template>

            <template x-if="archiveUpload">
                <div lass="dz-message">
                    <div class="text-lg font-medium mt-12">
                        <img :src="imageUrl" class="object-cover rounded border border-gray-200" style="width: 100px; height: 100px;">
                        <div class="text-lg font-medium mt-12 text-center">¿Estas seguro de cargar este archivo?<br>
                            <span x-text="nameFile"></span> <span x-text="fileSize"></span> (Mb)
                        </div>
                    </div>
                </div>
            </template>

        </div>
    </div>
</div>