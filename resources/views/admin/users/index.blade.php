{{-- used to display the Users Table --}}
@extends('layouts.app');
@section('content')
    <div class="panel panel-prima\">
        <div class="panel-heading">
            Users
        </div>
        @if(count($users)>0)
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr >
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>NAME</th>
                        <th class="text-center">DELETE</th>
                    <tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><img src="{{--{{asset($user->profile->avatar)}}--}}" alt=""></td>
                            <td>{{$user->name}}</td>
                            <td class="text-center">
                                @if(Auth::id()!= $user->id)
                                   <span class="bg-danger" style="color: #fff;border-radius: 2px;font-size:12px;padding: 4px;">Original user</span>
                                @else
                                    <span class="bg-info" style="color: #fff;border-radius: 2px;font-size:12px;padding: 4px;">Logged In User</span>
                                @endif

                            </td>
                            <td class="text-center">
                                @if(Auth::id()!= $user->id)
                                    <form action="{{route('users.destroy',$user->id)}}" class="form"
                                          method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="panel-body">
                <div class="alert alert-danger"> NO <strong> USERS </strong> added</div>
            </div>
        @endif
    </div>
@endsection