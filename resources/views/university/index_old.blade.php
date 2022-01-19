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

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a class="btn btn-xs btn-info float-right mb-3" href="{{ route('university.create') }}" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                </a>
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Contry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($university as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                    </a>
                                </td>
                                <td><span class="badge badge-primary">{{ $item->status }}</span></td>
                                <td><span class="badge badge-dark">@if(Config::get('country.'.$item->county)) {{ Config::get('country.'.$item->county) }} @else Invalid Contry Name @endif</span></td>
                                <td>
                                    <form action="{{ route('university.destroy',['university' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <a class="btn rounded-circle btn-primary" href="{{ route('university.show',['university' => $item->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                        <a class="btn rounded-circle btn-warning" href="{{ route('university.edit',['university' => $item->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        </a>
                                        <button class="btn rounded-circle btn-danger" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="5" class="text-center"> No Data Found</th>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                    {{$university->links('pagination::bootstrap-4')}}

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
