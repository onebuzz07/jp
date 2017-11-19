<div>
<table class="table table-bordered" id="users-table">
    <thead>
        <tr>
            <th>Part Number</th>
            <th>ID Num</th>
            <th>P/O quantity</th>
            <th>Stock</th>
            <th>Adj</th>
            <th>Balance</th>
            <th>Receive Date</th>
            <th>Remarks</th>
        </tr>
    </thead>
</table>


{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

<script>
  $(function() {
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
            ajax: '{!! route('frontend.slsmark.viewstocktable',['id' => $sales->id]) !!}',


          "order": [[ 0, "desc" ]]
      });
  });


  //Being injected from FrontendController
  // console.log(test);
  </script>
</div>
