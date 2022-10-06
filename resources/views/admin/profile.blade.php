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

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="profile-avatar">
                                <img src="{{ $user->get_gravatar(100) }}" class="img-thumbnail img-circle" width="100" />
                            </div>

                            <table class="table table-bordered table-striped">

                                <tr>
                                    <th>@lang('app.name')</th>
                                    <td>{{ $user->full_name() }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('app.email')</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.phone')</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.address')</th>
                                    <td>{{ $user->get_address() }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.country')</th>
                                    <td>
                                        @if($user->country)
                                            {{ $user->country }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>
                                        @if($user->state)
                                            {{ $user->state }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>
                                        @if($user->city)
                                            {{ $user->city }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Zipcode</th>
                                    <td>
                                        @if($user->zip)
                                            {{ $user->zip }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('app.created_at')</th>
                                    <td>{{ $user->signed_up_datetime() }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('app.status')</th>
                                    <td>{{ $user->status_context() }}</td>
                                </tr>
{{--
                                <tr>
                                    <th>@lang('app.contributed')</th>
                                    <td>
                                        @php $total_contributed = $user->contributed_amount(); @endphp
                                        @if($total_contributed > 0)
                                            {!! get_amount($total_contributed) !!}
                                        @endif
                                    </td>
                                </tr>
--}}
                                <tr>
                                    <th>Employment status</th>
                                    <td>{{ $user->employment }}</td>
                                </tr>
                                <tr>
                                    <th>Marital status</th>
                                    <td>{{ $user->material_status }}</td>
                                </tr>
                                <tr>
                                    <th>Number of dependents</th>
                                    <td>{{ $user->dependents }}</td>
                                </tr>
                            </table>
                            
                            <h4>Investment</h4>
                            
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Overall investment objective</th>
                                    <td>{{ $user->goal }}</td>
                                </tr>
                                <tr>
                                    <th>How long do you plan to invest your money</th>
                                    <td>{{ $user->timeline }}</td>
                                </tr>
                                <tr>
                                    <th>Tolerance</th>
                                    <td>{{ $user->risk_tolerance }}</td>
                                </tr>
                                <tr>
                                    <th>Years invested</th>
                                    <td>{{ $user->years_experience }}</td>
                                </tr>
                                <tr>
                                    <th>Primary source of investment</th>
                                    <td>{{ $user->source }}</td>
                                </tr>
                                <tr>
                                    <th>How important is liquidity to you</th>
                                    <td>{{ $user->liquidity_importance }}</td>
                                </tr>
                            </table>
                            
                            <h4>Assets</h4>

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Approximate total net worth</th>
                                    <td>{{ $user->net_worth }}</td>
                                </tr>
                                <tr>
                                    <th>Approximate yearly income</th>
                                    <td>{{ $user->yearly_income }}</td>
                                </tr>
                                <tr>
                                    <th>Total value of your cash and liquid investments</th>
                                    <td>{{ $user->liquid_assets }}</td>
                                </tr>
                            </table>
                            
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>SSN</th>
                                    <td>{{ $user->ssn }}</td>
                                </tr>
                            </table>

                            @if( ! empty($is_user_id_view))
                                <a href="{{route('users_edit', $user->id)}}"><i class="fa fa-pencil-square-o"></i> @lang('app.edit') </a>
                            @else
                                <a href="{{ route('profile_edit') }}"><i class="fa fa-pencil-square-o"></i> @lang('app.edit') </a>
                            @endif

                        </div>
                    </div>


                </div>   <!-- /#page-wrapper -->




            </div>   <!-- /#wrapper -->


        </div> <!-- /#container -->
    </div> <!-- /#dashboard wrap -->
@endsection

@section('page-js')

@endsection