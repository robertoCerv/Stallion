<div class="row">
        <div class="col-sm-4 avatar">
        	<img src="{{ $profile->avatar }}" class="img-circle img-responsive" alt="Avatar de {{ $profile->fullName }}">
        </div>
        <div class="col-sm-8">
        	<h3>{{ $profile->fullName }}</h3>
			<p>{{ $profile->userName }}</p>
        </div>
    </div>
<div class="row">
	<div class="col-sm-12">
		<p>{{ $profile->about }}</p>
	</div>
</div>