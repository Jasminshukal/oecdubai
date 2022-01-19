<div class="row">
    @csrf
    <div class="col-12">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input id="name" name="name" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="Student Name"  value="{{ $testimonial->student_name ?? "" }}" required>        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="name">Student Image (200 X 200)</label>
            <input type="file" name="image" class="form-control"  accept="image/*" onchange="loadFile(event)">
        </div>
    </div>
    @if($testimonial->id)
        <div class="col-12">
            <div class="form-group">
                @if ($testimonial->student_img)
                    <img src="{{ $testimonial->student_img }}" id="output" alt="" width="300px" height="300px">
                @endif
            </div>
        </div>
    @endif
    <div class="col-12">
        <div class="form-group">
            <label for="name">University Detail</label>
            <input id="name" name="university_detail" type="text" class="form-control"  aria-describedby="emailHelp1" placeholder="Univerity Name"  value="{{ $testimonial->university_detail ?? "" }}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10" required>{{ $testimonial->description ?? "" }}</textarea>
        </div>
    </div>


</div>
