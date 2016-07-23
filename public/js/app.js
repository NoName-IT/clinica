    $( document ).ready(function() {

            $('#birth_date').datetimepicker({
                format: 'YYYY-MM-DD',
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

            $(function()
            {
                 $( "#birth_town_text" ).autocomplete({
                  source: "http://clinica.laravel/city/find",
                  minLength: 3,
                  select: function(event, ui) {
                    //Setea el valor  con el nombre de la localidad
                    //$('#birth_town_id').val(ui.item.value);
                    //Setea value="" con el ID correspondiente de la localidad para utilizarlo en el POST.
                    $('#birth_town').attr('value',ui.item.id);
                  }
                });
            });

            $(function()
            {
                 $( "#town_text" ).autocomplete({
                  source: "http://clinica.laravel/city/find",
                  minLength: 3,
                  select: function(event, ui) {
                    //Setea el valor  con el nombre de la localidad
                    //$('#birth_town_id').val(ui.item.value);
                    //Setea value="" con el ID correspondiente de la localidad para utilizarlo en el POST.
                    $('#town').attr('value',ui.item.id);
                    $('#birth_town_text').val(ui.item.value);
                    $('#birth_town').attr('value',ui.item.id);
                  }
                });
            });

   $(function()
    {
         $( "#town" ).autocomplete({
          source: "http://clinica.laravel/find/Town/name/Completo",
          minLength: 3,
          select: function(event, ui) {
            //Setea el valor  con el nombre de la localidad
            $('#town').val(ui.item.value);
            //Setea value="" con el ID correspondiente de la localidad para utilizarlo en el POST.
            $('#town').attr('value',ui.item.id);
          }
        });
    });

    $(function()
        {
             $( "#dni" ).autocomplete({
              //source: "http://clinica.laravel/find/" + $('#dni_clase_find').val() + '/' +$('#dni_campo_find').val() + '/' +$('#dni_completo').val(),
              source: "http://clinica.laravel/find/Patient/dni/Completo",
              minLength: 3,
              select: function(event, ui) {
                //Setea el valor  con el nombre de la localidad
                //$('#dni').val(ui.item.value);
                //Setea value="" con el ID correspondiente de la localidad para utilizarlo en el POST.
                //$('#dni').attr('value',ui.item.id);
                $('#first_name').attr('value',ui.item.first_name);
                $('#last_name').attr('value',ui.item.last_name);
                $('#birth_date').attr('value',ui.item.birth_date);
                $('#birth_town').attr('value',ui.item.birth_town);
                $('#birth_town_text').attr('value',ui.item.birth_town_text);
                $('#birth_time').attr('value',ui.item.birth_time);                
                $('select[name=civil_status]').val(ui.item.civil_status_id);
                $('.selectpicker').selectpicker('refresh');
                //Cambia el SelectPicker a Selected segun el ID que recibió.
                $('select[name=dni_type]').val(ui.item.dni_type_id);
                $('.selectpicker').selectpicker('refresh');
                $('#street_address').attr('value',ui.item.street_address);
                $('#town').attr('value',ui.item.town);
                $('#phone').attr('value',ui.item.phone);
                $('select[name=blood_type]').val(ui.item.blood_type_id);
                $('.selectpicker').selectpicker('refresh');     
                $('#dni').attr('value',ui.item.dni);
                $('#town_text').attr('value',ui.item.town_text);

                $('select[name=dni_copy]').val(ui.item.dni_copy);
                //$('.selectpicker').selectpicker('refresh');

                if (ui.item.dni_copy == 1) {
                    $('#dni_copy').prop('checked', true);

                } else {
                    $('#dni_copy').prop('checked', false);

                }


                if (ui.item.medical_insurance_copy == 1) {
                    $('#medical_insurance_copy').prop('checked', true);

                } else {
                    $('#medical_insurance_copy').prop('checked', false);

                }

                $('select[name=medical_insurance]').val(ui.item.medical_insurance);
                $('.selectpicker').selectpicker('refresh');
                $('select[name=coinsurance]').val(ui.item.coinsurance);
                $('.selectpicker').selectpicker('refresh');

              }
            });

        });

        $('#complete').on("click",function() {
            $('#testigo_1').attr('value','1');
            $('#testigo_2').attr('value','1');
        }); 




        });