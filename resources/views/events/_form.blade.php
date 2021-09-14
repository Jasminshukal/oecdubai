<div class="row">

    @csrf
    <div class="col-6 col-xs-12 ">
        <div class="form-group">
            <label for="name">{{ __('event.name') }}</label>
            <input id="name" value="{{ $event->title ?? '' }}" name="title" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="{{ __('event.name') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.place') }}</label>
            <input value="{{ $event->place ?? '' }}" type="text" name="place" class="form-control" placeholder="{{ __('event.place') }}" required>
        </div>
        <div class="form-group">
            <label for="select_cat">{{ __('event.category') }}</label>
            @php
                if (isset($event->cat_id)) {
                    $cat_id=$event->cat_id;
                }
                else {
                    $cat_id=0;
                }
            @endphp
            <select name="cat_id" id="select_cat" class="form-control">

                @foreach (get_category('event') as $item)
                    <option
                    @if ($cat_id==$item->id)
                    selected
                    @endif
                     value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('event.date') }}</label>
            <input value="{{ $event->date ?? '' }}" type="date" name="date" class="form-control" placeholder="{{ __('event.date') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.time') }}</label>
            <input value="{{ $event->time ?? '' }}" type="time" name="time" class="form-control" placeholder="{{ __('event.time') }}" required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('event.image') }}</label>
            <input type="file" name="image_file" class="form-control" placeholder="{{ __('event.image') }}" @if($cat_id) @else required  @endif accept=".jpg,.jpeg">
        </div>
    </div>
    <div class="col-12 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('event.description') }}</label>
            <textarea class="form-control" name="description" id="" placeholder="{{ __('event.description') }}">{{ $event->description ?? '' }}</textarea>
        </div>
    </div>
</div>
