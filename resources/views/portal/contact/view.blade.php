@extends('portal.layouts.main')
@section('title', 'Contacts')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.contacts') }}">Contacts</a></li>
    <li class="active">View</li>
@endsection()
@section('content-body')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div>
                    <label class="font-weight-bold fs-18">Message:</label>
                    <p>{{ $contact->message }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5 mt-md-0">
            <div class="card">
                <div>
                    <label class="font-weight-bold fs-18">Name:</label>
                    <p>{{ $contact->getFullName() }}</p>
                </div>
                <div>
                    <label class="font-weight-bold fs-18">Company Email:</label>
                    <p class="text-underline text-brand-primary">{{ $contact->contact_email }}</p>
                </div>
                <div>
                    <label class="font-weight-bold fs-18">Company Name:</label>
                    <p>{{ $contact->contact_company_name ?? '---' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection()