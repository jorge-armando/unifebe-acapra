<header id="admin-header">
    <div class="header-content">
        <img id="logo" src="{{ asset('images/iconLogo.png') }}" alt="Logo ACAPRA">
        
        <nav class="nav-links">
            <a href="/admin">Home</a>
            <a href="/admin/forms">Formulários</a>
            <a href="/admin/cadastro">Cadastrar Admin</a>
            <a href="/admin/pets/add">Adicionar Pet</a>
            
            <a href="/admin/logout" class="admin-user">
                Olá, {{ session('user_name') }}
                <img src="{{ asset('images/sair.png') }}" alt="Sair" style="height: 24px;">
            </a>
        </nav>
    </div>
</header>