<div class="row">

    @csrf
    <div class="col-6 col-xs-12 ">
        <div class="form-group">
            <label for="name">{{ __('gallery.title') }}</label>
            <input id="name" name="title" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="{{ __('gallery.title') }}" required>
        </div>
    </div>
    <div class="col-6 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('gallery.image') }}</label>
            <input type="file" name="image_file" class="form-control" placeholder="{{ __('gallery.image') }}" required accept=".jpg,.jpeg">
        </div>
    </div>
</div>
