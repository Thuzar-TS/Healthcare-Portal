@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

	<!-- <button type="button" class="close" data-dismiss="alert">×</button>	 -->

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
</div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">
	<strong>{{ $message }}</strong>
</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info alert-block">
	<strong>{{ $message }}</strong>d
</div>

@endif




@if ($message = Session::get('reset'))

<div class="alert_auto_close">
	<strong>{{ $message }}</strong>
</div>

@endif

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
