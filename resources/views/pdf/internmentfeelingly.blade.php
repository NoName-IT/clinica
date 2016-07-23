		{{ dd($internment->medic_full_name)}}

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="{!! asset('bower_components/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <title>Example 2</title>
    </head>
    <body>
        <div class="row col-md-12">
        	<div class="col-md-12 ">
        		<label for="" class="col-md-6 ">@lang('internmentfeelingly.clinic_logo')</label>
        	</div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<label for="" class="col-md-6 ">@lang('internmentfeelingly.clinic_name')</label>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 ">@lang('internmentfeelingly.clinic_address')</p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 ">@lang('internmentfeelingly.clinic_phone')</p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-8 ">
            		<p class="col-md-8 ">@lang('internmentfeelingly.clinic_email')</p>
            	</div>
            </div>  
        </div>
        <br><br>
        <!-- FIN ENCABEZADO!-->

        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                <h2>@lang('internmentfeelingly.title_document')</h2> 
            </div>
        </div>
        <br><br>


      <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.first_name') {{ $internment->patient->first_name }}</label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.last_name') {{ $internment->patient->last_name }}</label>
            </div>
		</div>
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.medical_insurance') {{ $internment->patient->last_medical_insurance_name }}</label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.afiliate_number') {{ $internment->os_affiliate_number }}</label>
            </div>
		</div>
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.medical_coinsurance') {{ $internment->patient->last_medical_insurance_name }}</label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.afiliate_number') {{ $internment->co_affiliate_number }}</label>
            </div>
		</div>      
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.date') {{ $internment->id }}</label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.time') {{ $internment->id }}</label>
            </div>
		</div>     
	    <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.birth_date') {{ $internment->patient->birth_date }}</label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.birth_town') {{ $internment->id }}</label>
            </div>
		</div>
	    <div class="row col-md-12">
            <div class="col-md-4 ">
                <label for="" class="col-md-3 ">@lang('internmentfeelingly.age') {{ $internment->patient->age }}</label>
            </div>
			<div class="col-md-4 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.civil_status') {{ $internment->patient->civil_status->name }}</label>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.dni_type') {{ $internment->patient->dni }}</label>
            </div>
		</div>   
	    <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.city') {{ $internment->patient->town }}</label>
            </div>
        </div>            
	    <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.address') {{ $internment->patient->street_address }}</label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 ">@lang('internmentfeelingly.phone') {{ $internment->patient->phone }}</label>
            </div>
		</div>
	    <div class="row col-md-12">
			<div class="col-md-10 ">
                <p align="justify">@lang('internmentfeelingly.feelingly_text')<p>
            </div>	    
		</div>
 

    </body>







@lang('internmentfeelingly.signature_responsible')
@lang('internmentfeelingly.signature_patient')
@lang('internmentfeelingly.signature_text')
@lang('internmentfeelingly.signature_witness')
@lang('internmentfeelingly.full_name')
@lang('internmentfeelingly.relationship')
@lang('internmentfeelingly.responsible_minor_text')
@lang('internmentfeelingly.signature_responsible_minor')