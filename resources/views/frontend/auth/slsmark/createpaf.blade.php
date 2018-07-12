@extends('frontend.layouts.app')
@section('content')
  <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <h3 class="box-title"> {!! trans('PRODUCT AMENDMENT FORM') !!}</h3>

    <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
            <div class="col-lg-12">
              {!! Form::model($salesqad, array('route' => array('frontend.slsmark.storepaf', $salesqad->id), 'method' => 'POST', 'files'=>true)) !!}

              <div class="col-md-6">
                <div class="form-group row">
                  {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('datetime',\Carbon\carbon::now()->format('d/m/Y'), array('id'=>'datepicker2', 'class' => 'form-control ')) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('oldpartno', 'Old Part Number', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('oldpartno', '' , array( 'class' => 'form-control ')) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partNo', $salesqad->Item_Number , array( 'class' => 'form-control ')) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('partDesc', '1st Description', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partDesc', $salesqad->Description, array('class' => 'form-control ')) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('partDesc', '2nd Description', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partDesc2', $salesqad->Description_1, array('class' => 'form-control ')) !!}</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  {!! Form::label('custName', 'Customer', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('custName', $salesqad->Name, array( 'class' => 'form-control ')) !!}</div>
                </div>
              </div>

                    <div class="col-md-12 ">
                        <div class="form-group row">
                            {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                            <div class="col-md-10">
                                <div class="col-md-4">{!! Form::checkbox('material', 1, '', ['class' => 'field']) !!} Material
                                  <br>
                                {!! Form::checkbox('data', 1, '', ['class' => 'field']) !!} Data
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('artwork', 1, '', ['class' => 'field']) !!} Artwork
                                  <br>
                                {!! Form::checkbox('diecut', 1, '', ['class' => 'field']) !!} Die-cut out line
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('attachment', 1, '', ['class' => 'field']) !!} Refer to attachment (if use attachment section)</div>
                            </div>
                        </div>
                      </div>

                <div class="col-md-12" >
                    <div class="form-group row">
                      {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('revNo', '', array( 'class' => 'form-control ')) !!}</div>
                      {{-- <p> To Pre Print:</p> --}}
                      {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('lot', '', array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('mfgDate', '' , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('expiryDate','' , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('expcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('dateFacNo', 'Date & Fact No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('dateFacNo', '' , array( 'class' => 'form-control')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('datecheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('packerID', '' , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('packcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('rawMaterial', 'Using:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('rawMaterial', '' , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('rawcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('batchbar', '' , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, '',  array( 'class' => 'field ')) !!} N/A</div>

                      {!! Form::label('size', 'Size :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('size','' , array( 'class' => 'form-control ')) !!}</div>

                      {!! Form::label('rawMaterial', 'Raw Material :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('rawMaterial', '', array( 'class' => 'form-control ')) !!}</div>

                      {!! Form::label('noPages', 'No of Pages :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('noPages', '' , array( 'class' => 'form-control ')) !!}</div>

                      {!! Form::label('colour', 'Colour :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('colour', '', array( 'class' => 'form-control ')) !!}</div>

                      {!! Form::label('finishing', 'Finishing :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('finishing', '' , array( 'class' => 'form-control ')) !!}</div>

                      </div>
                      <div class="form-group row ">
                        {!! Form::label('remarkbig', 'Remarks ', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">{!! Form::textarea('remarkbig', '<br>' , array( 'class' => 'form-control', 'id' => 'summernote')) !!}</div>
                      </div>
                    </div>
                <div class="col-md-12 ">
                  <div class="form-group row">
                    {!! Form::label('custDoc', 'Customers Document Provided', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        <div class="col-md-4">
                          {!! Form::checkbox('newArtwork', 1, '', ['class' => 'field']) !!} New Artwork
                            <br>
                          {!! Form::checkbox('films', 1, '', ['class' => 'field']) !!} Films
                            <br>
                          {!! Form::checkbox('technicalDrawing', 1, '', ['class' => 'field']) !!} Technical Drawing
                            <br>
                          {!! Form::checkbox('digitalProofing', 1, '', ['class' => 'field']) !!} Digital Proofing
                            <br>
                          {!! Form::checkbox('artworkDrawing', 1, '', ['class' => 'field']) !!} Artwork Drawing
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('colorLimit',1, '', ['class' => 'field']) !!} Color Limit Sample
                            <br>
                          {!! Form::checkbox('bluePrint', 1, '', ['class' => 'field']) !!} Blue Print
                            <br>
                          {!! Form::checkbox('pmrf', 1, '', ['class' => 'field']) !!} PMRF
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('other', 1,'', ['class' => 'field']) !!}  Others(Please specify)
                          {!! Form::textarea('other_text', '', ['class'=>'form-control', 'placeholder'=>'Please specify (if any)','cols'=>25, 'rows'=>3] ) !!}
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

                      <div class="col-md-6">{!! Form::checkbox('customer',1, '', ['class' => 'field']) !!} Customer/Advance </div>
                        <div class="col-md-6">
                          {!! Form::label('customer', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('customer_text', '', array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('qa', 1, '', ['class' => 'field']) !!} QA </div>
                        <div class="col-md-6">
                          {!! Form::label('qa', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('qa_text', '', array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('production', 1, '', ['class' => 'field']) !!} Production </div>
                        <div class="col-md-6">
                          {!! Form::label('production', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('production_text','', array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                      <br>
                        <div class="col-md-12 ">
                          {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-5']) !!}
                          <div class="col-md-7">{!! Form::text('qtyOnHand', '', array('placeholder'=>'pcs' , 'class' => 'form-control ')) !!}</div>
                        </div>
                        <br>

                      <div class="col-md-12">
                        {!! Form::label('requiredDate', 'Date required', ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">{!! Form::text('requiredDate', \Carbon\Carbon::now()->format('d/m/Y'), array( 'id'=>'datepicker','class' => 'form-control')) !!}</div>
                      </div>

                  </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('sampleSubPro', 'Sample Submission Process :', array('class' => 'col-md-5')) !!}
                        <br>
                        <div class="col-md-10">
                            {!! Form::checkbox('productionProcess', 1, '', ['class' => 'field']) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                            {!! Form::checkbox('handCutSubmission', 1, '', ['class' => 'field']) !!} Hand Cut Submission

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::checkbox('yes1', 1, '', ['class' => 'field']) !!} Yes &nbsp
                            {!! Form::checkbox('no1', 1, '', ['class' => 'field']) !!} No

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                          <div class="col-md-4">
                            {!! Form::checkbox('wip', 1, '', ['class' => 'field']) !!} WIP
                              <br><br>
                            {!! Form::checkbox('fg', 1, '', ['class' => 'field']) !!} FG
                          </div>
                          <div class="col-md-4">
                            {!! Form::checkbox('disposeBalance', 1, '', ['class' => 'field']) !!} Dispose
                              <br>
                            {!! Form::checkbox('rcp', 1, '', ['class' => 'field']) !!} Running Charge Part (RCP)
                            <br>
                            {!! Form::checkbox('cutoff', 1, '', ['class' => 'field']) !!} Cut-off lot
                              <br>
                            {!! Form::checkbox('kiv', 1, '', ['class' => 'field']) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                          </div>
                          <div class="col-md-4">
                            {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                            <div class="col-md-12">{!! Form::text('workOrderID','', array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control')) !!}</div>
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
                              {!! Form::checkbox('notAvailable1', 1, '', ['class' => 'field']) !!} Not Available (N/A)
                                <br>
                              {!! Form::checkbox('dispose1', 1,'' , ['class' => 'field']) !!} Dispose
                              {!! Form::text('ctpPlate_text', '', array('class' => 'form-control ')) !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              {!! Form::checkbox('notAvailable2', 1, '', ['class' => 'field']) !!} Not Available (N/A)
                                <br>
                              {!! Form::checkbox('dispose2', 1, '', ['class' => 'field']) !!} Dispose
                              {!! Form::text('film_text','',array( 'class' => 'form-control ')) !!}
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseBy', 'Advise By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('adviseBy', '', array( 'class' => 'form-control ')) !!}
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('issueBy', 'Issue By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('issueBy', Auth::user()->first_name.' '.Auth::user()->last_name, array( 'class' => 'form-control ')) !!}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
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
           $('#summernote').summernote({
             height:150,
           });
       });
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

@endsection
