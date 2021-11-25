<div class="row">

    @csrf
    <div class="col-6 col-xs-12 ">
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="University Name" value="{{ $university->name ?? '' }}" required>
        </div>
    </div>
    {{-- Name --}}
    <div class="col-6 col-xs-12">
        <div class="form-group">
            <label for="contry">Contry</label>
            <select name="county" id="contry" class="form-control">
                @foreach (Config::get('country') as $key => $item)
                <option @isset($university->country)
                    @if ($university->country == $key)
                        selected
                    @endif
                @endisset value="{{ $key }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- Contry --}}
    <div class="col-6 col-xs-12 ">
        <div class="form-group">
            <label for="url">Url</label>
            <input id="url" name="url" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="University Url" value="{{ $university->url ?? '' }}" required>
        </div>
    </div>
</div>
