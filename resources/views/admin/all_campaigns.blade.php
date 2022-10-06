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

                       <div class="admin-campaign-lists">
                           <div class="row">
                               <div class="col-md-5">
                                   @lang('app.total') : {{$campaigns->count()}}
                               </div>

                               <div class="col-md-7">

                                   <form class="form-inline" method="get" action="{{route('campaign_admin_search')}}">
                                       <div class="form-group">
                                           <input type="text" name="q" value="{{request('q')}}" class="form-control" placeholder="@lang('app.campaign_title_keyword')">
                                       </div>
                                       <button type="submit" class="btn btn-default">@lang('app.search')</button>
                                   </form>

                               </div>
                           </div>
                       </div>

                    @if($campaigns->count() > 0)
                        <table class="table table-striped table-bordered">

                            <tr>
                                <th>@lang('app.image')</th>
                                <th>@lang('app.title')</th>
                                <th>@lang('app.campaign_info')</th>
                                <th>@lang('app.owner_info')</th>
                                <th>@lang('app.actions')</th>
                            </tr>

                            @foreach($campaigns as $campaign)

                                <tr>

                                    <td width="70"><img src="{{$campaign->feature_img_url()}}" class="img-responsive" /></td>
                                    <td>{{$campaign->title}}

                                        @if($campaign->is_funded == 1)
                                            <p class="bg-success">@lang('app.added_to_funded')</p>
                                        @endif
                                    </td>
                                    <td>
                                        @lang('app.goal') : {!! get_amount($campaign->goal) !!} <br />
                                        @lang('app.raised') :  {!! get_amount($campaign->total_raised()) !!} <br />
                                        @lang('app.raised_percent') : {{$campaign->percent_raised()}}%<br />
                                        @lang('app.days_left') : {{$campaign->days_left()}}<br />
                                        @lang('app.backers') : {{$campaign->total_payments}}<br />
                                    </td>

                                    <td>
                                        @if($campaign->user)
                                            <strong>{{ $campaign->user->full_name() }}</strong> <br />
                                        @endif
                                        @lang('app.address') : {{ $campaign->full_address() }}
                                    </td>

                                    <td>
                                        <a href="{{route('campaign_single', [$campaign->id, $campaign->slug])}}" class="btn btn-default btn-sm" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i> </a>

                                    @if($campaign->status == 0)
                                            <a href="{{route('campaign_status', [$campaign->id, 'approve'])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="@lang('app.approve')"><i class="fa fa-check-circle-o"></i> </a>
                                            <a href="{{route('campaign_status', [$campaign->id, 'block'])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="@lang('app.block')"><i class="fa fa-ban"></i> </a>


                                        @elseif($campaign->status == 1)

                                            <a href="{{route('campaign_status', [$campaign->id, 'block'])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="@lang('app.block')"><i class="fa fa-ban"></i> </a>

                                        @elseif($campaign->status == 2)
                                            <a href="{{route('campaign_status', [$campaign->id, 'approve'])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="@lang('app.approve')"><i class="fa fa-check-circle-o"></i> </a>
                                        @endif

                                        @if($campaign->is_public == 0)
                                             <a href="{{route('campaign_status', [$campaign->id, 'public'])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="@lang('app.public')"><i class="fa fa-ban"></i> @lang('app.public')</a>
                                        @elseif($campaign->is_public == 1)
                                             <a href="{{route('campaign_status', [$campaign->id, 'private'])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="@lang('app.private')"><i class="fa fa-ban"></i> @lang('app.private')</a>
                                        @endif

                                        @if(request()->segment(3) == 'expired_campaigns')
                                            @if($campaign->is_funded != 1)
                                                <a href="{{route('campaign_status', [$campaign->id, 'funded'])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="@lang('app.mark_as_funded')"><i class="fa fa-check-circle-o"></i>  @lang('app.mark_as_funded')</a>
                                            @endif
                                        @endif

                                        @if($campaign->is_staff_picks != 1)
                                            <a href="{{route('campaign_status', [$campaign->id, 'add_staff_picks'])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="@lang('app.add_staff_picks')"><i class="fa fa-plus-square-o"></i>  @lang('app.add_staff_picks')</a>

                                        @else
                                            <a href="{{route('campaign_status', [$campaign->id, 'remove_staff_picks'])}}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="@lang('app.remove_staff_picks')"><i class="fa fa-minus-square-o"></i>  @lang('app.remove_staff_picks')</a>
                                        @endif


                                        <a href="{{route('campaign_delete', $campaign->id)}}" class="btn btn-delete btn-danger btn-sm" data-toggle="tooltip" title="@lang('app.delete')"><i class="fa fa-trash-o"></i> </a>


                                    </td>

                                </tr>

                            @endforeach

                        </table>

                        {!! $campaigns->links() !!}
                    @else
                        @lang('app.no_campaigns_to_display')
                    @endif

                </div>

            </div>
        </div>
    </div>


@endsection

@section('page-js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-delete').click(function(e){
                if (! confirm("@lang('app.are_you_sure_undone')") ){
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection