
<table class="table">
  <thead>
    <tr>
      <th >No.</th>
      <th >Name</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $bil=1; ?>
    @foreach ($model as $product )
      
    <tr>
      <th scope="row"><?php echo $bil++ ?></th>
      <td>{{$product->name}}</td>
      <td>
        <button class="btn btn-warning m-2" onclick="show({{$product->id}})">Edit</button>
        <button class="btn btn-danger m-2" onclick="destroy({{$product->id}})">Delete</button>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
