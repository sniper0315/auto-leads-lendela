@extends('layouts.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css')}}">
@endsection

@section('content')

    <div class="dashboard-wrap">
        <div class="container">
            <div id="wrapper">

                @include('admin.menu')

                <div id="page-wrapper">
                    @if( ! empty($title))
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"> {{ $title }}  </h1>
                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    @endif

                    @include('admin.flash_msg')

                    <div class="row">
                        <div class="col-md-12 col-xs-12">

                            <div class="alert alert-info">
                                <h5> <i class="fa fa-money"></i> @lang('app.you_will_get') {{$campaign->campaign_owner_commission}}% @lang('app.of_total_raised')</h5>
                            </div>

                            <ul class="campaign-update-nav">
                                <li><a href="{{route('edit_campaign_rewards', $campaign->id)}}"> @lang('app.rewards') ({{$campaign->rewards->count()}})</a> </li>
                                <li><a href="{{route('edit_campaign_updates',  $campaign->id )}}"> @lang('app.updates') ({{$campaign->updates->count()}})</a> </li>
                                <li><a href="{{route('edit_campaign_faqs', $campaign->id)}}"> @lang('app.faq') ({{$campaign->faqs->count()}})</a> </li>
                            </ul>

                            <form action="{{ route('campaings.update', $campaign->id) }}" id="startCampaignForm" class="form-horizontal" method="post" enctype="multipart/form-data" >
                                @csrf

                                <legend>@lang('app.campaign_info')</legend>

                                <div class="form-group  {{ $errors->has('category')? 'has-error':'' }}">
                                    <label for="category" class="col-sm-4 control-label">@lang('app.category') <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" id="category" name="category">
                                            <option value="">@lang('app.select_a_category')</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($campaign->category_id == $category->id) selected="selected" @endif >{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->has('category')? '<p class="help-block">'.$errors->first('category').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('title')? 'has-error':'' }}">
                                    <label for="title" class="col-sm-4 control-label">@lang('app.title') <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title" value="{{ $campaign->title }}" name="title" placeholder="@lang('app.title')">
                                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                                        <p class="text-info"> @lang('app.great_title_info')</p>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('short_description')? 'has-error':'' }}">
                                    <label for="short_description" class="col-sm-4 control-label">@lang('app.short_description')</label>
                                    <div class="col-sm-8">
                                        <textarea id="short_description" name="short_description" class="form-control" rows="3">{{ $campaign->short_description }}</textarea>
                                        {!! $errors->has('short_description')? '<p class="help-block">'.$errors->first('short_description').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('description')? 'has-error':'' }}">
                                    <label for="description" class="col-sm-4 control-label">@lang('app.description') <span class="field-required">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="alert alert-info"> @lang('app.image_insert_limitation') </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea id="description" name="description" class="form-control description" rows="8">{{ $campaign->description}}</textarea>
                                        {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':'' !!}
                                        <p class="text-info"> @lang('app.description_info_text')</p>
                                    </div>
                                </div>

                                <div class="form-group required {{ $errors->has('type')? 'has-error':'' }}">
                                  <label class="col-md-4 control-label">@lang('app.property_type') <span class="field-required">*</span> </label>
                                  <div class="col-md-8">
                                      <label for="type_apartment" class="radio-inline">
                                          <input type="radio" value="apartment" id="type_apartment" name="type"  {{ $campaign->type == 'apartment' ? 'checked="checked"' : '' }}>
                                          @lang('app.apartment')
                                      </label>

                                      <label for="type_condos" class="radio-inline">
                                          <input type="radio" value="condos" id="type_condos" name="type"  {{ $campaign->type == 'condos' ? 'checked="checked"' : '' }}>
                                          @lang('app.condos')
                                      </label>

                                      <label for="type_house" class="radio-inline">
                                          <input type="radio" value="house" id="type_house" name="type" {{ $campaign->type == 'house' ? 'checked="checked"' : '' }}>
                                          @lang('app.house')
                                      </label>

                                      <label for="type_land" class="radio-inline">
                                          <input type="radio" value="land" id="type_land" name="type" {{ $campaign->type == 'land' ? 'checked="checked"' : '' }}>
                                          @lang('app.land')
                                      </label>

                                      <label for="type_commercial_space" class="radio-inline">
                                          <input type="radio" value="commercial_space" id="type_commercial_space" name="type" {{ $campaign->type == 'commercial_space' ? 'checked="checked"' : '' }}>
                                          @lang('app.commercial_space')
                                      </label>

                                      <label for="type_villa" class="radio-inline">
                                          <input type="radio" value="villa" id="type_villa" name="type" {{ $campaign->type == 'villa' ? 'checked="checked"' : '' }}>
                                          @lang('app.villa')
                                      </label>

                                      {!! $errors->has('type')? '<p class="help-block">'.$errors->first('type').'</p>':'' !!}
                                  </div>
                                </div>
                                
                                <div class="form-group {{ $errors->has('purpose')? 'has-error':'' }}">
                                    <label for="purpose" class="col-sm-4 control-label">@lang('app.purpose')</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2NoSearch select2" name="purpose" id="purpose">
                                            <option value="sale" {{ $campaign->purpose == 'sale' ? 'selected':'' }}>@lang('app.sale')</option>
                                            <option value="rent" {{ $campaign->purpose == 'rent' ? 'selected':'' }}>@lang('app.rent')</option>
                                        </select>
                                        {!! $errors->has('purpose')? '<p class="help-block">'.$errors->first('purpose').'</p>':'' !!}
                                    </div>
                                </div>

                                <legend>@lang('app.property_detail')</legend>

                                <div class="form-group {{ $errors->has('square_unit_space')? 'has-error':'' }}">
                                    <label for="square_unit_space" class="col-sm-4 control-label">@lang('app.square_unit_space')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="square_unit_space" value="{{ $campaign->square_unit_space }}" name="square_unit_space" placeholder="@lang('app.square_unit_space')">
                                        {!! $errors->has('square_unit_space')? '<p class="help-block">'.$errors->first('square_unit_space').'</p>':'' !!}
                                        <p class="text-info">@lang('app.square_unit_space_help_text') </p>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('floor')? 'has-error':'' }}">
                                    <label for="floor" class="col-sm-4 control-label">@lang('app.floor')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="floor" value="{{ $campaign->floor }}" name="floor" placeholder="@lang('app.floor_ex')">
                                        {!! $errors->has('floor')? '<p class="help-block">'.$errors->first('floor').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('beds')? 'has-error':'' }}">
                                    <label for="beds" class="col-sm-4 control-label">@lang('app.beds')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="beds" value="{{ $campaign->beds }}" name="beds" placeholder="@lang('app.beds')">
                                        {!! $errors->has('beds')? '<p class="help-block">'.$errors->first('beds').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('attached_bath')? 'has-error':'' }}">
                                    <label for="attached_bath" class="col-sm-4 control-label">@lang('app.attached_bath')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="attached_bath" value="{{ $campaign->attached_bath }}" name="attached_bath" placeholder="@lang('app.attached_bath')">
                                        {!! $errors->has('attached_bath')? '<p class="help-block">'.$errors->first('attached_bath').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('common_bath')? 'has-error':'' }}">
                                    <label for="common_bath" class="col-sm-4 control-label">@lang('app.common_bath')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="common_bath" value="{{ $campaign->common_bath }}" name="common_bath" placeholder="@lang('app.common_bath')">
                                        {!! $errors->has('common_bath')? '<p class="help-block">'.$errors->first('common_bath').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('balcony')? 'has-error':'' }}">
                                    <label for="balcony" class="col-sm-4 control-label">@lang('app.balcony')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="balcony" value="{{ $campaign->balcony }}" name="balcony" placeholder="@lang('app.balcony')">
                                        {!! $errors->has('balcony')? '<p class="help-block">'.$errors->first('balcony').'</p>':'' !!}
                                    </div>
                                </div>

                                <legend>@lang('app.location_info')</legend>

                                <div class="form-group  {{ $errors->has('country')? 'has-error':'' }}">
                                    <label for="country" class="col-sm-4 control-label">@lang('app.country') <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <select id="country" class="form-control select2" name="country">
                                            <option value="">@lang('app.select_a_country')</option>
                                            <option value="United States" selected>United States</option>
                                        </select>
                                        {!! $errors->has('country')? '<p class="help-block">'.$errors->first('country').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group  {{ $errors->has('state')? 'has-error':'' }}">
                                    <label for="state" class="col-sm-4 control-label">@lang('app.state')</label>
                                    <div class="col-sm-8">
                                        <select id="state" class="form-control select2" id="state_select" name="state">
                                            @foreach($states as $state)
                                                <option value="{{ $state->state }}" {{ $campaign->state == $state->state ? 'selected' :'' }}>{{ $state->state }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-info">
                                            <span id="state_loader" style="display: none;"><i class="fa fa-spin fa-spinner"></i> </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group  {{ $errors->has('city')? 'has-error':'' }}">
                                    <label for="city" class="col-sm-4 control-label">@lang('app.city')</label>
                                    <div class="col-sm-8">
                                        <select id="city" class="form-control select2" id="city_select" name="city">
                                            @if($cities->count() > 0)
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->city }}" {{ $campaign->city == $city->city ? 'selected':'' }}>{{ $city->city }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="text-info">
                                            <span id="city_loader" style="display: none;"><i class="fa fa-spin fa-spinner"></i> </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('address')? 'has-error':'' }}">
                                    <label for="address" class="col-sm-4 control-label">@lang('app.address')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" value="{{ $campaign->address }}" name="address" placeholder="@lang('app.address')">
                                        {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('latitude')? 'has-error':'' }}">
                                    <label for="latitude" class="col-sm-4 control-label">@lang('app.latitude')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="latitude" value="{{ $campaign->latitude }}" name="latitude" placeholder="@lang('app.latitude')">
                                        {!! $errors->has('latitude')? '<p class="help-block">'.$errors->first('latitude').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('longitude')? 'has-error':'' }}">
                                    <label for="longitude" class="col-sm-4 control-label">@lang('app.longitude')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="longitude" value="{{ $campaign->longitude }}" name="longitude" placeholder="@lang('app.longitude')">
                                        {!! $errors->has('longitude')? '<p class="help-block">'.$errors->first('longitude').'</p>':'' !!}
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="additional_details" class="col-sm-4 control-label">@lang('app.additional_details')</label>
                                    <div class="col-sm-8">
                                        <label><input type="checkbox" value="1" name="dining_space" /> @lang('app.dining_space') </label>
                                        <label><input type="checkbox" value="2" name="living_room" /> @lang('app.living_room') </label>
                                    </div>
                                </div> --}}

                                <legend></legend>

                                <div class="form-group {{ $errors->has('goal')? 'has-error':'' }}">
                                    <label for="goal" class="col-sm-4 control-label">@lang('app.goal') <span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="goal" value="{{ $campaign->goal }}" name="goal" placeholder="@lang('app.goal')">
                                        {!! $errors->has('goal')? '<p class="help-block">'.$errors->first('goal').'</p>':'' !!}
                                    </div>
                                </div>

                                {{--<div class="form-group {{ $errors->has('min_amount')? 'has-error':'' }}">
                                    <label for="min_amount" class="col-sm-4 control-label">@lang('app.min_amount')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="min_amount" value="{{ $campaign->min_amount }}" name="min_amount" placeholder="@lang('app.min_amount')">
                                        {!! $errors->has('min_amount')? '<p class="help-block">'.$errors->first('min_amount').'</p>':'' !!}
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('max_amount')? 'has-error':'' }}">
                                    <label for="max_amount" class="col-sm-4 control-label">@lang('app.max_amount')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="max_amount" value="{{ $campaign->max_amount }}" name="max_amount" placeholder="@lang('app.max_amount')">
                                        {!! $errors->has('max_amount')? '<p class="help-block">'.$errors->first('max_amount').'</p>':'' !!}
                                    </div>
                                </div>--}}

                                <div class="form-group {{ $errors->has('recommended_amount')? 'has-error':'' }}">
                                    <label for="recommended_amount" class="col-sm-4 control-label">@lang('app.recommended_amount')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="recommended_amount" value="{{ $campaign->recommended_amount}}" name="recommended_amount" placeholder="@lang('app.recommended_amount')">
                                        {!! $errors->has('recommended_amount')? '<p class="help-block">'.$errors->first('recommended_amount').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('amount_prefilled')? 'has-error':'' }}">
                                    <label for="amount_prefilled" class="col-sm-4 control-label">@lang('app.amount_prefilled')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="amount_prefilled" value="{{ $campaign->amount_prefilled}}" name="amount_prefilled" placeholder="@lang('app.amount_prefilled')">
                                        {!! $errors->has('amount_prefilled')? '<p class="help-block">'.$errors->first('amount_prefilled').'</p>':'' !!}
                                        <p class="text-info"> @lang('app.amount_prefilled_info_text')</p>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('end_method')? 'has-error':'' }}">
                                    <label for="end_method" class="col-sm-4 control-label">@lang('app.campaign_end_method')</label>
                                    <div class="col-sm-8">

                                        <label>
                                            <input type="radio" name="end_method"  value="goal_achieve" @if($campaign->end_method == 'goal_achieve') checked="checked" @endif > @lang('app.after_goal_achieve')
                                        </label> <br />

                                        <label>
                                            <input type="radio" name="end_method" value="end_date"  @if($campaign->end_method == 'end_date') checked="checked" @endif > @lang('app.after_end_date')
                                        </label> <br />

                                        {{--<label>
                                            <input type="radio" name="end_method" value="both"  @if($campaign->end_method == 'both') checked="checked" @endif > @lang('app.both_need')
                                        </label>--}}

                                        {!! $errors->has('end_method')? '<p class="help-block">'.$errors->first('end_method').'</p>':'' !!}

                                        <p class="text-info"> @lang('app.end_method_info_text')</p>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('video')? 'has-error':'' }}">
                                    <label for="video" class="col-sm-4 control-label">@lang('app.video')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="video" value="{{$campaign->video}}" name="video" placeholder="@lang('app.video')">
                                        {!! $errors->has('video')? '<p class="help-block">'.$errors->first('video').'</p>':'' !!}
                                        <p class="text-info"> @lang('app.video_info_text')</p>
                                    </div>
                                </div>


                                {{-- <div class="form-group  {{ $errors->has('country_id')? 'has-error':'' }}">
                                    <label for="country_id" class="col-sm-4 control-label">@lang('app.country')<span class="field-required">*</span></label>
                                    <div class="col-sm-8">
                                        <select id="country_id" class="form-control select2" name="country_id">
                                            <option value="">@lang('app.select_a_country')</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" @if($campaign->country_id == $country->id) selected="selected" @endif >{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('address')? 'has-error':'' }}">
                                    <label for="address" class="col-sm-4 control-label">@lang('app.address')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" value="{{ $campaign->address}}" name="address" placeholder="@lang('app.address')">
                                        {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                                    </div>
                                </div> --}}

                                <div class="form-group {{ $errors->has('start_date')? 'has-error':'' }}">
                                    <label for="start_date" class="col-sm-4 control-label">@lang('app.start_date')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="start_date" value="{{ $campaign->start_date}}" name="start_date" placeholder="@lang('app.start_date')">
                                        {!! $errors->has('start_date')? '<p class="help-block">'.$errors->first('start_date').'</p>':'' !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('end_date')? 'has-error':'' }}">
                                    <label for="end_date" class="col-sm-4 control-label">@lang('app.end_date')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="end_date" value="{{ $campaign->end_date}}" name="end_date" placeholder="@lang('app.end_date')">
                                        {!! $errors->has('end_date')? '<p class="help-block">'.$errors->first('end_date').'</p>':'' !!}
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('feature_image')? 'has-error':'' }}">
                                    <label class="col-sm-4 control-label">@lang('app.feature_image')</label>
                                    <div class="col-sm-8">

                                        <label for="feature_image" class="img_upload"><i class="fa fa-cloud-upload"></i> </label>
                                        <input type="file" id="feature_image" name="feature_image" style="display: none;" />
                                        <div id="feature_image_preview">@if($campaign->feature_image) <img src="{{ $campaign->feature_img_url()}}" /> @endif</div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">@lang('app.edit_campaign')</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>


@endsection

@section('page-js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(function () {
            $('#start_date, #end_date').datetimepicker({format: 'YYYY-MM-DD'});
        });

        function generate_option_from_json(jsonData, fromLoad){
            if(fromLoad === 'state_to_city') {
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected>Select city</option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].city+'"> '+jsonData[i].city +' </option>';
                    }
                    $('#city').html(option);
                    $('#city').select2();
                }else {
                    $('#city').html('');
                    $('#city').select2();
                }
                $('#city_loader').hide('slow');
            }
        }
        
        $(document).ready(function() {
            $(document).ready(function() {
                CKEDITOR.replaceClass = 'description';
            });

            $('#feature_image').change(function(){
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#feature_image_preview').html('<img src="'+e.target.result+'" />');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
            
            $('[name="state"]').change(function(){
                const state = $(this).val();
                console.log(state);
                // $('#city_loader').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_city_by_state') }}',
                    data : { state,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'state_to_city');
                    }
                });
            });
        });

    </script>
@endsection