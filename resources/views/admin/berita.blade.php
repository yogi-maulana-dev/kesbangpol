@extends('layouts.main_login_admin')
@section('berita')
<style>
 .modal {
  overflow-y: auto;
 }

 .ck-content .image-style-side {
    max-width: 50%;
    float: right;
    margin-left: var(--ck-image-style-spacing);
}


 .ck-content .image.image_resized {
    display: block;
    box-sizing: border-box;
}

.ck-content .image.image_resized img {
    width: 100%;
}

.ck-content .image.image_resized > figcaption {
    display: block;
}

M.Modal.init( modal, { dismissible: false } );

// Or "jQuery way":
$( '#modal-container' ).modal( {
    dismissible: false
} );



</style>


<div class="card">
 <div class="card-block">

  <div class="card-header">
   <h5>Halaman Berita yang akan di tampilkan pada aplikasi kesbang pol mesuji</h5>
   <button class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info" data-target="#tabbed-form" data-titleku="DataOrkemas" data-toggle="modal">Tambah Berita<span data-feather="plus-circle"></span></button>
  </div>
  <div class="card-block">
   <div class="dt-responsive table-responsive">
    <table id="new-cons" class="table table-striped table-bordered nowrap">
     <thead>
      <tr>
       <th>No</th>
       <th>Judul</th>
       {{-- <th>Nomor Whatsapp</i>
							</th> --}}
       <th>Gambar</th>
       <th>Isi</th>
       <th>Kategori</th>
       <th>Status</th>
      </tr>
     </thead>

     @foreach ($beritas as $no => $berita)
     <tbody>
      <tr>
       <td>{{ ++$no }}</td>
       <td>{{ $berita->title }}</td>
       <td>{{ $berita->gambar }}</td>
       <td>{{ $berita->excerpt }}</td>
       <td>{{ $berita->categori->name }}</td>
       <td> <button class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info" data-target="#{{ $berita->id }}" data-titleku="DataOrkemas" data-toggle="modal"><span data-feather="eye"></span></button>
        {{-- <a href="/data/{{ $berita->id }}/edit"
        class="badge bg-warning"><span data-feather="edit"></span></a> --}}
       </td>
       {{-- <td>
								<a href="{{ route('admin.download', $berita->nama) }}" target="_blank" rel="noopener"
       class="btn btn-success btn-sm text-white">
       Download
       </a>

       </td> --}}

      </tr>
     </tbody>
     @endforeach
    </table>
   </div>
  </div>
 </div>
</div>

@foreach ($beritas as $berita)
<!-- tabbed form modal start -->
<div id="{{ $berita->id }}" class="modal fade mixed-form" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="card">
   <div class="card-body">
    <!-- Nav tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
     <div class="tab-pane active" id="sign_in" role="tabpanel">
      <form action="{{ route('admin.berita.update') }}" method="POST" class="md-float-material form-material" enctype="multipart/form-data">
       @csrf
       <p class="text-muted text-center p-b-5">Edit Posting Berita</p>
       <input type="hidden" name="berita" value="{{ $berita->id }}">
       <div class="form-group">
        <input type="text" name="title" id="title{{ $berita->id }}" class="form-control @error('title') is-valid @enderror" required="" value="{{ $berita->title }}">

        <span class="form-bar"></span>
        <label class="float-label">Judul</label>
        @error('title')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
        @enderror
       </div>

       <div class="form-group">
        <input type="text" name="slug" id="slug{{ $berita->id }}" class="form-control @error('slug') is-valid @enderror" readonly>
        <span class="form-bar"></span>
        <label class="float-label">Slug</label>
        @error('slug')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
        @enderror
       </div>

       <div class="form-group form-primary">
        <label class="col-sm-4 col-form-label">Gambar Berita</label>
        <input type="hidden" name="filegambar" value="{{ $berita->gambar }}">
        <input type="file" name="gambar" class="form-control" required="">
        <span class="form-bar"></span>
       </div>

       <div class="form-group text-white">
        <h4 class="sub-title">Kategori</h4>
        <select name="categori_id" class="js-example-data-array">
         @foreach ($categoris as $categori)
         @if (old('categori_id') === $categori->id)
         <option value="{{ $categori->id }}" select>{{ $categori->name }}
         </option>
         @else
         <option value="{{ $categori->id }}">{{ $categori->name }}
         </option>
         @endif
         @endforeach
        </select>

       </div>

       <div class="form-group form-primary">
        <label class="col-sm-4 col-form-label">Isi berita</label>
        <textarea class="form-control @error('body') is-valid @enderror editor" rows="100" cols="300" id="edit{{ $berita->id }}" name="body">{{ $berita->body }}</textarea>
        <div class="invalid-feedback">

        </div>
       </div>

       <div class="row m-t-30">
        <div class="col-md-12">
         <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Simpan
          Data</button>

        </div>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<!-- tabbed form modal end -->
@endforeach



{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/decoupled-document/ckeditor.js"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}



{{-- <script>
	ClassicEditor

		.create(document.querySelector('#editor'), {
			ckfinder: {
				uploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}"
}

})

.then(editor => {
console.log(editor);
})

.catch(error => {
console.error(error);
});

</script> --}}



<!-- tabbed form modal start -->
<div id="tabbed-form" class="modal fade mixed-form" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="card">
   <div class="card-body">
    <!-- Nav tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
     <div class="tab-pane active" id="sign_in" role="tabpanel">
      <form action="{{ route('admin.berita.store') }}" method="POST" class="md-float-material form-material" enctype="multipart/form-data">
       {{ csrf_field() }}
       <p class="text-muted text-center p-b-5">Form Posting Berita</p>
       <div class="form-group">
        <input type="text" name="title" id="title" class="form-control @error('title') is-valid @enderror" required="" value="{{ old('title') }}">
        <span class="form-bar"></span>
        <label class="float-label">Judul</label>
        @error('title')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
        @enderror
       </div>

       <div class="form-group">
        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-valid @enderror" required="" value="{{ old('slug') }}" readonly>
        <span class="form-bar"></span>
        <label class="float-label">Slug</label>
        @error('slug')
        <div class="invalid-feedback">
         {{ $message }}
        </div>
        @enderror
       </div>

       <div class="form-group form-primary">
        <label class="col-sm-4 col-form-label">Gambar Berita</label>
        <input type="file" name="gambar" class="form-control" required="">
        <span class="form-bar"></span>
       </div>

       <div class="form-group text-white">
        <h4 class="sub-title">Kategori</h4>
        <select name="categori_id" class="js-example-data-array">
         @foreach ($categoris as $categori)
         @if (old('categori_id') === $categori->id)
         <option value="{{ $categori->id }}" select>{{ $categori->name }}
         </option>
         @else
         <option value="{{ $categori->id }}">{{ $categori->name }}
         </option>
         @endif
         @endforeach
        </select>
       </div>

       <div class="form-group form-primary">
        <label class="col-sm-4 col-form-label">Isi berita</label>
           <div id="toolbar-container"></div>
        <textarea class="form-control @error('body') is-valid @enderror editor" rows="100" cols="300" id="editor" name="body">{{ old('body') }}</textarea>
        <div class="invalid-feedback">
        </div>
       </div>

       <div class="row m-t-30">
        <div class="col-md-12">
         <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Simpan
          Data</button>

        </div>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<!-- tabbed form modal end -->

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> --}}
<script src="/admin_tampil/ckeditor5/ckeditor.js"></script>
<script src="/admin_tampil/ckfinder/ckfinder.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
         ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },


   toolbar:{
    items: [
        "ckfinder", "imageUpload", "|",
        'resizeImage:50',
            'resizeImage:75',
            'resizeImage:original', "|",
            'toggleImageCaption', 'imageTextAlternative', "|",
        'heading', '|',
        'alignment', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
        'link', '|',
        'bulletedList', 'numberedList', 'todoList',
        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
        'code', 'codeBlock', '|',
        'insertTable', '|',
        'outdent', 'indent', '|','blockQuote', '|',
        'undo', 'redo','|',
    ],
    shouldNotGroupWhenFull: true
   },
   })
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>





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
            return new anus<?php echo $editor['id']; ?> (loader);
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

    <script>
        const title<?php echo $editor['id']; ?> = document.querySelector('#title<?php echo $editor['id']; ?>');
        const slug<?php echo $editor['id']; ?> = document.querySelector('#slug<?php echo $editor['id']; ?>');

        title<?php echo $editor['id']; ?>.addEventListener('change', function() {
            fetch('/admin/berita/checkSlug?title=' +
                    title<?php echo $editor['id']; ?>.value)
                .then(response => response.json())
                .then(data => slug<?php echo $editor['id']; ?>.value = data.slug)
        });

    </script>


@endforeach


@endsection
