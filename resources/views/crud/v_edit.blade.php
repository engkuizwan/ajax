
<div class="p2">
  <form>
    @csrf
    <div class="form-group">
      <label for="name">Product</label>
      <input type="text" class="form-control" id="name"  placeholder="Product Name" value="{{$model->name}}">
    </div>
    <div class="mt-2">
      <button type="button" class="btn btn-warning" onclick="update({{$model->id}})">Update</button>  
    </div>
    </form>  
</div>
