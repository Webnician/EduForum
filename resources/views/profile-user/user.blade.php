@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($user) }}--}}

        <singleuser buttxt = "{{ $user['buttxt'] }}" operation = "{{ $user['operation'] }}" actions = "{{ $user['actions'] }}"
                     :editmode = "{{ $user['editmode'] }}" :viewer = "{{ $user['viewer'] }}" :toedit = "{{ $user['toedit'] }}"
                     :creator = "{{ $user['creator'] }}"
                ids="{{ $user['id'] }}"  emails="{{ $user['email']}}" fnames="{{ $user['fname']}}"
                lnames="{{ $user['lname'] }}" avatars="{{ $user['avatar']}}" titles="{{ $user['title']}}" institutions="{{ $user['institution'] }}"
                     biographys="{{ $user['biography'] }}" addresses = " {{$user['address']}}"
                citys = " {{$user['city']}}" states = "{{$user['state']}}" zips = "{{ $user['zip']}}" countrys = "{{$user['country']}}" phones = "{{$user['phone']}}"
                     types = "{{$user['type']}}"></singleuser>


    </div>
@endsection