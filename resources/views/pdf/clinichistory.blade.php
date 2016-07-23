<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="{!! asset('bower_components/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <title>Example 2</title>
    </head>
    <body>
        <div class="row col-md-12">
        	<div class="col-md-12 ">
        		<label for="" class="col-md-6 ">@lang('clinic_history.clinic_logo')</label>
        	</div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<label for="" class="col-md-6 ">@lang('clinic_history.clinic_name')</label>
                    <label for="" class="col-md-3 col-md-offset-9 ">@lang('clinic_history.head_right')</label>

            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 ">@lang('clinic_history.clinic_address')</p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 ">@lang('clinic_history.clinic_phone')</p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-6 ">
            		<p class="col-md-6 ">@lang('clinic_history.clinic_email')</p>
            	</div>
            </div>  
        </div>
        <br><br>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4">
                <h2>@lang('clinic_history.title_document')</h2> 
            </div>
        </div>
        <br><br>
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-2 ">@lang('clinic_history.medical_insurance') {{ $internment->patient->last_medical_insurance_name }}</label>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-4 ">@lang('clinic_history.afiliate_number') </label><p>{{ $internment->id}}</p>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-4 ">@lang('clinic_history.history_number') {{ $internment->clinic_history }}</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-8 ">
                <label for="" class="col-md-8 ">@lang('clinic_history.full_name') {{ $internment->patient->full_name}}</label>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-4 ">@lang('clinic_history.age')  {{ $internment->patient->age }}</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.initial_date') {{ $internment->initial_date}}</label>
            </div>
            <div class="col-md-6 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.final_date') {{ $internment->final_date == '0000-00-00 00:00:00' ? ' Continua internado' : $internment->final_date  }}</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-12 ">
                <label for="" class="col-md-12 ">@lang('clinic_history.diagnostic') {{ $internment->diagnostic}}</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.personal_history')</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.current_status')</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.current_medication')</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.pronostic')</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 ">@lang('clinic_history.observations')</label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6  col-md-offset-6">
                <div></div>
                <label for="" class="col-md-6 ">@lang('clinic_history.responsible_professional_signature')</label>
            </div>
        </div>   
    </body>