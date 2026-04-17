<!DOCTYPE html> 
<html lang="fr"> 
<head> 
    <meta charset="UTF-8"> 
    <title>@yield('title', 'Todo App')</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/..."> 
</head> 
<body class="bg-light"> 
<div class="container py-4"> 
    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif 
    @yield('content') 
</div> 
</body></html> 