@extends('frontend.layouts.app')

@section('content')
  <h1>Planning Department</h1>
@include('frontend.plan.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <h3 class="box-title"> {{ trans('STOCK BALANCE') }}</h3>
    <div class="" id="app">

        <div class="col-md-12 row">
          <table style="font-size:10px" class="table table-bordered" >
            <thead>
                <tr>
                  <th>Part NO</th>
                  <th>PO #</th>
                  <th>Po Date</th>
                  <th>GRN</th>
                  <th>Date Received</th>
                  <th>Location</th>
                  <th>Supplier Code</th>
                  <th>Supplier Name</th>
                  <th>Size</th>
                  <th>System QTY-ori </th>
                  {{-- <th>Actual QTY-ori  </th> --}}
                  <th>Unit </th>
                </tr>
              </thead>
              <tbody >
                <tr>
                  <td >{!!$sheet->partNo!!}</td>
                  <td>{!! $sheet->po!!}</td>
                  <td>{!! date('d/m/Y', strtotime($sheet->podate)) !!}</td>
                  <td>{!! $sheet->grn !!}</td>
                  <td>{!! date('d/m/Y', strtotime($sheet->datereceived)) !!}</td>
                  <td>{!! $sheet->location !!}</td>
                  <td>{!!$sheet->suppliercode  !!}</td>
                  <td>{!! $sheet->suppliername!!}</td>
                  <td>{!! $sheet->size !!}</td>
                  <td>{!!$sheet->qtyavail!!}</td>
                  {{-- <td>{!!$sheet->actavail!!}</td> --}}
                  <td>{!!$sheet->unit_of_measure!!}</td>
                </tr>
              </tbody>
            </table>
        </div>

      <br>
    {{-- <div class="col-md-4 row">
      <h4>List workorder ID for this Item Number</h4>
      @if(!empty($wo))
      <table style="font-size:10px" class="table table-bordered" >
        <thead>
            <tr>
              <th>WO ID</th>
              <th>WO QTY</th>
            </tr>
          </thead>
          <tbody >
            <tr>
              @foreach($wo as $w)
              <td>{!!$w->wid!!}</td>
              <td>{!!$w->woqty !!}</td>
              @endforeach

            </tr>
          </tbody>
      </table>
    @else
      <p>No Workorder ID associate with this part number</p>
      <br><br>
    @endif
    </div> --}}
        {{-- <div class="col-md-12 row form-group">
          {!! Form::model($sheet, array('route' => array('frontend.plan.searchwid', $sheet->id), 'method' => 'POST')) !!}
            <div class="col-md-12 row ">
              {!! Form::label('wid', 'Search your Workorder ID: ', array('class' => 'col-md-4')) !!}
              <div class="col-md-8">{!! Form::text('wid','', array('class' => 'form-control')) !!}</div>
            </div>

            <div class="form-group row">
              <button type="submit" class="btn btn-primary" value="Create">Search </button>
            </div>
          {!!Form::close();!!}
        </div> --}}
        <div class="col-md-12 row ">
          {!! Form::model($sheet, array('route' => array('frontend.plan.balancestore', $sheet->id), 'method' => 'POST')) !!}
          <table style="font-size:10px" class="table table-bordered" >
            <thead>
                <tr>
                  <th>Wo Date</th>
                  <th>WO ID</th>
                  <th>WO QTY</th>
                  <th>Balance WO QTY</th>
                  <th>Actual Qty</th>
                  <th>Balance QTY</th>
                  <th>Remarks</th>

                </tr>
              </thead>
              <tbody >
                @if(!empty($choose))
                  @if (!empty($balance))
                <tr>
                  <td>{!! Form::text('wodate', date('d/m/Y', strtotime($balance->wodate)), array('id'=>'1', 'class' => 'form-control')) !!}</td>
                  <td>{!! Form::text('wid', $woid, array('class' => 'form-control')) !!}</td>
                    <td>{!! Form::number('woqty', '' , array('class' => 'form-control', 'min'=>'0' , 'max'=>''.$balance->balwoqty.'','step'=>"any", 'id'=>'a11', 'v-model'=>'a11')) !!}</td>
                    <td>{!! Form::number('balwoqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a21', 'v-model'=>"a21", 'readonly'=>true)) !!}</td>
                  <td>{!! Form::number('actqty', '', array('class' => 'form-control', 'min'=>'0', 'max'=>''.$balance->balactqty.'','step'=>"any", 'id'=>'a1', 'v-model'=>"a1")) !!}</td>
                  <td>{!! Form::number('balactqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a2', 'v-model'=>"a2", 'readonly'=>true)) !!}</td>
                  <td>{!! Form::text('remarks', '', array('class' => 'form-control')) !!}</td>
                </tr>
                @else
                  <tr>
                    <td>{!! Form::text('wodate', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'1', 'class' => 'form-control')) !!}</td>
                    <td>{!! Form::text('wid', '', array('class' => 'form-control')) !!}</td>
                      <td>{!! Form::number('woqty', '' , array('class' => 'form-control', 'min'=>'0' , 'max'=>''.$sheet->qtyavail.'','step'=>"any", 'id'=>'a11', 'v-model'=>'a11')) !!}</td>
                      <td>{!! Form::number('balwoqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a21', 'v-model'=>"a21", 'readonly'=>true)) !!}</td>
                    <td>{!! Form::number('actqty', '', array('class' => 'form-control', 'min'=>'0', 'max'=>''.$sheet->actavail.'','step'=>"any", 'id'=>'a1', 'v-model'=>"a1")) !!}</td>
                    <td>{!! Form::number('balactqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a2', 'v-model'=>"a2", 'readonly'=>true)) !!}</td>
                    <td>{!! Form::text('remarks', '', array('class' => 'form-control')) !!}</td>
                  </tr>
                @endif
              @else
                @if (!empty($balance))
              <tr>
                <td>{!! Form::text('wodate', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'1', 'class' => 'form-control')) !!}</td>
                <td>{!! Form::text('wid', '', array('class' => 'form-control')) !!}</td>
                  <td>{!! Form::number('woqty', '' , array('class' => 'form-control', 'min'=>'0' , 'max'=>''.$balance->balwoqty.'','step'=>"any", 'id'=>'a11', 'v-model'=>'a11')) !!}</td>
                  <td>{!! Form::number('balwoqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a21', 'v-model'=>"a21", 'readonly'=>true)) !!}</td>
                <td>{!! Form::number('actqty', '', array('class' => 'form-control', 'min'=>'0', 'max'=>''.$balance->balactqty.'','step'=>"any", 'id'=>'a1', 'v-model'=>"a1")) !!}</td>
                <td>{!! Form::number('balactqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a2', 'v-model'=>"a2", 'readonly'=>true)) !!}</td>
                <td>{!! Form::text('remarks', '', array('class' => 'form-control')) !!}</td>
              </tr>
              @else
                <tr>
                  <td>{!! Form::text('wodate', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'1', 'class' => 'form-control')) !!}</td>
                  <td>{!! Form::text('wid', '', array('class' => 'form-control')) !!}</td>
                    <td>{!! Form::number('woqty', '' , array('class' => 'form-control', 'min'=>'0' , 'max'=>''.$sheet->qtyavail.'','step'=>"any", 'id'=>'a11', 'v-model'=>'a11')) !!}</td>
                    <td>{!! Form::number('balwoqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a21', 'v-model'=>"a21", 'readonly'=>true)) !!}</td>
                  <td>{!! Form::number('actqty', '', array('class' => 'form-control', 'min'=>'0', 'max'=>''.$sheet->actavail.'','step'=>"any", 'id'=>'a1', 'v-model'=>"a1")) !!}</td>
                  <td>{!! Form::number('balactqty', '', array('class' => 'form-control', 'min'=>'0','step'=>"any", 'id'=>'a2', 'v-model'=>"a2", 'readonly'=>true)) !!}</td>
                  <td>{!! Form::text('remarks', '', array('class' => 'form-control')) !!}</td>
                </tr>
              @endif
              @endif
              </tbody>
          </table>

        <div class="form-group row">
          <button type="submit" class="btn btn-success" value="Create">Create </button>
        </div>
        {!!Form::close();!!}
      </div>
        <div class="col-md-12">

          <table class="table table-bordered" id="users-table">
              <thead>
                  <tr>
                    {{-- <th>QTY (sheet) (MT)</th> --}}
                    <th>Wo Date</th>
                    <th>WO ID</th>
                    <th>WO QTY</th>
                    <th>Balance WO QTY(MT)</th>
                    <th>Actual Qty</th>
                    <th>Balance QTY(MT)</th>
                    <th>ACTION</th>
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
                      ajax:{
                        url: '{!! route('frontend.plan.tablebalance') !!}',
                        data: function(d) {
                             d.sheets_id = '{!! $sheet->id !!}';
                             d._token = '{{ csrf_token() }}';
                        }
                      },

                      "order": [[ 0, "desc" ]]
                  });
              });
          </script>
        </div>

      </div>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: "dd/mm/yy"
        });
      } );
      </script>
      <script>
      var vm = new Vue
      ({
              el:'#app',
              data : {
                a1: 0, a11:0
              },

              computed: {
                a2: function() {

                  var total=({!!$balact!!} - parseFloat(this.a1));
                  return total;
                },
                a21: function() {
                  var total=({!!$balwo!!} - parseFloat(this.a11));
                  return total;
                },

                a31: function() {
                  var total=({!!$balwo!!} - parseFloat(this.a11));
                  return total;
                },
              },
      });
      </script>
      {{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> --}}
      <script>
        $( function() {
          $( "#1" ).datepicker({
            dateFormat: "dd/mm/yy"
          });
        } );

        $( function() {
          $( "#2" ).datepicker({
            dateFormat: "dd/mm/yy"
          });
        } );
        </script>

@endsection
