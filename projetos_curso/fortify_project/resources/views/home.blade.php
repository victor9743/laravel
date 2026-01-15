<div>
    <h3>Página Inicial</h3>
    Nome do usuário autenticado: {{ Auth::user()->name }}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Log out</button>
    </form>
</div>
