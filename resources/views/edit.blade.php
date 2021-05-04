@extends('parent')

@section('main')
<div align="right">
    <a href="{{ route('card.index') }}" class="btn btn-default">Back</a>
</div>
<br />

<form method="post" action="{{ route('card.update', $data->id) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    <div class="form-group">
        <label class="col-md-4 text-right">Person Name</label>
        <div class="col-md-8">
            <input type="text" name="person_name" value="{{ $data->person_name}}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Designation</label>
        <div class="col-md-8">
            <input type="text" name="designation" value="{{ $data->designation}}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Business Name</label>
        <div class="col-md-8">
            <input type="text" name="business_name" value="{{ $data->business_name }}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Short Description</label>
        <div class="col-md-8">
            <textarea type="text" name="short_description" value="{{ $data->short_description }}" class="form-control input-lg" maxlength="151">
            {{$data->short_description}}
            </textarea>
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">WhatsApp Number</label>
        <div class="col-md-8">
            <input type="text" name="whatsapp_number" value="{{ $data->whatsapp_number }}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Contacts</label>
        <div class="col-md-8">
            <input type="text" name="contacts" value="{{$data->contacts }}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Single Address</label>
        <div class="col-md-8">
            <input type="text" name="single_address" value="{{$data->single_address}}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Select Profile Image</label>
        <div class="col-md-8">
            <input type="file" name="image" />
            <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
            <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
        </div>
    </div>
    <br /><br /><br />
    <div class="form-group text-center">
        <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
    </div>
</form>
@endsection