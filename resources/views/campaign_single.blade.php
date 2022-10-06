@extends('layouts.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('meta-data')
    <meta name="description" content="{{$campaign->short_description ? $campaign->short_description : $campaign->description}}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="{{$campaign->short_description ? $campaign->short_description : $campaign->description}}">
    {{--<meta name="twitter:site" content="@publisher_handle">--}}
    <meta name="twitter:title" content="@if( ! empty($title)) {{ $title }} @endif">
    <meta name="twitter:description" content="{{$campaign->short_description ? $campaign->short_description : $campaign->description}}">
    {{--<meta name="twitter:creator" content="@author_handle" />--}}
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="{{$campaign->feature_img_url(true)}}">

    <!-- Open Graph data -->
    <meta property="og:title" content="@if( ! empty($title)) {{ $title }} @endif" />
    <meta property="og:url" content="{{route('campaign_single', [$campaign->id, $campaign->slug])}}" />
    <meta property="og:image" content="{{$campaign->feature_img_url(true)}}" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{$campaign->short_description ? $campaign->short_description : $campaign->description}}" />

@endsection

@section('content')

    <section class="campaign-details-wrap">

        @include('single_campaign_header')

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('admin.flash_msg')

                    <div class="campaign-decription">


                        <div class="single-campaign-embeded">


                            @if( ! empty($campaign->video))
                                <?php
                                $video_url = $campaign->video;
                                if (strpos($video_url, 'youtube') > 0) {
                                    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_url, $matches);
                                    if ( ! empty($matches[1])){
                                        echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowfullscreen></iframe></div>';
                                    }

                                } elseif (strpos($video_url, 'vimeo') > 0) {
                                    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video_url, $regs)) {
                                        if (!empty($regs[3])){
                                            echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$regs[3].'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
                                        }
                                    }
                                }
                                ?>

                            @else

                                <div class="campaign-feature-img">
                                    <img src="{{$campaign->feature_img_url(true)}}" class="img-responsive" />
                                </div>

                            @endif

                        </div>

                    </div>

                    <div class="single-at-a-glance">

                        <ul class="list-group ">
                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-building"></i> {{ ucfirst($campaign->type) }} </li>
                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-arrows-alt "></i> {{ $campaign->square_unit_space.' '.$campaign->unit_type }} </li>

                            @if($campaign->beds)
                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-bed"></i> {{ $campaign->beds.' '.trans('app.bedrooms') }} </li>
                            @endif

                            @if($campaign->attached_bath)
                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-bath"></i> {{ $campaign->attached_bath.' '.trans('app.attached_bath') }} </li>
                            @endif

                            @if($campaign->common_bath)
                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-shower"></i> {{ $campaign->common_bath.' '.trans('app.common_bath') }} </li>
                            @endif

                            @if($campaign->floor)
                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-building-o"></i> {{ $campaign->floor.' '.trans('app.floor') }} </li>
                            @endif

                            <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-briefcase"></i> {{ ucfirst($campaign->purpose) }} </li>

                            @if($campaign->balcony)
                                <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-window-maximize"></i> {{ $campaign->balcony.' '.trans('app.belcony') }} </li>
                            @endif
                            @if($campaign->dining_space)
                                <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-cutlery"></i> {{ trans('app.dining_space') }} </li>
                            @endif
                            @if($campaign->living_room)
                                <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-folder-o"></i> {{ trans('app.living_room') }} </li>
                            @endif

                            {{-- @if($campaign->price > 0)
                                <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-money"></i> {{ get_option('currency_sign').' '.number_format($campaign->price_per_unit, 2) .' '.trans('app.per').' '.$campaign->unit_type }} </li>
                            @endif --}}

                            {{-- <li class="list-group-item col-sm-4 col-xs-6"><i class="fa fa-money"></i>
                                {{ themeqx_price_ng($campaign) }} @if($campaign->purpose == 'rent') @lang('app.per_month') @endif
                            </li> --}}

                        </ul>
                        <div class="clearfix"></div>

                    </div>

                    <h4 class="ads-detail-title">@lang('app.description')</h4>
                    <p> {!! nl2br($campaign->description) !!} </p>

                    @if($enable_discuss)
                        <div class="hidden-xs hidden-sm">
                            <div class="comments-title"><h2> <i class="fa fa-comment"></i> @lang('app.comments')</h2></div>
                            <div id="disqus_thread"></div>
                            <script>
                                var disqus_config = function () {
                                    this.page.url = '{{route('campaign_single', [$campaign->id, $campaign->slug])}}';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '{{route('campaign_single', [$campaign->id, $campaign->slug])}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = '//{{get_option('disqus_shortname')}}.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    @endif
                </div>

                <div class="col-md-4">
                    @include('campaign_single_sidebar')
                </div>

            </div>
        </div>

    </section>

@endsection

@section('page-js')
    @if($enable_discuss)
        <script id="dsq-count-scr" src="//{{get_option('disqus_shortname')}}.disqus.com/count.js" async></script>
    @endif

    <script src="{{asset('assets/plugins/SocialShare/SocialShare.min.js')}}"></script>
    <script>
        $('.share').ShareLink({
            title: '{{$campaign->title}}', // title for share message
            text: '{{$campaign->short_description ? $campaign->short_description : $campaign->description}}', // text for share message
            width: 640, // optional popup initial width
            height: 480 // optional popup initial height
        })
    </script>

    <script>
        $(function(){
            $(document).on('click', '.donate-amount-placeholder ul li', function(e){
                $(this).closest('form').find($('[name="amount"]')).val($(this).data('value'));
            });

            $('#campaign_url_copy_btn').click(function(){
                copyToClipboard('#campaign_url_input');
            });

        });



        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            toastr.success('@lang('app.campaign_url_copied')', '@lang('app.success')', toastr_options);
            $temp.remove();
        }

    </script>

@endsection