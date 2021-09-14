<div class="row">

    @csrf
    <div class="col-12">
        <div class="form-group">
            <label for="name">{{ __('blog.name') }}</label>
            <input id="name" name="title" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="{{ __('blog.name') }}" required>
        </div>
    </div>
    <div class="col-6 col-xs-12 ">

        <div class="form-group">
            <label for="select_cat">{{ __('blog.category') }}</label>
            <select name="cat_id" id="select_cat" class="form-control">
                <option selected> Select {{ __('blog.category') }}</option>
                @foreach (get_category('blog') as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('blog.image') }}</label>
            <input type="file" name="image_file" class="form-control" placeholder="{{ __('blog.image') }}" required accept=".jpg,.jpeg">
        </div>
    </div>
    <div class="col-12 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('blog.description') }}</label>
            <textarea class="form-control" name="description" id="" placeholder="{{ __('blog.description') }}"></textarea>
        </div>
    </div>
</div>
