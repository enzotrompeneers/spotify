{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('salt', 'Salt:') !!}
			{!! Form::text('salt') !!}
		</li>
		<li>
			{!! Form::label('ipaddress', 'Ipaddress:') !!}
			{!! Form::text('ipaddress') !!}
		</li>
		<li>
			{!! Form::label('address', 'Address:') !!}
			{!! Form::text('address') !!}
		</li>
		<li>
			{!! Form::label('city', 'City:') !!}
			{!! Form::text('city') !!}
		</li>
		<li>
			{!! Form::label('rememberToken', 'RememberToken:') !!}
			{!! Form::text('rememberToken') !!}
		</li>
		<li>
			{!! Form::label('isAdmin', 'IsAdmin:') !!}
			{!! Form::text('isAdmin') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}