@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                @if(checkPermission(['user']))
                    <a href="{{ url('permissions-all-users') }}"><button>Access All Users</button></a>
                    @endif


                @if(checkPermission(['admin']))
                    <a href="{{ url('permissions-admin-superadmin') }}"><button>Access Admin and Superadmin</button></a>
                    @endif


                    <!-- @if(checkPermission(['superadmin']))
                    <a href="{{ url('permissions-superadmin') }}"><button>Access Only Superadmin</button></a>
                    @endif -->
            </div>
        </div>
    </div>
</div>
@endsection
