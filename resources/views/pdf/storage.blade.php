@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Carga de Archivos
                </div>
                <div class="panel-body">
                    <form id='my-dropzone' class='dropzone'  method="POST" action="file.store" accept-charset="UTF-8" enctype="multipart/form-data">

                      <div class="dz-message" style="height:200px;">
                          Subir archivos moviendolos o haciendo click.
                      </div>
                      <div class="dropzone-previews"></div>
                      <button type="submit" class="btn btn-success" id="submit">Save</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 4,
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    alert("file uploaded");
                });
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection