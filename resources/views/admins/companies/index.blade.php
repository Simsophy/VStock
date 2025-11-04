@extends('layouts.master')

@section('title', 'Company Info')

@section('page_title')
 Company Info
@endsection

@section('content')
<p class="toolbar">
    <a href="{{route('company.edit')}}" class="btn btn-success btn-sm">
       <i class="fas fa-edit">Edit</i>
    </a>
</p>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group row mb-2">
            <label for="" class="col-sm-3">Name*</label>
                <div class="col-sm-9">
                    {{$com->name}}
                </div>
            
        </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-3">Email</label>
                
                <div class="col-sm-9">
                    {{$com->email}}
                </div>
            
        </div>
         <div class="form-group row mb-2 ">
            <label for="" class="col-sm-3">Phone*</label>
                <div class="col-sm-9">
                    {{$com->phone}}
                </div>
            
        </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-3">Address </label>
                <div class="col-sm-9">
                    {{$com->address}}
                </div>
           
        </div>
         <div class="form-group row mb-2">
            <label for="working_hour" class="col-sm-3">Working hour </label>
                <div class="col-sm-9">
                    {{$com->working_hour}}
                </div>
           
        </div>
         <div class="form-group row mb-2">
            <label for="" class="col-sm-3">description </label>
                <div class="col-sm-9">
                    {{$com->description}}
                </div>
           
        </div>
        </div>
        
   
    
    <div class="col-sm-4">
        <div class="form-group row mb-2">
            <label for="" class="col-sm-3"></label>
            <div class="col-sm-9" > 
                <img src="{{ asset('logo.png') }}" alt="Company Logo" width="150">
            </div>
        </div>
    </div>
</div>
</div>
<iframe src="{{$com->map}}" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    @endsection