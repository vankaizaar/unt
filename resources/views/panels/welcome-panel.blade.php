@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp


<div class="panel panel-primary @role('admin', true) panel-info  @endrole">
    <div class="panel-heading">

        Welcome {{ Auth::user()->name }}

        @role('admin', true)
            <span class="pull-right label label-primary" style="margin-top:4px">
            Admin Account
            </span>
        @else
            <span class="pull-right label label-warning" style="margin-top:4px">
            User Account
            </span>
        @endrole

    </div>
    <div class="panel-body">
        <h2 class="lead">
            {{ trans('auth.loggedIn') }}
        </h2>
       
        <p>
            Introductory message will go here.
        </p>

          

    </div>
</div>
