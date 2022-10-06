@extends('layouts.app')

@section('content')
    <section class="auth-form">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">@lang('app.register')</div>
                        <div class="panel-body">

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif

                            <form class="ma-4" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name" class="control-label">First Name</label>

                                    <div class="">
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name" class="control-label">Last Name</label>

                                    <div class="">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">@lang('app.email_address')</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="control-label">@lang('app.phone')</label>

                                    <div class="">
                                        <input id="phone" type="phone" class="form-control formatted-phone" name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country" class="control-label">Country</label>

                                    <div>
                                        <select id="country" name="country" class="form-control select2" required>
                                            {{-- @foreach(DB::table('countries')->get() as $country) --}}
                                                <option value="United States" selected>United States</option>
                                            {{-- @endforeach --}}
                                        </select>

                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state" class="control-label">State</label>

                                    <div>
                                        <select id="state" name="state" class="form-control select2" required>
                                            @foreach($states as $state)
                                                <option value="{{ $state }}">{{ $state }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city" class="control-label">City</label>

                                    <div>
                                        <select id="city" name="city" class="form-control select2" required>
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                                    <label for="zip" class="control-label">Zip</label>

                                    <div>
                                        <select id="zip" name="zip" class="form-control select2" required>
                                            @foreach($zips as $zip)
                                                <option value="{{ $zip->zip }}">{{ $zip->zip }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('zip'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zip') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">@lang('app.password')</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="control-label">@lang('app.confirm_password')</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div style="font-size: 20px; margin-bottom: 10px;">Personal Details</div>

                                <div class="form-group{{ $errors->has('employment') ? ' has-error' : '' }}">
                                    <label for="employment" class="control-label">Are you employed? (We're required by law to collect this information)</label>

                                    <div>
                                        <select id="employment" name="employment" class="form-control select2" required>
                                            <option value="Employed">Employed</option>
                                            <option value="Unemployed">Unemployed</option>
                                            <option value="Retired">Retired</option>
                                            <option value="Student">Student</option>
                                        </select>

                                        @if ($errors->has('employment'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('employment') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('material_status') ? ' has-error' : '' }}">
                                    <label for="material_status" class="control-label">Marital Status</label>

                                    <div class="">
                                        <select id="material_status" name="material_status" class="form-control select2" required>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>

                                        @if ($errors->has('material_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('material_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dependents') ? ' has-error' : '' }}">
                                    <label for="dependents" class="control-label">Number of Dependents</label>

                                    <div class="">
                                        <input id="dependents" type="number" class="form-control" name="dependents" value="{{ old('dependents') }}" required>

                                        @if ($errors->has('dependents'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dependents') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div style="font-size: 20px; margin-bottom: 10px;">Investment</div>

                                <div class="form-group{{ $errors->has('goal') ? ' has-error' : '' }}">
                                    <label for="goal" class="control-label">What is your overall investment objective?</label>

                                    <div class="">
                                        <select id="goal" name="goal" class="form-control select2" required>
                                            <option value="Preserve My Savings">Preserve My Savings</option>
                                            <option value="A source of income">A source of income</option>
                                            <option value="Growth">Growth</option>
                                            <option value="Minimize tax burden">Minimize tax burden</option>
                                            <option value="Retirement planning">Retirement planning</option>
                                        </select>

                                        @if ($errors->has('goal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('goal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('timeline') ? ' has-error' : '' }}">
                                    <label for="timeline" class="control-label">How long do you plan to invest your money?</label>

                                    <div class="">
                                        <select id="timeline" name="timeline" class="form-control select2" required>
                                            <option value="Less then 4 years">Less then 4 years</option>
                                            <option value="4 to 7 years">4 to 7 years</option>
                                            <option value="7 or more years">7 or more years</option>
                                        </select>

                                        @if ($errors->has('timeline'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('timeline') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                                    <label for="experience" class="control-label">How much experience do you have with investing?</label>

                                    <div class="">
                                        <select id="experience" name="experience" class="form-control select2" required>
                                            <option value="None">None</option>
                                            <option value="Not much">Not much</option>
                                            <option value="I know what I'm doing">I know what I'm doing</option>
                                            <option value="I'm an expert">I'm an expert</option>
                                        </select>

                                        @if ($errors->has('experience'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('experience') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('risk_tolerance') ? ' has-error' : '' }}">
                                    <label for="risk_tolerance" class="control-label">If your entire investment portfolio lost 10% of it value in 1 year during a market decline, what would you do?</label>

                                    <div class="">
                                        <select id="risk_tolerance" name="risk_tolerance" class="form-control select2" required>
                                            <option value="Sell all of your investments">Sell all of your investments</option>
                                            <option value="Sell some">Sell some</option>
                                            <option value="Keep all/Buy more">Keep all/Buy more</option>
                                        </select>

                                        @if ($errors->has('risk_tolerance'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('risk_tolerance') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('years_experience') ? ' has-error' : '' }}">
                                    <label for="years_experience" class="control-label">How many years have you invested?</label>

                                    <div class="">
                                        <select id="years_experience" name="years_experience" class="form-control select2" required>
                                            <option value="Less than 1 year">Less than 1 year</option>
                                            <option value="1-2 years">1-2 years</option>
                                            <option value="3 years or more">3 years or more</option>
                                        </select>

                                        @if ($errors->has('years_experience'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('years_experience') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">
                                    <label for="source" class="control-label">What is your primary source of investment?</label>

                                    <div class="">
                                        <select id="source" name="source" class="form-control select2" required>
                                            <option value="Savings or personal income">Savings or personal income</option>
                                            <option value="Pension or retirement">Pension or retirement</option>
                                            <option value="Insurance payout">Insurance payout</option>
                                            <option value="Inheritance">Inheritance</option>
                                            <option value="Gift">Gift</option>
                                            <option value="Sale of business or property">Sale of business or property</option>
                                            <option value="Other">Other</option>
                                        </select>

                                        @if ($errors->has('source'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('source') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('liquidity_importance') ? ' has-error' : '' }}">
                                    <label for="liquidity_importance" class="control-label">How important is liquidity to you?</label>

                                    <div class="">
                                        <select id="liquidity_importance" name="liquidity_importance" class="form-control select2" required>
                                            <option value="Not important">Not important</option>
                                            <option value="Somewhat important">Somewhat important</option>
                                            <option value="Very important">Very important</option>
                                        </select>

                                        @if ($errors->has('liquidity_importance'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('liquidity_importance') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div style="font-size: 20px; margin-bottom: 10px;">Assets</div>

                                <div class="form-group{{ $errors->has('net_worth') ? ' has-error' : '' }}">
                                    <label for="net_worth" class="control-label">What is your approximate total net worth?</label>

                                    <div class="">
                                        <select id="net_worth" name="net_worth" class="form-control select2" required>
                                            <option value="Under $25000">Under $25000</option>
                                            <option value="$25000-$50000">$25000-$50000</option>
                                            <option value="$50000-$65000">$50000-$65000</option>
                                            <option value="$65000-$100000">$65000-$100000</option>
                                            <option value="$100000-$150000">$100000-$150000</option>
                                            <option value="$150000-$200000">$150000-$200000</option>
                                            <option value="$200000-$250000">$200000-$250000</option>
                                            <option value="$250000-$500000">$250000-$500000</option>
                                            <option value="$500000-$1000000">$500000-$1000000</option>
                                            <option value="$1000000-$5000000">$1000000-$5000000</option>
                                            <option value="over $5000000">over $5000000</option>
                                        </select>

                                        @if ($errors->has('net_worth'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('net_worth') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('yearly_income') ? ' has-error' : '' }}">
                                    <label for="yearly_income" class="control-label">What is your approximate yearly income?</label>

                                    <div class="">
                                        <select id="yearly_income" name="yearly_income" class="form-control select2" required>
                                            <option value="Under $25000">Under $25000</option>
                                            <option value="$25000-$40000">$25000-$40000</option>
                                            <option value="$40000-$50000">$40000-$50000</option>
                                            <option value="$50000-$750000">$50000-$750000</option>
                                            <option value="$750000-$100000">$750000-$100000</option>
                                            <option value="$100000-$200000">$100000-$200000</option>
                                            <option value="$200000-$300000">$200000-$300000</option>
                                            <option value="$300000-$500000">$300000-$500000</option>
                                            <option value="$500000-$1200000">$500000-$1200000</option>
                                            <option value="over $1200000">over $1200000</option>
                                        </select>

                                        @if ($errors->has('yearly_income'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('yearly_income') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('liquid_assets') ? ' has-error' : '' }}">
                                    <label for="liquid_assets" class="control-label">What is the total value of your cash and liquid investments?</label>

                                    <div class="">
                                        <select id="liquid_assets" name="liquid_assets" class="form-control select2" required>
                                            <option value="Under $25000">Under $25000</option>
                                            <option value="$25000-$50000">$25000-$50000</option>
                                            <option value="$50000-$65000">$50000-$65000</option>
                                            <option value="$65000-$100000">$65000-$100000</option>
                                            <option value="$100000-$150000">$100000-$150000</option>
                                            <option value="$150000-$200000">$150000-$200000</option>
                                            <option value="$200000-$250000">$200000-$250000</option>
                                            <option value="$250000-$500000">$250000-$500000</option>
                                            <option value="$500000-$1000000">$500000-$1000000</option>
                                            <option value="$1000000-$5000000">$1000000-$5000000</option>
                                            <option value="over $5000000">over $5000000</option>
                                        </select>

                                        @if ($errors->has('liquid_assets'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('liquid_assets') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('ssn') ? ' has-error' : '' }}">
                                    <label for="ssn" class="control-label">You must provide a SSN for tax purposes.</label>

                                    <div class="">
                                        <input id="ssn" type="text" class="form-control" name="ssn" value="{{ old('ssn') }}" required>

                                        @if ($errors->has('ssn'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ssn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if(get_option('enable_recaptcha_registration') == 1)
                                    <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="g-recaptcha" data-sitekey="{{get_option('recaptcha_site_key')}}"></div>
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            @lang('app.register')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@if(get_option('enable_recaptcha_registration') == 1)
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endif

@section('page-js')
    <script>
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if (fromLoad === 'category_to_brand'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> <?php echo trans('app.select_a_brand') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].brand_name +' </option>';
                    }
                    $('#brand_select').html(option);
                    $('#brand_select').select2();
                }else {
                    $('#brand_select').html('');
                    $('#brand_select').select2();
                }
                $('#brand_loader').hide('slow');
            }else if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('');
                    $('#state_select').select2();
                }
                $('#state_loader').hide('slow');

            } else if(fromLoad === 'state_to_city') {
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
            } else if(fromLoad === 'city_to_zips') {
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected>Select Zipcode</option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].zip+'"> '+jsonData[i].zip +' </option>';
                    }
                    $('#zip').html(option);
                    $('#zip').select2();
                }else {
                    $('#zip').html('');
                    $('#zip').select2();
                }
                $('#zipcode_loader').hide('slow');
            }
        }
        
        $(document).ready(function(){
            $('[name="state"]').change(function(){
                const state = $(this).val();
                
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
            
            $('[name="city"]').change(function(){
                const city = $(this).val();
                
                // $('#city_loader').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_zips_by_city') }}',
                    data : { city,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'city_to_zips');
                    }
                });
            });
        })
    </script>
@endsection