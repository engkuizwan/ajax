<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUDAJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container my-3">
    <h1 class="text-center" >CRUD AJAX</h1>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark" onClick="create()">+New Product</button>

    </div>
    <div class="mt-3" id="table"></div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="page" class="p-2"></div>
        </div>
      </div>
    </div>
  </div>

    
  
  
  <script>


    $(document).ready(function(){
        read();
    })
        function read(){
            // $("#exampleModal").modal(show);
            $.get("{{ url('read') }}", {}, function(data,status){
                $("#table").html(data);
                
            });
        }
    
        // modal Create
        function create(){
            $.get("{{ url('create') }}", {}, function(data,status){
                $("#page").html(data);
                $("#exampleModal").modal('show');
                $("#exampleModalLabel").html('Create Product');
                
            });
        }

        // Store data
        function store(){
            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{url('store')}}",
                data: {
                "_token": "{{ csrf_token() }}",
                "name" : name
                },
                success: function(data) {
                $(".btn-close").click();
                read();
                }
            });
        }

        // Show data

        function show(id){
            $.get("{{ url('show') }}/"+id, {}, function(data,status){
                $("#page").html(data);
                $("#exampleModal").modal('show');
                $("#exampleModalLabel").html('Update Product');
                
            });
        }


        // update data
        function update(id){
            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{url('update')}}/"+id,
                data: {
                "_token": "{{ csrf_token() }}",
                "name" : name
                },
                success: function(data) {
                $(".btn-close").click();
                read();
                }
            });
        }

        // update data
        function destroy(id){
            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{url('destroy')}}/"+id,
                data: {
                "_token": "{{ csrf_token() }}",
                "name" : name
                },
                success: function(data) {
                $(".btn-close").click();
                read();
                }
            });
        }
        



</script>





</body>
</html>

