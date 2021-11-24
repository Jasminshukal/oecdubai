<div class="row">

    @csrf
    <div class="col-12">
        <div class="form-group">
            <label for="name">{{ __('blog.name') }} </label>
            <input id="name" name="title" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="{{ __('blog.name') }}"  value="{{ $blog->title }}" required>
        </div>
    </div>
    <div class="col-6 col-xs-12 ">

        <div class="form-group">
            <label for="select_cat">{{ __('blog.category') }}</label>
            <select name="cat_id" id="select_cat" class="form-control">
                <option selected> Select {{ __('blog.category') }}</option>
                @foreach (get_category('blog') as $item)
                    <option value="{{ $item->id }}" @if($blog->cat_id==$item->id) selected @endif >{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('blog.image') }}</label>
            <a href="{{ asset('https://www.oecdubai.com/backend/images/events/'.$blog->image) }}">
                <svg class="btn-info p-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </a>
            <input type="file" name="image_file" class="form-control" placeholder="{{ __('blog.image') }}" required accept=".jpg,.jpeg">
        </div>
    </div>
    <div class="col-12 col-xs-12">
        <div class="form-group">
            <label for="name">{{ __('blog.description') }}</label>
            <textarea class="form-control" name="description" id="" placeholder="{{ __('blog.description') }}">{{ $blog->description }}</textarea>
        </div>
    </div>
</div>
