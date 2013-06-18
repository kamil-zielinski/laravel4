
@if ( Session::has('login_failed') )
	<p style="color: red">Ups, login failed.</p>
@endif	

<form method="post" action="{{ action( 'AuthController@postLogin') }}">
	<input type="text" name="nickname" /><br/>
	<input type="password" name="password" /><br/>
	<input type="submit" value="Log in" />
</form>