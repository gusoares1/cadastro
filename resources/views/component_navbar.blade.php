<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a @if($current =="home") class="nav-link active" @else class ="nav-link" @endif  aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item active">
          <a @if($current =="pessoas") class="nav-link active" @else class ="nav-link" @endif aria-current="page" href="/pessoas">pessoas</a>
        </li>
        <li class="nav-item active">
          <a @if($current =="pessoas") class="nav-link active" @else class ="nav-link" @endif aria-current="page" href="/localizacao">Localizacao</a>
        </li>
    </div>
  </div>
</nav>