@extends('layout.layout')

@section('content')
    <div class="col-lg-12">

        @include('partial.search_form')

        @if(count($users) > 0)
            <table class="table table-striped table-bordered">
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>E-Mail</th>
                </tr>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->middle_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>@if(!is_null($user->city)){{ $user->city->name }}@endif</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $users->appends(request()->input())->links() }}
        @else
            <p>No users found.</p>
        @endif

    </div>
@endsection
