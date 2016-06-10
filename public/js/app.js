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

        });