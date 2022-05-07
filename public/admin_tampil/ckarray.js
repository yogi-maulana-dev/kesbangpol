
@foreach ($beritas as $editor)

<script>
    class anus<?php echo $editor['id']; ?> {


        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then(file => new Promise((resolve, reject) => {
                    this._initRequest();
                    this._initListeners(resolve, reject, file);
                    this._sendRequest(file);
                }));
        }

        abort() {
            if (this.xhr) {
                this.xhr.abort();
            }
        }

        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            xhr.open('POST', "{{ route('admin.ckeditor.upload', ['_token' => csrf_token()]) }}", true);

            xhr.responseType = 'json';
        }

        _initListeners(resolve, reject, file) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener('error', () => reject(genericErrorText));
            xhr.addEventListener('abort', () => reject());
            xhr.addEventListener('load', () => {
                const response = xhr.response;

                if (!response || response.error) {
                    return reject(response && response.error ? response.error.message : genericErrorText);
                }

                resolve(response);
            });

            if (xhr.upload) {
                xhr.upload.addEventListener('progress', evt => {
                    if (evt.lengthComputable) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                });
            }
        }

        _sendRequest(file) {
            const data = new FormData();

            data.append('upload', file);

            this.xhr.send(data);
        }
    }

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new anus {
                {
                    $editor - > id
                }
            }(loader);
        };
    }

    ClassicEditor
        .create(document.querySelector('#edit{{ $editor->id }}'), {

            image: {

                resizeOptions: [{
                    name: 'resizeImage:original'
                    , value: null
                    , label: 'Original'
                }, {
                    name: 'resizeImage:40'
                    , value: '40'
                    , label: '40%'
                }, {
                    name: 'resizeImage:60'
                    , value: '60'
                    , label: '60%'
                }]
            , },


            toolbar: [
                "ckfinder", "imageUpload", "|", "heading", "|", "bold", "italic", "|", "undo", "redo"
                , 'imageSize:lockAspectRatio', 'imageSize:width', 'imageSize:height', 'imageStyle:block'
                , 'imageStyle:side', '|', 'toggleImageCaption', 'imageTextAlternative', '|', 'linkImage'
                , 'resizeImage', 'resizeImage:50', 'resizeImage:75', 'resizeImage:original', 'insertTable'
                , 'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo',

            ],

            table: {
                defaultHeadings: {
                    rows: 1
                    , columns: 1
                }
            },

            alignment: {
                options: ['left', 'right']
            },

            extraPlugins: [MyCustomUploadAdapterPlugin]
        , })

        .catch(error => {
            console.error(error);
        });

</script>
@endforeach
