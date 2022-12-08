<h1>ini dashboard</h1>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout!</button>
</form>
