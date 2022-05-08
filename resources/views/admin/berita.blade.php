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

        .ck-content .image.image_resized>figcaption {
            display: block;
        }

        M.Modal.init(modal, {
                dismissible: false
            }

        );

        // Or "jQuery way":
        $('#modal-container').modal( {
                dismissible: false
            }

        );

    </style>


    <div class="card">
        <div class="card-block">

            <div class="card-header">
                <h5>Halaman Berita yang akan di tampilkan pada aplikasi kesbang pol mesuji</h5>
                <button class="btn waves-effect waves-light btn-success btn-outline-success badge badge-pill badge-success"
                    data-target="#tabbed-form" data-titleku="DataOrkemas" data-toggle="modal">Tambah Berita<span
                        data-feather="plus-circle"></span></button>
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
                                    <td> <button
                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary badge bg-info"
                                            data-target="#{{ $berita->id }}" data-titleku="DataOrkemas"
                                            data-toggle="modal"><span data-feather="edit"></span></button>
                                        {{-- <a href="/data/{{ $berita->id }}/edit"
        class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                                        <form action="/admin/berita/destroy/{{ $berita->id }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <input type="hidden" name="hapusgambar" value="{{ $berita->gambar }}">
                                            <button
                                                class="btn waves-effect waves-light btn-warning btn-outline-warning badge bg-danger"
                                                onclick="return confirm('Apakah ingin menghapus Berita ini ?')"><span
                                                    data-feather="trash-2"></span></button>
                                        </form>

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
                                <form action="{{ route('admin.berita.update') }}" method="POST"
                                    class="md-float-material form-material" enctype="multipart/form-data">
                                    @csrf
                                    <p class="text-muted text-center p-b-5">Edit Posting Berita</p>
                                    <input type="hidden" name="berita" value="{{ $berita->id }}">
                                    <div class="form-group">
                                        <input type="text" name="title" id="title{{ $berita->id }}"
                                            class="form-control @error('title') is-valid @enderror" required=""
                                            value="{{ $berita->title }}">

                                        <span class="form-bar"></span>
                                        <label class="float-label">Judul</label>
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="slug" id="slug{{ $berita->id }}"
                                            class="form-control @error('slug') is-valid @enderror"
                                            value="{{ $berita->slug }}" readonly>
                                        <span class="form-bar"></span>

                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group form-primary">
                                        <label class="col-sm-11 col-form-label">Gambar Berita</label>
                                        @if ($berita->gambar)
                                            <img src="{{ asset('gambarberita/' . $berita->gambar) }}"
                                                class="img-preview img-fluid mv3 col-sm-5">
                                        @else
                                            <img class="img-preview img-fluid mv3 col-sm-5">
                                        @endif
                                        <input type="hidden" name="filegambar" value="{{ $berita->gambar }}">
                                        <input type="file" name="gambar" id="image" class="form-control"
                                            onchange="previewImage()">
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
                                        <div id="toolbar-container{{ $berita->id }}"></div>
                                        <textarea class="form-control @error('body') is-valid @enderror editor" rows="100" cols="300"
                                            id="edit{{ $berita->id }}" name="body">{{ $berita->body }}</textarea>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>

                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Simpan
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
                            <form action="{{ route('admin.berita.store') }}" method="POST"
                                class="md-float-material form-material" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <p class="text-muted text-center p-b-5">Form Posting Berita</p>
                                <div class="form-group">
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-valid @enderror" required=""
                                        value="{{ old('title') }}">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Judul</label>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="slug" id="slug"
                                        class="form-control @error('slug') is-valid @enderror" required=""
                                        value="{{ old('slug') }}" readonly>
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
                                    <textarea class="form-control @error('body') is-valid @enderror editor" rows="100" cols="300" id="editor"
                                        name="body">{{ old('body') }}</textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Simpan
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
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },

                imageRemoveEvent: {
                    additionalElementTypes: null, // Add additional element types to invoke callback events. Default is null and it's not required. Already included ['image','imageBlock','inlineImage']
                    // additionalElementTypes: ['image', 'imageBlock', 'inlineImage'], // Demo to write additional element types
                    callback: (imagesSrc, nodeObjects) => {
                        // note: imagesSrc is array of src & nodeObjects is array of nodeObject
                        // node object api: https://ckeditor.com/docs/ckeditor5/latest/api/module_engine_model_node-Node.html

                        console.log('callback called', imagesSrc, nodeObjects)
                    }
                },


                toolbar: {
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
                        'outdent', 'indent', '|', 'blockQuote', '|',
                        'undo', 'redo', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
            })
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
    </script>





    @foreach ($beritas as $editor)
        <script>
            ClassicEditor
                .create(document.querySelector('#edit<?php echo $editor['id']; ?>'), {
                    ckfinder: {
                        uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                    },


                    toolbar: {
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
                            'outdent', 'indent', '|', 'blockQuote', '|',
                            'undo', 'redo', '|',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .then(editor => {
                    const toolbarContainer = document.querySelector('#toolbar-container{{ $editor->id }}');

                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                })
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

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
