@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div align="right">
    <a href="{{ route('card.index') }}" class="btn btn-default">Back</a>
</div>

<div class="d-flex">
    <div class="col-md-6 border">
        <h3>Add Card Details</h3>
        <form method="post" action="{{ route('card.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label class="col-md-4 text-right">Person Name</label>
                <div class="col-md-8">
                    <input type="text" name="person_name" id="person_name" class="form-control input-lg" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">Designation</label>
                <div class="col-md-8">
                    <input type="text" name="designation" id="designation" class="form-control input-lg" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">Business Name</label>
                <div class="col-md-8">
                    <input type="text" name="business_name" id="business_name" class="form-control input-lg" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">Short Description</label>
                <div class="col-md-8">
                    <textarea type="text" name="short_description" id="short_description" class="form-control input-lg" maxlength="151">
        </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">WhatsApp Number</label>
                <div class="col-md-8">
                    <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control input-lg" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">Contacts</label>
                <div class="col-md-8">
                    <input type="text" name="contacts" id="contacts" class="form-control input-lg" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">Single Address</label>
                <div class="col-md-8">
                    <textarea type="text" name="single_address" id="single_address" class="form-control input-lg">
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 text-right">Select Profile Image</label>
                <div class="col-md-8">
                    <input type="file" name="image" id="imgInp" />
                </div>
            </div>

            <div class="form-group text-center">
                <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
            </div>

        </form>
    </div>
    <div class="col-md-6 border">
        <h3>Preview</h3>

        <img id="blah" src="#" alt="your image" width="250px" height="250px" />

        <h5 id="preview_person_name">Persone Name </h5>
        <h5 id="preview_designation">Designation </h5>
        <h5 id="preview_business_name">Business Name </h5>
        <h5 id="preview_short_description">Short Description </h5>
        <h5 id="preview_whatsapp_number">WhatsApp Number </h5>
        <h5 id="preview_contacts">Contacts </h5>
        <h5 id="preview_single_address">Single Address </h5>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });



        $('#person_name').keyup(function() {
            var person_name = $(this).val();
            $('#preview_person_name').text(`Person Name - ${person_name}`);
        });

        $('#designation').keyup(function() {
            var designation = $(this).val();
            $('#preview_designation').text(`Designation - ${designation}`);
        });

        $('#business_name').keyup(function() {
            var business_name = $(this).val();
            $('#preview_business_name').text(`Business Name - ${business_name}`);
        });

        $('#short_description').keyup(function() {
            var short_description = $(this).val();
            $('#preview_short_description').text(`Short Description - ${short_description}`);
        });
        $('#whatsapp_number').keyup(function() {
            var whatsapp_number = $(this).val();
            $('#preview_whatsapp_number').text(`Whatsapp Number - ${whatsapp_number}`);
        });
        $('#contacts').keyup(function() {
            var contacts = $(this).val();
            $('#preview_contacts').text(`Contacts - ${contacts}`);
        });
        $('#single_address').keyup(function() {
            var single_address = $(this).val();
            $('#preview_single_address').text(`Single Address - ${single_address}`);
        });



    })
</script>





@endsection