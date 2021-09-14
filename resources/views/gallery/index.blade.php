@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('plugins/lightbox/photoswipe.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/lightbox/default-skin/default-skin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/lightbox/custom-photswipe.css')}}" rel="stylesheet" type="text/css" />
    <style>

    </style>
@endsection

@section('js')
    <script src="{{asset('plugins/lightbox/photoswipe.min.js')}}"></script>
    <script src="{{asset('plugins/lightbox/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('plugins/lightbox/custom-photswipe.js')}}"></script>
    <script>
        $("#delete_img").click(function(){
            src=$(".pswp__img").attr('src');
            count=$(".pswp__counter").text();
            var arr = count.split('/');
            alert($(".img-"+arr[0]).data('id'));
            gal_id=$(".img-"+arr[0]).data('id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var base_url = '{{ route("gallery.destroy", ":id") }}';
            base_url = base_url.replace(':id', gal_id);
            $.ajax({
                    /* the route pointing to the post function */
                    url: base_url,
                    type: 'DELETE',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:gal_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        if(data.status==1)
                        {
                            location.replace("{{ route('gallery.index') }}");
                        }
                        // $(".writeinfo").append(data.msg);
                    }
                });
        });
        $(".gallery-item").each(function( index, element){
            console.log( $(this).find('a').data('lbwps-description'));
        });
    </script>
@endsection

@section('content')
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="widget-content widget-content-area br-6">

                            <a class="btn btn-xs btn-info float-right" href="{{ route('gallery.create') }}" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                            </a>
                            <br>
                            <br>
                            <div class="widget-content widget-content-area">
                                <div class="col-12">
                                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                                        @foreach ($galleries as $galler)
                                            <a class="img-{{ $loop->index+1 }}" href="{{asset($galler->image)}}" data-id="{{ $galler->id }}" data-size="1600x1068" data-med="{{asset('images/gallery/demo.jpeg')}}" data-med-size="1024x683" data-author="Samuel Rohl">
                                                <img src="{{asset($galler->image)}}" alt="image-gallery">
                                                <figure>{{ $galler->title }}</figure>
                                            </a>
                                        @endforeach



                                        {{--
                                        <a class="img-2" href="{{asset('images/gallery/demo.jpeg')}}" data-id="2" data-size="1600x1068" data-med="{{asset('images/gallery/demo.jpeg')}}" data-med-size="1024x683" data-author="Samuel Rohl">
                                            <img src="{{asset('images/gallery/demo.jpeg')}}" alt="image-gallery">
                                            <figure>This is dummy caption. It has been placed here solely to demonstrate the look and feel of finished, typeset text.</figure>
                                        </a>

                                        <a class="img-3" href="{{asset('images/gallery/demo.jpeg')}}" data-id="3" data-size="1600x1067" data-med="{{asset('images/gallery/demo.jpeg')}}" data-med-size="1024x683" data-author="Michael Hull">
                                            <img src="{{asset('images/gallery/demo.jpeg')}}" alt="image-gallery">
                                            <figure>Dummy caption. It's Greek to you. Unless, of course, you're Greek, in which case, it really makes no sense.</figure>
                                        </a>

                                        <a class="img-4" href="{{asset('images/gallery/demo.jpeg')}}" data-id="4" data-size="1600x1600" data-med="{{asset('images/gallery/demo.jpeg')}}" data-med-size="1024x1024" data-author="Folkert Gorter">
                                            <img src="{{asset('images/gallery/demo.jpeg')}}" alt="image-gallery">
                                            <figure>This is dummy caption.</figure>
                                        </a>

                                        <a class="img-5" href="{{asset('images/gallery/demo.jpeg')}}" data-id="5" data-size="1600x1067" data-med="{{asset('images/gallery/demo.jpeg')}}" data-med-size="1024x683" data-author="Thomas Lefebvre">
                                            <img src="{{asset('images/gallery/demo.jpeg')}}" alt="image-gallery">
                                            <figure>It's a dummy caption. He who searches for meaning here will be sorely disappointed.</figure>
                                        </a> --}}

                                    </div>
                                    <div class="style-select">
                                        <h5 style="visibility: hidden;">Demo gallery style</h5>
                                        <div class="radio mb-4">
                                            <div class="d-flex">
                                                <div class="n-chk">
                                                    <label class="new-control new-radio radio-info">
                                                    <input type="radio" id="radio-all-controls" class="new-control-input" name="gallery-style" checked>
                                                    <span class="new-control-indicator"></span>
                                                        <span class="">
                                                            All controls<br/>
                                                            <span>caption, share and fullscreen buttons, tap to toggle controls</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="radio mb-4">
                                            <div class="d-flex">
                                                <div class="n-chk">
                                                    <label class="new-control new-radio radio-info">
                                                    <input type="radio" id="radio-minimal-black" class="new-control-input" name="gallery-style">
                                                    <span class="new-control-indicator"></span>
                                                        <span class="">
                                                            Minimal<br/>
                                                            <span>no caption, transparent background, tap to close</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- gallery-style --}}

                                    <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                        <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                                        <div class="pswp__bg"></div>

                                        <!-- Slides wrapper with overflow:hidden. -->
                                        <div class="pswp__scroll-wrap">
                                            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                            <div class="pswp__container">
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                            </div>

                                            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                            <div class="pswp__ui pswp__ui--hidden">

                                                <div class="pswp__top-bar">

                                                    <!--  Controls are self-explanatory. Order can be changed. -->
                                                    <div class="pswp__counter"></div>
                                                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                    <button class="pswp__button pswp__button--share" title="Share"></button>
                                                    <a id="delete_img" class="" style="float: right; padding-top: 8px; padding-left: 8px; color: white;" title="delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </a>
                                                    <a href="{{ route('gallery.create') }}" style="float: right; padding-top: 8px; color: white;" title="delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                                                    </a>
                                                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                                    <!-- element will get class pswp__preloader--active when preloader is running -->
                                                    <div class="pswp__preloader">
                                                        <div class="pswp__preloader__icn">
                                                        <div class="pswp__preloader__cut">
                                                            <div class="pswp__preloader__donut"></div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                    <div class="pswp__share-tooltip"></div>
                                                </div>
                                                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                                </button>
                                                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                                </button>
                                                <div class="pswp__caption">
                                                    <div class="pswp__caption__center"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
@endsection
