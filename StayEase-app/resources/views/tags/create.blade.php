<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<form method="POST" action="{{ route('tags.store') }}">
    @csrf
 <div class="row g-3 align-items-center mb-3">
  <div class="col-auto">
    <label for="name" class="col-form-label">Nom de Tag</label>
     </div>
     <div class="col-auto">
    <input type="name" class="form-control" id="name">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>