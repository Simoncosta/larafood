<div class="form-group">
    <label for="Nome">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $plan->name ?? '' }}">
</div>
<div class="form-group">
    <label for="Preço">Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $plan->price ?? '' }}">
</div>
<div class="form-group">
    <label for="Descrição">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plan->description ?? '' }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Concluir</button>
</div>