@extends('portal.layouts.main')
@section('title', 'Contacts')
@section('header-breadcrumb')
    <li class="active">Contacts</li>
@endsection()
@section('content-body')
    <div class="card card-table">
        @if(sizeof($contacts) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="field-name"><span>S/N</span></th>
                        <th class="field-name"><span>Name</span></th>
                        <th class="field-name"><span>Contact Email</span></th>
                        <th class="field-name"><span>Company Name</span></th>
                        <th class="field-name"><span>Message</span></th>
                        <th class="field-name"><span>Created At</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $key => $contact)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ $contact->getFullName() }}
                            </td>
                            <td>{{ $contact->contact_email }}</td>
                            <td>{{ $contact->contact_company_name }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->formatDate() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fa fa-address-book empty-state__icon icon-grey" aria-hidden="true"></i>
                <p class="empty-state__description mt-2">No Contacts has been made yet.</p>
            </div>
        @endif
        {{ $contacts->render() }}
    </div>
@endsection