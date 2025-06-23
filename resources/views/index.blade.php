@extends('layouts.header');
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    .glassmorphism-card {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        /* Compatibilidade com Safari */
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: rgb(255, 255, 255);
        /* Ajuste a cor do texto para melhor contraste */
    }
</style>

<x-componentes>
    <x-slot name="carousel">
        <!-- Hero Carousel -->
        <section id="home" class="hero-carousel ">
            <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner shadow-lg">
                    <!-- Slide 1 -->
                    <div class="carousel-item active ">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            class="d-block w-100 h-75" alt="Casa de luxo">
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                            <div class="container glassmorphism-card">
                                <h1 class="display-4 fw-bold mb-4  animate__animated animate__fadeInDown">Imobiliária
                                    Excelência</h1>
                                <p class="fw-bolder lead mb-5 animate__animated animate__fadeInUp animate__delay-1s ">
                                    Seu lar dos
                                    sonhos está aqui</p>
                                <div
                                    class="d-flex flex-wrap gap-2 animate__animated animate__fadeInUp animate__delay-2s">
                                    <a href="#properties" class="btn btn-primary btn-lg px-4">Ver Imóveis</a>
                                    <a href="#contact" class="btn btn-outline-light btn-lg px-4">Fale Conosco</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            class="d-block w-100 h-75" alt="Apartamento moderno">
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                            <div class="container glassmorphism-card">
                                <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">20 Anos de
                                    Experiência</h1>
                                <p class="fw-bolder lead mb-5 animate__animated animate__fadeInUp animate__delay-1s">
                                    Transformando
                                    sonhos em realidade</p>
                                <div
                                    class="d-flex flex-wrap gap-2 animate__animated animate__fadeInUp animate__delay-2s">
                                    <a href="#properties" class="btn btn-primary btn-lg px-4">Nossos Imóveis</a>
                                    <a href="#agents" class="btn btn-outline-light btn-lg px-4">Nossos Corretores</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                            class="d-block w-100 h-75" alt="Investimento seguro">
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                            <div class="container glassmorphism-card">
                                <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">Investimento
                                    Seguro</h1>
                                <p class="fw-bolder lead mb-5 animate__animated animate__fadeInUp animate__delay-1s">Os
                                    melhores
                                    imóveis para seu patrimônio</p>
                                <div
                                    class="d-flex flex-wrap gap-2 animate__animated animate__fadeInUp animate__delay-2s">
                                    <a href="#properties" class="btn btn-primary btn-lg px-4">Investir</a>
                                    <a href="#contact" class="btn btn-outline-light btn-lg px-4">Consultoria</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </x-slot>

    <x-slot name="barra_pesquisa">
        <!-- Barra de pesquisa de imóvel -->
        <section class="search-section py-4 bg-light">
            <div class="container">
                <div class="search-box p-4 rounded shadow-sm animate__animated animate__fadeIn">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option selected>Tipo de Imóvel</option>
                                <option>Casa</option>
                                <option>Apartamento</option>
                                <option>Terreno</option>
                                <option>Comercial</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option selected>Localização</option>
                                <option>Centro</option>
                                <option>Zona Norte</option>
                                <option>Zona Sul</option>
                                <option>Zona Leste</option>
                                <option>Zona Oeste</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option selected>Faixa de Preço</option>
                                <option>Até R$ 300.000</option>
                                <option>R$ 300.000 - R$ 600.000</option>
                                <option>R$ 600.000 - R$ 1.000.000</option>
                                <option>Acima de R$ 1.000.000</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100 search-btn">
                                <span class="search-text">Buscar</span>
                                <span class="search-icon"><i class="fas fa-search"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

    <x-slot name="imoveis">
        <!-- Sessão de imóveis disponiveis -->
        <section id="properties" class="py-5">
            <div class="container">
                <div class="section-header text-center mb-5">
                    <h2 class="fw-bold">Nossos Imóveis</h2>
                    <p class="text-muted">Encontre o imóvel perfeito para você</p>
                </div>
                {{-- <ul class="nav nav-tabs justify-content-center mb-4" id="propertyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">Todos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sale-tab" data-bs-toggle="tab" data-bs-target="#sale"
                            type="button" role="tab" aria-controls="sale" aria-selected="false">Venda</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rent-tab" data-bs-toggle="tab" data-bs-target="#rent"
                            type="button" role="tab" aria-controls="rent"
                            aria-selected="false">Aluguel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="commercial-tab" data-bs-toggle="tab"
                            data-bs-target="#commercial" type="button" role="tab" aria-controls="commercial"
                            aria-selected="false">Comercial</button>
                    </li>
                </ul> --}}

                <div class="tab-content" id="propertyTabsContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row g-4">

                            <!-- Propriedade 1 -->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card property-card h-100 shadow-lg px-2 pt-3">
                                    <div class="card-title text-center">
                                        <span class="text-center ">Disponível para venda.</span>
                                    </div>
                                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                        class="card-img-top" alt="Casa para venda">
                                    <div class="card-body">
                                        <h5 class="card-title">Casa Residencial</h5>
                                        <p class="card-text text-muted"><i class="fas fa-map-marker-alt me-2"></i>Zona
                                            Sul,
                                            São Paulo</p>
                                        <div class="features d-flex justify-content-between mb-3">
                                            <span><i class="fas fa-bed me-1"></i> 3 Quartos</span>
                                            <span><i class="fas fa-bath me-1"></i> 2 Banheiros</span>
                                            <span><i class="fas fa-ruler-combined me-1"></i> 180m²</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="price mb-0">R$ 850.000</h6>
                                            <button
                                                class="btn btn-sm btn-outline-primary property-details">Detalhes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Propriedade 2 -->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card property-card h-100 shadow-lg px-2 pt-3">
                                    <div class="card-title text-center">
                                        <span class="text-center ">Disponível para aluguel.</span>
                                    </div>
                                    <img src="https://media.istockphoto.com/id/683438570/pt/foto/modern-luxury-apartment-building.webp?s=2048x2048&w=is&k=20&c=XdKVFkp-EApNbMhJwgPkJiA73-KLatZtPHs2UdTmZ9Y="
                                        class="card-img-top img-fluid" alt="Apartamento para aluguel">
                                    <div class="card-body">
                                        <h5 class="card-title">Apartamento</h5>
                                        <p class="card-text text-muted"><i
                                                class="fas fa-map-marker-alt me-2"></i>Centro,
                                            São Paulo</p>
                                        <div class="features d-flex justify-content-between mb-3">
                                            <span><i class="fas fa-bed me-1"></i> 2 Quartos</span>
                                            <span><i class="fas fa-bath me-1"></i> 1 Banheiro</span>
                                            <span><i class="fas fa-ruler-combined me-1"></i> 75m²</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="price mb-0">R$ 2.500/mês</h6>
                                            <button
                                                class="btn btn-sm btn-outline-primary property-details">Detalhes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Propriedade 3 -->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card property-card h-100 shadow-lg px-2 pt-3">
                                    <div class="card-title text-center">
                                        <span class="text-center ">Disponível Sala Comercial.</span>
                                    </div>
                                    <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80"
                                        class="card-img-top img-fluid" alt="Sala comercial">
                                    <div class="card-body">
                                        <h5 class="card-title">Sala Comercial</h5>
                                        <p class="card-text text-muted"><i
                                                class="fas fa-map-marker-alt me-2"></i>Centro,
                                            São Paulo</p>
                                        <div class="features d-flex justify-content-between mb-3">
                                            <span><i class="fas fa-door-open me-1"></i> 2 Salas</span>
                                            <span><i class="fas fa-bath me-1"></i> 1 Banheiro</span>
                                            <span><i class="fas fa-ruler-combined me-1"></i> 120m²</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="price mb-0">R$ 1.200.000</h6>
                                            <button
                                                class="btn btn-sm btn-outline-primary property-details">Detalhes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Propriedade 4 -->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card property-card h-100 shadow-lg px-2 pt-3">
                                    <div class="card-title text-center">
                                        <span class="text-center ">Indisponível, vendido..</span>
                                    </div>
                                    <img src="https://media.istockphoto.com/id/976531686/pt/foto/modern-buildings-in-sydney-business-district-australia.webp?s=2048x2048&w=is&k=20&c=R1PkOUhpyPygzVqiW2v4HUmzBryJ5WeztczpnlKQfVI=""
                                        class="card-img-top img-fluid" alt="Apartamento para aluguel">
                                    <div class="card-body">
                                        <h5 class="card-title">Apartamento</h5>
                                        <p class="card-text text-muted"><i
                                                class="fas fa-map-marker-alt me-2"></i>Centro,
                                            São Paulo</p>
                                        <div class="features d-flex justify-content-between mb-3">
                                            <span><i class="fas fa-bed me-1"></i> 2 Quartos</span>
                                            <span><i class="fas fa-bath me-1"></i> 1 Banheiro</span>
                                            <span><i class="fas fa-ruler-combined me-1"></i> 75m²</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="price mb-0">R$ 2.500/mês</h6>
                                            <button
                                                class="btn btn-sm btn-outline-primary property-details">Detalhes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other tab panes would contain filtered properties -->
                    <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                        <!-- Content for sale properties -->
                        <div class="alert alert-info">Imóveis para venda serão exibidos aqui</div>
                    </div>
                    <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                        <!-- Content for rent properties -->
                        <div class="alert alert-info">Imóveis para aluguel serão exibidos aqui</div>
                    </div>
                    <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
                        <!-- Content for commercial properties -->
                        <div class="alert alert-info">Imóveis comerciais serão exibidos aqui</div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="#" class="btn btn-outline-primary btn-view-all">Ver Todos os Imóveis</a>
                </div>
            </div>
        </section>
    </x-slot>

    <x-slot name="corretores">
        <!-- Sessão de cards dos corretores -->
        <section id="agents" class="py-5 bg-light">
            <div class="container">
                <div class="section-header text-center mb-5">
                    <h2 class="fw-bold">Nossos Corretores</h2>
                    <p class="text-muted">Profissionais qualificados para te ajudar</p>
                </div>

                <div class="row g-4 animate__animated animate__fadeIn">
                    <!-- Agent 1 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card agent-card text-center h-100 shadow-lg">
                            <div class="card-img-top p-2">
                                <img src="https://cdn.pixabay.com/photo/2016/11/29/13/14/attractive-1869761_960_720.jpg"
                                    class="rounded-circle shadow" alt="Corretora"
                                    style="width: 150px; height: 150px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Ana Silva</h5>
                                <p class="card-text text-muted">CRECI 12345-SP</p>
                                <p class="card-text">Especialista em imóveis residenciais na Zona Sul.</p>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Agent 2 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card agent-card text-center h-100 shadow-lg">
                            <div class="card-img-top p-2">
                                <img src="https://cdn.pixabay.com/photo/2022/01/19/14/50/portrait-6950046_960_720.jpg"
                                    class="rounded-circle" alt="Corretor" style="width: 150px; height: 150px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Carlos Mendes</h5>
                                <p class="card-text text-muted">CRECI 54321-SP</p>
                                <p class="card-text">Especialista em imóveis comerciais e luxo.</p>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Agent 3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card agent-card text-center h-100 shadow-lg">
                            <div class="card-img-top p-2">
                                <img src="https://cdn.pixabay.com/photo/2017/02/16/23/10/smile-2072908_960_720.jpg"
                                    class="rounded-circle" alt="Corretora" style="width: 150px; height: 150px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Fernanda Oliveira</h5>
                                <p class="card-text text-muted">CRECI 98765-SP</p>
                                <p class="card-text">Especialista em imóveis para aluguel.</p>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Agent 4 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card agent-card text-center h-100 shadow-lg">
                            <div class="card-img-top p-2">
                                <img src="https://cdn.pixabay.com/photo/2021/05/09/12/58/fashion-6240876_960_720.jpg"
                                    class="rounded-circle" alt="Corretor" style="width: 150px; height: 150px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Roberto Santos</h5>
                                <p class="card-text text-muted">CRECI 13579-SP</p>
                                <p class="card-text">Especialista em terrenos e imóveis rurais.</p>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>
</x-componentes>


@extends('layouts.footer');

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Acesse sua conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Lembrar de mim</label>
                    </div>
                    <div id="loginAlert" class="alert alert-danger d-none" role="alert"></div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none">Esqueceu sua senha?</a>
                </div>
                <hr>
                <div class="text-center">
                    <p class="mb-0">Não tem uma conta? <a href="#" class="text-primary"
                            data-bs-toggle="modal" data-bs-target="#registerModal"
                            data-bs-dismiss="modal">Cadastre-se</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
