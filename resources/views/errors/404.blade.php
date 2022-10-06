@extends('layouts.app')
@section('title') @lang('app.not_found_404') | @parent @endsection

@section('content')

    <section class="categories-wrap wrap-404"> <!-- explore categories -->
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>404 Error</h1>
                    @if(isset($error_msg) && $error_msg == 'campaign_private_error')
                        <h2><i class="fa fa-info-circle"></i> @lang('app.campaign_private_error')</h2>
                    @else
                    <h2><i class="fa fa-info-circle"></i> @lang('app.not_found_404')</h2>
                    @endif
                </div>
            </div>

        </div>
    </section> <!-- #explore categories -->

@endsection
