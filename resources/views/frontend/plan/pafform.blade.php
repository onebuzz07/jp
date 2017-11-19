@extends('frontend.layouts.app')
@section('content')
  <h1>Planning Department</h1>
  @include('frontend.plan.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <h3 class="box-title"> {!! trans('PRODUCT AMENDMENT FORM') !!}</h3>

    <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
            <div class="col-lg-12">
              {!! Form::model($product, array('route' => array('frontend.plan.pafform', $product->id), 'method' => 'POST', 'files'=>true)) !!}
              <div class="form-group row ">
                {!! Form::label('remarkbig', 'Remarks ', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::textarea('remarkbig', $product->remarkbig , array('class' => 'form-control', 'id' => 'summernote')) !!}</div>
              </div>

              <div class="form-group row ">
                {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::checkbox('approval', 1, $sales->approval, array('class' => 'field', 'disabled'=>'disabled')) !!}</div>
              </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('datetime', $product->datetime->format('d/m/Y'), array('id'=>'datepicker2' , 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                  </div>
                  <div class="form-group row">
                    {!! Form::label('partDesc', 'Description', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('readonly'=>true , 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="form-group row">
                    {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo , array('readonly'=>true , 'class' => 'form-control ')) !!}</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    {!! Form::label('custName', 'Customer', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('readonly'=>true , 'class' => 'form-control ')) !!}</div>
                  </div>
                </div>

                    <div class="col-md-12 ">
                        <div class="form-group row">
                            {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                            <div class="col-md-10">
                                <div class="col-md-4">{!! Form::checkbox('material', 1, $product->material, array('class' => 'field', 'disabled'=>'disabled')) !!} Material
                                  <br>
                                {!! Form::checkbox('data', 1, $product->data, array('class' => 'field', 'disabled'=>'disabled')) !!} Data
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('artwork', 1, $product->artwork, array('class' => 'field', 'disabled'=>'disabled')) !!} Artwork
                                  <br>
                                {!! Form::checkbox('diecut', 1, $product->diecut, array('class' => 'field', 'disabled'=>'disabled')) !!} Die-cut out line
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('attachment', 1, $product->attachment, array('class' => 'field', 'disabled'=>'disabled')) !!} Refer to attachment (if use attachment section)</div>
                            </div>
                        </div>
                      </div>

                <div class="col-md-12" >
                    <div class="form-group row">
                      {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('revNo', $product->revNo , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      {{-- <p> To Pre Print:</p> --}}
                      {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('lot', $sales->lot , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, $sales->lotcheck,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('mfgDate', $sales->mfgDate , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, $sales->mfgcheck,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('expiryDate', $sales->expiryDate , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('expcheck', 1, $sales->expcheck,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      {!! Form::label('dateFacNo', 'Date & Fact No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('dateFacNo', $sales->dateFacNo , array( 'class' => 'form-control','disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('datecheck', 1, $sales->datecheck,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('packerID', $sales->packerID , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('packcheck', 1, $sales->packcheck,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      {!! Form::label('rawMaterial', 'Using:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('rawMaterial', $sales->items->rawMaterial , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('rawcheck', 1, $sales->items->rawcheck,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('batchbar', $sales->batchbar , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, $sales->batchcheck,   array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>

                      </div>
                    </div>

                <div class="col-md-12 ">
                  <div class="form-group row">
                    {!! Form::label('custDoc', 'Customers Document Provided', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        <div class="col-md-4">
                          {!! Form::checkbox('newArtwork', 1, $product->newArtwork, array('class' => 'field', 'disabled'=>'disabled')) !!} New Artwork
                            <br>
                          {!! Form::checkbox('films', 1, $product->films, array('class' => 'field', 'disabled'=>'disabled')) !!} Films
                            <br>
                          {!! Form::checkbox('technicalDrawing', 1, $product->technicalDrawing, array('class' => 'field', 'disabled'=>'disabled')) !!} Technical Drawing
                            <br>
                          {!! Form::checkbox('digitalProofing', 1, $product->digitalProofing, array('class' => 'field', 'disabled'=>'disabled')) !!} Digital Proofing
                            <br>
                          {!! Form::checkbox('artworkDrawing', 1, $product->artworkDrawing, array('class' => 'field', 'disabled'=>'disabled')) !!} Artwork Drawing
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('colorLimit',1, $product->colorLimit, array('class' => 'field', 'disabled'=>'disabled')) !!} Color Limit Sample
                            <br>
                          {!! Form::checkbox('bluePrint', 1, $product->bluePrint,array('class' => 'field', 'disabled'=>'disabled')) !!} Blue Print
                            <br>
                          {!! Form::checkbox('pmrf', 1, $product->pmrf, array('class' => 'field', 'disabled'=>'disabled')) !!} PMRF
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('other', 1,$product->other, array('class' => 'field', 'disabled'=>'disabled')) !!}  Others(Please specify)
                          {!! Form::textarea('other_text', $product->other_text, array('class'=>'form-control','disabled'=>'disabled', 'placeholder'=>'Please specify (if any)')) !!}
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                    <fieldset>
                    <div class="form-group row">
                      {!! Form::label('sampleSubReq', 'Sample Submission Request', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                        {!! Form::checkbox('yes', 1, null, array('class' => 'field', 'disabled'=>'disabled')) !!}  Yes &nbsp
                        {!! Form::checkbox('no', 1 ,null, array('class' => 'field', 'disabled'=>'disabled')) !!}  No
                      </div>
                    </div>
                  </fieldset>


                  <div class="col-md-12">

                      <div class="col-md-6">{!! Form::checkbox('customer',1, $product->customer, array('class' => 'field', 'disabled'=>'disabled')) !!} Customer/Advance </div>
                        <div class="col-md-6">
                          {!! Form::label('customer', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('customer_text', $product->customer_text, array('placeholder'=>'pcs','disabled'=>'disabled', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('qa', 1, $product->qa, array('class' => 'field', 'disabled'=>'disabled')) !!} QA </div>
                        <div class="col-md-6">
                          {!! Form::label('qa', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('qa_text', $product->qa_text, array('placeholder'=>'pcs','disabled'=>'disabled', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('production', 1, $product->production, array('class' => 'field', 'disabled'=>'disabled')) !!} Production </div>
                        <div class="col-md-6">
                          {!! Form::label('production', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('production_text', $product->production_text, array('placeholder'=>'pcs','disabled'=>'disabled', 'class' => 'form-control  ')) !!}</div>
                        </div>
                      <br>
                        <div class="col-md-12 ">
                          {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-5']) !!}
                          <div class="col-md-7">{!! Form::text('qtyOnHand', $product->qtyOnHand, array('placeholder'=>'pcs' ,'disabled'=>'disabled', 'class' => 'form-control ')) !!}</div>
                        </div>
                        <br>

                      <div class="col-md-12">
                        {!! Form::label('requiredDate', 'Date required', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">{!! Form::text('requiredDate', $product->requiredDate , array( 'id'=>'datepicker','class' => 'form-control', 'disabled'=>'disabled')) !!}</div>
                      </div>

                  </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('sampleSubPro', 'Sample Submission Process :', array('class' => 'col-md-5')) !!}
                        <br>
                        <div class="col-md-10">
                            {!! Form::checkbox('productionProcess', 1, $product->productionProcess, array('class' => 'field', 'disabled'=>'disabled')) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                            {!! Form::checkbox('handCutSubmission', 1, $product->handCutSubmission, array('class' => 'field', 'disabled'=>'disabled')) !!} Hand Cut Submission

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::checkbox('yes1', 1, $product->yes1, array('class' => 'field', 'disabled'=>'disabled')) !!} Yes &nbsp
                            {!! Form::checkbox('no1', 1, $product->no1, array('class' => 'field', 'disabled'=>'disabled')) !!} No
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                          <div class="col-md-4">
                            {!! Form::checkbox('wip', 1, $product->wip, array('class' => 'field', 'disabled'=>'disabled')) !!} WIP
                              <br><br>
                            {!! Form::checkbox('fg', 1, $product->fg,array('class' => 'field', 'disabled'=>'disabled')) !!} FG
                          </div>
                          <div class="col-md-4">
                            {!! Form::checkbox('disposeBalance', 1, $product->disposeBalance, array('class' => 'field', 'disabled'=>'disabled')) !!} Dispose
                              <br>
                            {!! Form::checkbox('rcp', 1, $product->rcp, array('class' => 'field', 'disabled'=>'disabled')) !!} Running Charge Part (RCP)
                            <br>
                            {!! Form::checkbox('cutoff', 1, $product->cutoff, array('class' => 'field', 'disabled'=>'disabled')) !!} Cut-off lot
                              <br>
                            {!! Form::checkbox('kiv', 1, $product->kiv, array('class' => 'field', 'disabled'=>'disabled')) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                          </div>
                          <div class="col-md-4">
                            {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                            <div class="col-md-12">{!! Form::text('workOrderID',$product->workOrderID, array('disabled'=>'disabled','placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control')) !!}</div>
                          </div>

                        </div>
                    </div>
                  </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('advisePlate', 'Advise Plate/Film (by CTP)', array('class' => 'col-md-12')) !!}
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('ctpPlate', 'Plate', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, array('class' => 'field', 'disabled'=>'disabled')) !!} Not Available (N/A)
                                <br>
                              {!! Form::checkbox('dispose1', 1, $product->dispose1,array('class' => 'field', 'disabled'=>'disabled')) !!} Dispose
                              {!! Form::text('ctpPlate_text', $product->ctpPlate_text, array('class' => 'form-control ', 'disabled'=>'disabled')) !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, array('class' => 'field', 'disabled'=>'disabled')) !!} Not Available (N/A)
                                <br>
                              {!! Form::checkbox('dispose2', 1, $product->dispose2, array('class' => 'field', 'disabled'=>'disabled')) !!} Dispose
                              {!! Form::text('film_text',$product->film_text,array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseBy', 'Advise By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('adviseBy', $product->adviseBy, array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('issueBy', 'Issue By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('issueBy',$product->issueBy, array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                    <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)">  </input>
                  </div>


              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>


<script>
  $( function() {
      $( "#datepicker" ).datepicker({
      dateFormat: "dd/mm/yy"
        });
    } );
    $( function() {
        $( "#datepicker2" ).datepicker({
        dateFormat: "dd/mm/yy"
          });
      } );
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script type="text/javascript">
       $(document).ready(function() {
           $('#summernote').summernote('disable');
       });
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

@endsection
