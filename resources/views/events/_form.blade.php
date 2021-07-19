<div class="row">

    @csrf
    <div class="col-6 col-xs-12 ">
        <div class="form-group">
            <label for="name">{{ __('event.name') }}</label>
            <input id="name" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="{{ __('event.name') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.place') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('event.place') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.category') }}</label>
            <input type="file" class="form-control" placeholder="{{ __('event.category') }}" required>
        </div>
    </div>
    <div class="col-6 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('event.date') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('event.date') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.time') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('event.time') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.image') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('event.image') }}" required>
        </div>
    </div>
    <div class="col-12 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('event.description') }}</label>
            <textarea class="form-control" name="desction" id="" placeholder="{{ __('event.description') }}"></textarea>
        </div>
    </div>
</div>
