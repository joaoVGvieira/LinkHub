<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LinkHub') - Seu Portal de Links</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #f8fafc;
            --accent: #06b6d4;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="glass-effect shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-link text-white text-2xl mr-3"></i>
                        <span class="text-white text-xl font-bold">Link<span class="text-cyan-300">Hub</span></span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @auth
                            <a href="/dashboard" class="text-white hover:text-cyan-300 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                                <i class="fas fa-th-large mr-2"></i>Dashboard
                            </a>
                            <form method="POST" action="/logout" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:text-cyan-300 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Sair
                                </button>
                            </form>
                        @else
                            <a href="/login" class="text-white hover:text-cyan-300 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Entrar
                            </a>
                            <a href="/register" class="bg-white text-indigo-600 hover:bg-gray-100 px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                                <i class="fas fa-user-plus mr-2"></i>Registrar
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="glass-effect mt-20">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <p>&copy; 2024 LinkHub. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logout com confirmação
    const logoutLink = document.querySelector('a[onclick*="logout-form"]');
    if (logoutLink) {
        logoutLink.addEventListener('click', function(e) {
            if (!confirm('Tem certeza que deseja sair?')) {
                e.preventDefault();
                return false;
            }
            
            // Mostrar loading
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saindo...';
            
            // Enviar o formulário após confirmação
            setTimeout(() => {
                document.getElementById('logout-form').submit();
            }, 500);
        });
    }
    
    // Adicionar loading em todos os forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                if (!submitBtn.querySelector('.fa-spinner')) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processando...';
                }
            }
        });
    });
});
</script>
</body>
</html>