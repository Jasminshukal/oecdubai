@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit University</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('university.update',['university' => $university]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @include('university._form')
                        <button type="submit" class="btn btn-primary mt-3">Update University</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
