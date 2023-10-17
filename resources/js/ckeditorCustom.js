
window.initializeCkEditor = () => {
    if (document.querySelector('.uploadUrl')) {



        ClassicEditor.create(document.getElementById("editor"), {
    
            language: 'es',
            toolbar: {
                items: [
                    //'exportPDF', 'exportWord', '|',
                    // 'ckfinder',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code',  'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList',  '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment', '|',
                    'link', 'blockQuote', 'insertTable',  '|',
                    '|',  
                     'upload', // three
                    'flmngr', // buttons
                    'imgpen'  // of Flmngr
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Parrafo', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Titulo 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Titulo 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Titulo 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Titulo 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Titulo 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Titulo 6', class: 'ck-heading_heading6' }
                ]
            },
            placeholder: 'Welcome to CKEditor 5!',
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // htmlEmbed: {
            //     showPreviews: true
            // },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            
            removePlugins: [
                'ExportPdf',
                'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType'
            ]
        }).then(editor => {

            let Livewire = document.querySelector('#editor').getAttribute('data')
            Livewire = eval(Livewire);
            editor.setData(Livewire.description ?? '');

            editor.model.document.on('change:data', () => {

                Livewire = eval(Livewire);
                Livewire.description = editor.getData();
            });
        })
            .catch(error => {
                console.error(error);
            });


    }
};

document.addEventListener('DOMContentLoaded', function () {

    initializeCkEditor();
})

