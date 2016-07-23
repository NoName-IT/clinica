@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/internments') }}">@lang('general.internments')</a></li>
                        <li class="active">@lang('internment.exportpdf')</li>
                    </ol>
                </div>

                <div class="panel-body">
                	<div class="row">
						<div class="col-md-6 col-md-offset-2">
		                    <button type="submit" id="" onclick="" class="btn btn-warning">
		                        <i class="fa fa-btn fa-user"></i> @lang('internment.feelingly')
		                    </button> 
	                	</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6 col-md-offset-2">
		                    <button type="submit" id="" onclick="" class="btn btn-warning">
		                        <i class="fa fa-btn fa-user"></i> @lang('internment.clinic_history_pdf')
		                    </button> 
	                	</div>
	                </div>
	                <br><br><br><br>

					<div class="row">
						<div class="col-md-6 col-md-offset-6">
		                    <button type="submit" id="" onclick="" class="btn btn-success">
		                        <i class="fa fa-btn fa-user"></i> @lang('internment.finalize')
		                    </button> 
	                	</div>
	                </div>
					
                </div>
            </div>
        </div>
    </div>
</div>

@endsection