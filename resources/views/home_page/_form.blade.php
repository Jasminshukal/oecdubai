<div class="row">
    @csrf
    <div class="col-12">
        <div class="form-group">
            <label for="name">Univerity Name</label>
            <input id="name" name="name" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="Univerity Name"  value="{{ $universities->entity_name ?? "" }}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="name">Univerity Image (293 X 200)</label>
            <input type="file" name="image" class="form-control"  accept="image/*" onchange="loadFile(event)">
        </div>
    </div>
    @if($universities->id)

    <div class="col-12">
        <div class="form-group">
            @if ($universities->entity_image)
                <img src="{{ $universities->entity_image }}" id="output" alt="" width="293px" height="200px">
            @endif
        </div>
    </div>
    @endif

</div>
