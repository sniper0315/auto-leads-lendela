@extends('layouts.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

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

                    <form action="" class="" method="post" enctype="multipart/form-data" > 
                        @csrf
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label for="first_name" class="control-label">First Name</label>

                            <div class="">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') ? old('first_name') : $user->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name" class="control-label">Last Name</label>

                            <div class="">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') ? old('last_name') : $user->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        {{-- <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="name" class="control-label">@lang('app.name')</label>
                            <div class="">
                                <input type="text" class="form-control" id="name" value="{{ old('name')? old('name') : $user->name }}" name="name" placeholder="@lang('app.name')">
                                {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                            </div>
                        </div> --}}
    
                        <div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
                            <label for="email" class="control-label">@lang('app.email')</label>
                            <div class="">
                                <input type="email" class="form-control" id="email" value="{{ old('email')? old('email') : $user->email }}" name="email" placeholder="@lang('app.email')">
                                {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                            </div>
                        </div>
    
                        <div class="form-group {{ $errors->has('phone')? 'has-error':'' }}">
                            <label for="phone" class="control-label">@lang('app.phone')</label>
                            <div class="">
                                <input type="text" class="form-control formatted-phone" id="phone" value="{{ old('phone')? old('phone') : $user->phone }}" name="phone" placeholder="@lang('app.phone')">
                                {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                            </div>
                        </div>
    
                        <div class="form-group {{ $errors->has('country')? 'has-error':'' }}">
                            <label for="country" class="control-label">@lang('app.country')</label>
                            <div class="">
                                <select id="country" name="country" class="form-control select2">
                                    <option value="">@lang('app.select_a_country')</option>
                                    <option value="United States" selected>United States</option>
                                </select>
                                {!! $errors->has('country')? '<p class="help-block">'.$errors->first('country').'</p>':'' !!}
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="control-label">State</label>

                            <div>
                                <select id="state" name="state" class="form-control select2" required>
                                    @foreach($states as $state)
                                        <option value="{{ $state->state }}" @if($user->state == $state->state) selected @endif>{{ $state->state }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label for="city" class="control-label">City</label>

                            <div>
                                <select id="city" name="city" class="form-control select2" required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->city }}" @if($user->city == $city->city) selected @endif>{{ $city->city }}</option>
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
                                        <option value="{{ $zip->zip }}" @if ($user->zip == $zip->zip) selected @endif>{{ $zip->zip }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
    
                        <div class="form-group {{ $errors->has('address')? 'has-error':'' }}">
                            <label for="address" class="control-label">@lang('app.address')</label>
                            <div class="">
                                <input type="text" class="form-control" id="address" value="{{ old('address')? old('address') : $user->address }}" name="address" placeholder="@lang('app.address')">
                                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                            </div>
                        </div>
                        
                        <div style="font-size: 20px; margin-bottom: 10px;">Personal Details</div>
                        
                        <div class="form-group{{ $errors->has('employment') ? ' has-error' : '' }}">
                            <label for="employment" class="control-label">Are you employed? (We're required by law to collect this information)</label>

                            <div>
                                <select id="employment" name="employment" class="form-control select2" required>
                                    <option value="Employed" @if(old('employment') == 'Employed' || $user->employment == 'Employed') selected @endif>Employed</option>
                                    <option value="Unemployed" @if(old('employment') == 'Unemployed' || $user->employment == 'Unemployed') selected @endif>Unemployed</option>
                                    <option value="Retired" @if(old('employment') == 'Retired' || $user->employment == 'Retired') selected @endif>Retired</option>
                                    <option value="Student" @if(old('employment') == 'Student' || $user->employment == 'Student') selected @endif>Student</option>
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
                                    <option value="Single" @if(old('material_status') == 'Single' || $user->material_status == 'Single') selected @endif>Single</option>
                                    <option value="Married" @if(old('material_status') == 'Married' || $user->material_status == 'Married') selected @endif>Married</option>
                                    <option value="Divorced" @if(old('material_status') == 'Divorced' || $user->material_status == 'Divorced') selected @endif>Divorced</option>
                                    <option value="Widowed" @if(old('material_status') == 'Widowed' || $user->material_status == 'Widowed') selected @endif>Widowed</option>
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
                                <input id="dependents" type="number" class="form-control" name="dependents" value="{{ old('dependents') ? old('dependents') : $user->dependents }}" required>

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
                                    <option value="Preserve My Savings" @if(old('goal') == 'Preserve My Savings' || $user->goal == 'Preserve My Savings') selected @endif>Preserve My Savings</option>
                                    <option value="A source of income" @if(old('goal') == 'A source of income' || $user->goal == 'A source of income') selected @endif>A source of income</option>
                                    <option value="Growth" @if(old('goal') == 'Growth' || $user->goal == 'Growth') selected @endif>Growth</option>
                                    <option value="Minimize tax burden" @if(old('goal') == 'Minimize tax burden' || $user->goal == 'Minimize tax burden') selected @endif>Minimize tax burden</option>
                                    <option value="Retirement planning" @if(old('goal') == 'Retirement planning' || $user->goal == 'Retirement planning') selected @endif>Retirement planning</option>
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
                                    <option value="Less then 4 years" @if(old('timeline') == 'Less then 4 years' || $user->timeline == 'Less then 4 years') selected @endif>Less then 4 years</option>
                                    <option value="4 to 7 years" @if(old('timeline') == '4 to 7 years' || $user->timeline == '4 to 7 years') selected @endif>4 to 7 years</option>
                                    <option value="7 or more years" @if(old('timeline') == '7 or more years' || $user->timeline == '7 or more years') selected @endif>7 or more years</option>
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
                                    <option value="None" @if(old('experience') == 'None' || $user->experience == 'None') selected @endif>None</option>
                                    <option value="Not much" @if(old('experience') == 'Not much' || $user->experience == 'Not much') selected @endif>Not much</option>
                                    <option value="I know what I'm doing" @if(old('experience') == "I know what I'm doing" || $user->experience == "I know what I'm doing") selected @endif>I know what I'm doing</option>
                                    <option value="I'm an expert" @if(old('experience') == "I'm an expert" || $user->experience == "I'm an expert") selected @endif>I'm an expert</option>
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
                                    <option value="Sell all of your investments" @if(old('risk_tolerance') == 'Sell all of your investments' || $user->risk_tolerance == 'Sell all of your investments') selected @endif>Sell all of your investments</option>
                                    <option value="Sell some" @if(old('risk_tolerance') == 'Sell some' || $user->risk_tolerance == 'Sell some') selected @endif>Sell some</option>
                                    <option value="Keep all/Buy more" @if(old('risk_tolerance') == 'Keep all/Buy more' || $user->risk_tolerance == 'Keep all/Buy more') selected @endif>Keep all/Buy more</option>
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
                                    <option value="Less than 1 year" @if(old('years_experience') == 'Less than 1 year' || $user->years_experience == 'Less than 1 year') selected @endif>Less than 1 year</option>
                                    <option value="1-2 years" @if(old('years_experience') == '1-2 years' || $user->years_experience == '1-2 years') selected @endif>1-2 years</option>
                                    <option value="3 years or more" @if(old('years_experience') == '3 years or more' || $user->years_experience == '3 years or more') selected @endif>3 years or more</option>
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
                                    <option value="Savings or personal income" @if(old('source') == 'Savings or personal income' || $user->source == 'Savings or personal income') selected @endif>Savings or personal income</option>
                                    <option value="Pension or retirement" @if(old('source') == 'Pension or retirement' || $user->source == 'Pension or retirement') selected @endif>Pension or retirement</option>
                                    <option value="Insurance payout" @if(old('source') == 'Insurance payout' || $user->source == 'Insurance payout') selected @endif>Insurance payout</option>
                                    <option value="Inheritance" @if(old('source') == 'Inheritance' || $user->source == 'Inheritance') selected @endif>Inheritance</option>
                                    <option value="Gift" @if(old('source') == 'Gift' || $user->source == 'Gift') selected @endif>Gift</option>
                                    <option value="Sale of business or property" @if(old('source') == 'Sale of business or property' || $user->source == 'Sale of business or property') selected @endif>Sale of business or property</option>
                                    <option value="Other" @if(old('source') == 'Other' || $user->source == 'Other') selected @endif>Other</option>
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
                                    <option value="Not important" @if(old('liquidity_importance') == 'Not important' || $user->liquidity_importance == 'Not important') selected @endif>Not important</option>
                                    <option value="Somewhat important" @if(old('liquidity_importance') == 'Somewhat important' || $user->liquidity_importance == 'Somewhat important') selected @endif>Somewhat important</option>
                                    <option value="Very important" @if(old('liquidity_importance') == 'Very important' || $user->liquidity_importance == 'Very important') selected @endif>Very important</option>
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
                                    <option value="Under $25000" @if(old('net_worth') == 'Under $25000' || $user->net_worth == 'Under $25000') selected @endif>Under $25000</option>
                                    <option value="$25000-$50000" @if(old('net_worth') == '$25000-$50000' || $user->net_worth == '$25000-$50000') selected @endif>$25000-$50000</option>
                                    <option value="$50000-$65000" @if(old('net_worth') == '$50000-$65000' || $user->net_worth == '$50000-$65000') selected @endif>$50000-$65000</option>
                                    <option value="$65000-$100000" @if(old('net_worth') == '$65000-$100000' || $user->net_worth == '$65000-$100000') selected @endif>$65000-$100000</option>
                                    <option value="$100000-$150000" @if(old('net_worth') == '$100000-$150000' || $user->net_worth == '$100000-$150000') selected @endif>$100000-$150000</option>
                                    <option value="$150000-$200000" @if(old('net_worth') == '$150000-$200000' || $user->net_worth == '$150000-$200000') selected @endif>$150000-$200000</option>
                                    <option value="$200000-$250000" @if(old('net_worth') == '$200000-$250000' || $user->net_worth == '$200000-$250000') selected @endif>$200000-$250000</option>
                                    <option value="$250000-$500000" @if(old('net_worth') == '$250000-$500000' || $user->net_worth == '$250000-$500000') selected @endif>$250000-$500000</option>
                                    <option value="$500000-$1000000" @if(old('net_worth') == '$500000-$1000000' || $user->net_worth == '$500000-$1000000') selected @endif>$500000-$1000000</option>
                                    <option value="$1000000-$5000000" @if(old('net_worth') == '$1000000-$5000000' || $user->net_worth == '$1000000-$5000000') selected @endif>$1000000-$5000000</option>
                                    <option value="over $5000000" @if(old('net_worth') == 'over $5000000' || $user->net_worth == 'over $5000000') selected @endif>over $5000000</option>
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
                                    <option value="Under $25000" @if(old('yearly_income') == 'Under $25000' || $user->yearly_income == 'Under $25000') selected @endif>Under $25000</option>
                                    <option value="$25000-$40000" @if(old('yearly_income') == '$25000-$40000' || $user->yearly_income == '$25000-$40000') selected @endif>$25000-$40000</option>
                                    <option value="$40000-$50000" @if(old('yearly_income') == '$40000-$50000' || $user->yearly_income == '$40000-$50000') selected @endif>$40000-$50000</option>
                                    <option value="$50000-$750000" @if(old('yearly_income') == '$50000-$750000' || $user->yearly_income == '$50000-$750000') selected @endif>$50000-$750000</option>
                                    <option value="$750000-$100000" @if(old('yearly_income') == '$750000-$100000' || $user->yearly_income == '$750000-$100000') selected @endif>$750000-$100000</option>
                                    <option value="$100000-$200000" @if(old('yearly_income') == '$100000-$200000' || $user->yearly_income == '$100000-$200000') selected @endif>$100000-$200000</option>
                                    <option value="$200000-$300000" @if(old('yearly_income') == '$200000-$300000' || $user->yearly_income == '$200000-$300000') selected @endif>$200000-$300000</option>
                                    <option value="$300000-$500000" @if(old('yearly_income') == '$300000-$500000' || $user->yearly_income == '$300000-$500000') selected @endif>$300000-$500000</option>
                                    <option value="$500000-$1200000" @if(old('yearly_income') == '$500000-$1200000' || $user->yearly_income == '$500000-$1200000') selected @endif>$500000-$1200000</option>
                                    <option value="over $1200000" @if(old('yearly_income') == 'over $1200000' || $user->yearly_income == 'over $1200000') selected @endif>over $1200000</option>
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
                                    <option value="Under $25000" @if(old('liquid_assets') == 'Under $25000' || $user->liquid_assets == 'Under $25000') selected @endif>Under $25000</option>
                                    <option value="$25000-$50000" @if(old('liquid_assets') == '$25000-$50000' || $user->liquid_assets == '$25000-$50000') selected @endif>$25000-$50000</option>
                                    <option value="$50000-$65000" @if(old('liquid_assets') == '$50000-$65000' || $user->liquid_assets == '$50000-$65000') selected @endif>$50000-$65000</option>
                                    <option value="$65000-$100000" @if(old('liquid_assets') == '$65000-$100000' || $user->liquid_assets == '$65000-$100000') selected @endif>$65000-$100000</option>
                                    <option value="$100000-$150000" @if(old('liquid_assets') == '$100000-$150000' || $user->liquid_assets == '$100000-$150000') selected @endif>$100000-$150000</option>
                                    <option value="$150000-$200000" @if(old('liquid_assets') == '$150000-$200000' || $user->liquid_assets == '$150000-$200000') selected @endif>$150000-$200000</option>
                                    <option value="$200000-$250000" @if(old('liquid_assets') == '$200000-$250000' || $user->liquid_assets == '$200000-$250000') selected @endif>$200000-$250000</option>
                                    <option value="$250000-$500000" @if(old('liquid_assets') == '$250000-$500000' || $user->liquid_assets == '$250000-$500000') selected @endif>$250000-$500000</option>
                                    <option value="$500000-$1000000" @if(old('liquid_assets') == '$500000-$1000000' || $user->liquid_assets == '$500000-$1000000') selected @endif>$500000-$1000000</option>
                                    <option value="$1000000-$5000000" @if(old('liquid_assets') == '$1000000-$5000000' || $user->liquid_assets == '$1000000-$5000000') selected @endif>$1000000-$5000000</option>
                                    <option value="over $5000000" @if(old('liquid_assets') == 'over $5000000' || $user->liquid_assets == 'over $5000000') selected @endif>over $5000000</option>
                                </select>

                                @if ($errors->has('liquid_assets'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('liquid_assets') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('ssn') ? ' has-error' : '' }}">
                            <label for="ssn" class="control-label">SSN</label>

                            <div class="">
                                <input id="ssn" type="text" class="form-control" name="ssn" value="{{ old('ssn') ? old('ssn') : $user->ssn }}" required>

                                @if ($errors->has('ssn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ssn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('photo')? 'has-error':'' }}">
                            <label class="control-label">@lang('app.change_avatar')</label>
                            <div class="">
                                <input type="file" id="photo" name="photo" class="filestyle" >
                                {!! $errors->has('photo')? '<p class="help-block">'.$errors->first('photo').'</p>':'' !!}
                            </div>
                        </div>
    
                        <hr />
    
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>

                </div>   <!-- /#page-wrapper -->

            </div>   <!-- /#wrapper -->


        </div> <!-- /#container -->
    </div> <!-- /#dashboard wrap -->
@endsection

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
                    $('#state').html(option);
                    $('#state').select2();
                }else {
                    $('#state').html('');
                    $('#state').select2();
                }
                $('#state_loader').hide('slow');

            }else if(fromLoad === 'state_to_city'){
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
                    option += '<option value="" selected>Select city</option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].zip+'"> '+jsonData[i].zip +' </option>';
                    }
                    $('#zip').html(option);
                    $('#zip').select2();
                }else {
                    $('#zip').html('');
                    $('#zip').select2();
                }
                $('#zip_loader').hide('slow');
            }
        }
        
        $(document).ready(function() {
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