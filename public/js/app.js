    $( document ).ready(function() {

            $('#birth_date').datetimepicker({
                format: 'DD-MM-YYYY',
                locale: 'es'
            });
            $('#birth_time').datetimepicker({
                format: 'HH:mm',
            });
            $('#dni_copy').checkboxpicker({
                html: true,
                offLabel: '<span class="glyphicon glyphicon-remove">',
                onLabel: '<span class="glyphicon glyphicon-ok">'
            });
            $('#medical_insurance_copy').checkboxpicker({
                html: true,
                offLabel: '<span class="glyphicon glyphicon-remove">',
                onLabel: '<span class="glyphicon glyphicon-ok">',
                toggleKeyCodes: [0, 1]
            });

            // Eliminacion de row
            $('.btn-danger').click(function (e) {
                // body...
                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':MY_ID', id);
                var data = form.serialize();

                $.confirm({
                        title: 'Confirmación:',
                        content: 'Desea Eliminar el item!!!',
                        confirmButton: 'Si',
                        cancelButton: 'NO',
                        backgroundDismiss: true,
                        theme: 'black',
                        keyboardEnabled: true,
                        confirmButtonClass: 'btn-success',
                        cancelButtonClass: 'btn-danger',
                        confirm: function(){
                
                            
                            $.post(url, data, function (result) {
                                // body...
                                row.fadeOut();
                                //alert(id);
                                
                                $('.ajax-message').html('<div class="alert alert-danger" id="hide"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + result + '</div>');

                            });
                        }
                    });

                

            });

        });