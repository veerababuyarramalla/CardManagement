@extends('parent')

@section('main')

<div class="jumbotron text-center">
    <div align="right">
        <a href="{{ route('card.index') }}" class="btn btn-default">Back</a>
    </div>
    <br />
    <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
    <h3>Persone Name - {{ $data->person_name }} </h3>
    <h3>Designation - {{ $data->designation }}</h3>
    <h3>Business Name - {{ $data->business_name }}</h3>
    <h3>Short Description - {{ $data->short_description }}</h3>
    <h3>WhatsApp Number - {{ $data->whatsapp_number }}</h3>
    <h3>Contacts - {{ $data->contacts }}</h3>
    <h3>Single Address - {{ $data->single_address }}</h3>


</div>
@endsection