@extends('frontend.layouts.app')

@section('content')
  <h1>Sales Marketing Department</h1>
  @include('frontend.slsmark.includes.nav')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <h3 class="box-title"> {!! trans('PRODUCT AMENDMENT FORM') !!}</h3>

    <div class="container-fluid">
        <div class="row" id="app">
          <div class="col-lg-12">
            <div class="col-lg-12">
              {!! Form::model($repeat, array('route' => array('frontend.slsmark.storepafrepeat', $repeat->id), 'method' => 'POST', 'files'=>true)) !!}

              <div class="form-group row ">
                {!! Form::label('remarkbig', 'Remarks ', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::textarea('remarkbig',null, array('class' => 'form-control', 'id'=>'summernote')) !!}</div>
              </div>

                <div class="form-group row ">
                  {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
                  <div class="col-md-10">{!! Form::checkbox('approval', 1, $repeat->approval, array('readonly'=>true,'class' => 'field')) !!}</div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('datetime',\Carbon\carbon::now()->format('d/m/Y'), array('id'=>'datepicker2', 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="form-group row">
                    {!! Form::label('partDesc', 'Description', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('partDesc', $repeat->items->partDesc, array('disabled'=>'disabled' , 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="form-group row">
                    {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('partNo', $repeat->items->partNo , array('disabled'=>'disabled' , 'class' => 'form-control ')) !!}</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    {!! Form::label('custName', 'Customer', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('custName', $repeat->custName, array('disabled'=>'disabled' , 'class' => 'form-control ')) !!}</div>
                  </div>
                </div>

                @if (access()->hasPermissions(['sales-marketing']))

                    <div class="col-md-12 ">
                        <div class="form-group row">
                            {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                            <div class="col-md-10">
                                <div class="col-md-4">{!! Form::checkbox('material', 1, null, ['class' => 'field']) !!} Material
                                  <br>
                                {!! Form::checkbox('data', 1, null, ['class' => 'field']) !!} Data
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('artwork', 1, null, ['class' => 'field']) !!} Artwork
                                  <br>
                                {!! Form::checkbox('diecut', 1, null, ['class' => 'field']) !!} Die-cut out line
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('attachment', 1, null, ['class' => 'field']) !!} Refer to attachment (if use attachment section)</div>
                            </div>
                        </div>
                      </div>

                @else
                  <div class="col-md-12 ">
                      <div class="form-group row">
                          {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              <div class="col-md-4">{!! Form::checkbox('material', 1, null, ['class' => 'field', 'disabled'=>'disabled']) !!} Material
                                <br>
                              {!! Form::checkbox('data', 1, null, ['class' => 'field', 'disabled'=>'disabled']) !!} Data
                            </div>
                              <div class="col-md-4">{!! Form::checkbox('artwork', 1, null, ['class' => 'field', 'disabled'=>'disabled']) !!} Artwork
                                <br>
                              {!! Form::checkbox('diecut', 1, null, ['class' => 'field', 'disabled'=>'disabled']) !!} Die-cut out line
                            </div>
                              <div class="col-md-4">{!! Form::checkbox('attachment', 1, null, ['class' => 'field', 'disabled'=>'disabled']) !!} Refer to attachment (if use attachment section)</div>
                          </div>
                      </div>
                    </div>

              @endif

              @if (access()->hasPermissions(['sales-marketing']))
                <div class="col-md-12" >
                    <div class="form-group row">
                      {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('revNo', $repeat->rsc_number , array( 'class' => 'form-control ')) !!}</div>
                      {{-- <p> To Pre Print:</p> --}}
                      {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('lot', $repeat->lot , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('mfgDate', $repeat->mfgDate , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('expiryDate', $repeat->expiryDate , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('expcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('dateFacNo', 'Date & Fact No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('dateFacNo', $repeat->dateFacNo , array( 'class' => 'form-control')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('datecheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('packerID', $repeat->packerID , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('packcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('rawMaterial', 'Using:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('rawMaterial', $repeat->items->rawMaterial , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('rawcheck', 1, '', ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('batchbar', $repeat->batchbar , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, '',  array( 'class' => 'field ')) !!} N/A</div>

                      </div>
                    </div>
              @else
                <div class="col-md-12" >
                  <div class="form-group row">
                    {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('sco_number', $repeat->sco_number , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    {{-- <p> To Pre Print:</p> --}}
                    {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('lot', $repeat->lot , array( 'class' => 'form-control', 'disabled'=>'disabled',)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, '',  array( 'class' => 'field','disabled'=>'disabled')) !!} N/A</div>

                    {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('mfgDate', $repeat->mfgDate , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, '', array( 'class' => 'field ','disabled'=>'disabled')) !!} N/A</div>

                    {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('expiryDate', $repeat->expiryDate , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('expcheck', 1, '',  array( 'class' => 'field ','disabled'=>'disabled')) !!} N/A</div>

                    {!! Form::label('dateFacNo', 'Date & Fact No:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('dateFacNo', $repeat->dateFacNo , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('datecheck', 1, '',  array( 'class' => 'field ','disabled'=>'disabled')) !!} N/A</div>

                    {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('packerID', $repeat->packerID , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('packcheck', 1, '',  array( 'class' => 'field ','disabled'=>'disabled')) !!} N/A</div>

                    {!! Form::label('rawMaterial', 'Using:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('rawMaterial', $repeat->items->rawMaterial , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('rawcheck', 1, '',  array( 'class' => 'field ','disabled'=>'disabled')) !!} N/A</div>

                    {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('batchbar', $repeat->batchbar , array( 'class' => 'form-control ','disabled'=>'disabled')) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, '',  array( 'class' => 'field ','disabled'=>'disabled')) !!} N/A</div>

                    </div>
                </div>
              @endif

              @if (access()->hasPermissions(['sales-marketing']))
                <div class="col-md-12 ">
                  <div class="form-group row">
                    {!! Form::label('custDoc', 'Customers Document Provided', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        <div class="col-md-4">
                          {!! Form::checkbox('newArtwork', 1, null, ['class' => 'field']) !!} New Artwork
                            <br>
                          {!! Form::checkbox('films', 1, null, ['class' => 'field']) !!} Films
                            <br>
                          {!! Form::checkbox('technicalDrawing', 1, null, ['class' => 'field']) !!} Technical Drawing
                            <br>
                          {!! Form::checkbox('digitalProofing', 1, null, ['class' => 'field']) !!} Digital Proofing
                            <br>
                          {!! Form::checkbox('artworkDrawing', 1, null, ['class' => 'field']) !!} Artwork Drawing
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('colorLimit',1, null, ['class' => 'field']) !!} Color Limit Sample
                            <br>
                          {!! Form::checkbox('bluePrint', 1, null, ['class' => 'field']) !!} Blue Print
                            <br>
                          {!! Form::checkbox('pmrf', 1, null, ['class' => 'field']) !!} PMRF
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('other', 1,null , ['class' => 'field']) !!}  Others(Please specify)
                          {!! Form::textarea('other_text',null, array('class'=>'form-control', 'placeholder'=>'Please specify (if any)')) !!}
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                    <fieldset>
                    <div class="form-group row">
                      {!! Form::label('sampleSubReq', 'Sample Submission Request', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                        {!! Form::checkbox('yes', 1, null, ['class' => 'field']) !!}  Yes &nbsp
                        {!! Form::checkbox('no', 1, null , ['class' => 'field']) !!}  No
                      </div>
                    </div>
                  </fieldset>


                  <div class="col-md-12">

                      <div class="col-md-6">{!! Form::checkbox('customer',1, null, ['class' => 'field']) !!} Customer/Advance </div>
                        <div class="col-md-6">
                          {!! Form::label('customer', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('customer_text', null, array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('qa', 1, null, ['class' => 'field']) !!} QA </div>
                        <div class="col-md-6">
                          {!! Form::label('qa', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('qa_text', null, array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('production', 1, null, ['class' => 'field']) !!} Production </div>
                        <div class="col-md-6">
                          {!! Form::label('production', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('production_text', null, array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                      <br>
                        <div class="col-md-12 ">
                          {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-5']) !!}
                          <div class="col-md-7">{!! Form::text('qtyOnHand', null, array('placeholder'=>'pcs' , 'class' => 'form-control ')) !!}</div>
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
                        {!! Form::checkbox('productionProcess', 1, null, ['class' => 'field']) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                        {!! Form::checkbox('handCutSubmission', 1, null, ['class' => 'field']) !!} Hand Cut Submission

                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        {!! Form::checkbox('yes1', 1, null, ['class' => 'field']) !!} Yes &nbsp
                        {!! Form::checkbox('no1', 1, null, ['class' => 'field']) !!} No

                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                      <div class="col-md-4">
                        {!! Form::checkbox('wip', 1, null, ['class' => 'field']) !!} WIP
                          <br><br>
                        {!! Form::checkbox('fg', 1, null, ['class' => 'field']) !!} FG
                      </div>
                      <div class="col-md-4">
                        {!! Form::checkbox('disposeBalance', 1, null, ['class' => 'field']) !!} Dispose
                          <br>
                        {!! Form::checkbox('rcp', 1, null, ['class' => 'field']) !!} Running Charge Part (RCP)
                        <br>
                        {!! Form::checkbox('cutoff', 1, null, ['class' => 'field']) !!} Cut-off lot
                          <br>
                        {!! Form::checkbox('kiv', 1, null, ['class' => 'field']) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                      </div>
                      <div class="col-md-4">
                        {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                        <div class="col-md-12">{!! Form::text('workOrderID',null, array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control')) !!}</div>
                      </div>

                    </div>
                </div>
              </div>
              @else
                <div class="col-md-12 ">
                  <div class="form-group row">
                    {!! Form::label('custDoc', 'Customers Document Provided', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        <div class="col-md-4">
                          {!! Form::checkbox('newArtwork', 1, null, array('class' => 'field', 'readonly'=>true)) !!} New Artwork
                            <br>
                          {!! Form::checkbox('films', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Films
                            <br>
                          {!! Form::checkbox('technicalDrawing', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Technical Drawing
                            <br>
                          {!! Form::checkbox('digitalProofing', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Digital Proofing
                            <br>
                          {!! Form::checkbox('artworkDrawing', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Artwork Drawing
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('colorLimit',1, null, array('class' => 'field', 'readonly'=>true)) !!} Color Limit Sample
                            <br>
                          {!! Form::checkbox('bluePrint', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Blue Print
                            <br>
                          {!! Form::checkbox('pmrf', 1, null, array('class' => 'field', 'readonly'=>true)) !!} PMRF
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('other', 1,null, ['class' => 'field']) !!}  Others(Please specify)
                          {!! Form::textarea('other_text',null, array('class'=>'form-control', 'placeholder'=>'Please specify (if any)', 'readonly'=>true)) !!}
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                    <fieldset>
                    <div class="form-group row">
                      {!! Form::label('sampleSubReq', 'Sample Submission Request', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                        {!! Form::checkbox('yes', 1, null, array('class' => 'field', 'readonly'=>true)) !!}  Yes &nbsp
                        {!! Form::checkbox('no', 1 ,null, array('class' => 'field', 'readonly'=>true)) !!}  No
                      </div>
                    </div>
                  </fieldset>


                      <div class="col-md-12">

                          <div class="col-md-6">{!! Form::checkbox('customer',1, null, array('class' => 'field', 'readonly'=>true)) !!} Customer/Advance </div>
                            <div class="col-md-6">
                              {!! Form::label('customer', 'QTY: ', array('class' => 'col-md-2')) !!}
                              <div class="col-md-10"> {!! Form::text('customer_text', null, array('placeholder'=>'pcs', 'class' => 'form-control', 'readonly'=>true)) !!}</div>
                            </div>
                              <br>
                            <div class="col-md-6">{!! Form::checkbox('qa', 1, null, array('class' => 'field', 'readonly'=>true)) !!} QA </div>
                            <div class="col-md-6">
                              {!! Form::label('qa', 'QTY: ', array('class' => 'col-md-2')) !!}
                              <div class="col-md-10"> {!! Form::text('qa_text', null, array('placeholder'=>'pcs', 'class' => 'form-control', 'readonly'=>true)) !!}</div>
                            </div>
                              <br>
                            <div class="col-md-6">{!! Form::checkbox('production', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Production </div>
                            <div class="col-md-6">
                              {!! Form::label('production', 'QTY: ', array('class' => 'col-md-2')) !!}
                              <div class="col-md-10"> {!! Form::text('production_text', null, array('placeholder'=>'pcs', 'class' => 'form-control  ', 'readonly'=>true)) !!}</div>
                            </div>
                          <br>
                            <div class="col-md-12 ">
                              {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-5']) !!}
                              <div class="col-md-7">{!! Form::text('qtyOnHand', null, array('placeholder'=>'pcs', 'readonly'=>true , 'class' => 'form-control ')) !!}</div>
                            </div>
                            <br>

                          <div class="col-md-12">
                            {!! Form::label('requiredDate', 'Date required', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">{!! Form::text('requiredDate', \Carbon\Carbon::now()->format('d/m/Y'), array('id'=>'datepicker', 'class' => 'form-control', 'readonly'=>true)) !!}</div>
                          </div>

                      </div>

                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('sampleSubPro', 'Sample Submission Process :', array('class' => 'col-md-5')) !!}
                        <br>
                        <div class="col-md-10">
                            {!! Form::checkbox('productionProcess', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                            {!! Form::checkbox('handCutSubmission', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Hand Cut Submission

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::checkbox('yes1', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Yes &nbsp
                            {!! Form::checkbox('no1', 1, null, array('class' => 'field', 'readonly'=>true)) !!} No

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                          <div class="col-md-4">
                            {!! Form::checkbox('wip', 1, null, array('class' => 'field', 'readonly'=>true)) !!} WIP
                              <br><br>
                            {!! Form::checkbox('fg', 1, null, array('class' => 'field', 'readonly'=>true))!!} FG
                          </div>
                          <div class="col-md-4">
                            {!! Form::checkbox('disposeBalance', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Dispose
                              <br>
                            {!! Form::checkbox('rcp', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Running Charge Part (RCP)
                            <br>
                            {!! Form::checkbox('cutoff', 1, null, array('class' => 'field', 'readonly'=>true))!!} Cut-off lot
                              <br>
                            {!! Form::checkbox('kiv', 1, null, array('class' => 'field', 'readonly'=>true)) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                          </div>
                          <div class="col-md-4">
                            {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                            <div class="col-md-12">{!! Form::text('workOrderID',null, array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control', 'readonly'=>true)) !!}</div>
                          </div>
                        </div>
                    </div>
                  </div>
                @endif

                @if (access()->hasPermissions(['printing']))
                  <div class="col-md-12">
                    <div class="form-group row">
                      {!! Form::label('advisePlate', 'Advise Plate/Film (by CTP)', array('class' => 'col-md-12')) !!}
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      {!! Form::label('ctpPlate', 'Plate', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                          {!! Form::checkbox('notAvailable1', 1, null, ['class' => 'field']) !!} Not Available (N/A)
                            <br>
                          {!! Form::checkbox('dispose1', 1,null, ['class' => 'field']) !!} Dispose
                          {!! Form::text('ctpPlate_text', null, array('class' => 'form-control ')) !!}
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                          {!! Form::checkbox('notAvailable2', 1, '', ['class' => 'field']) !!} Not Available (N/A)
                            <br>
                          {!! Form::checkbox('dispose2', 1, null, ['class' => 'field']) !!} Dispose
                          {!! Form::text('film_text',null,array( 'class' => 'form-control ')) !!}
                      </div>
                  </div>
                </div>

                @else
                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('advisePlate', 'Advise Plate/Film (by CTP)', array('class' => 'col-md-12')) !!}
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('ctpPlate', 'Plate', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        {!! Form::checkbox('notAvailable1', 1, '', array('class' => 'field', 'disabled'=>'disabled')) !!} Not Available (N/A)
                          <br>
                        {!! Form::checkbox('dispose1', 1,null, array('class' => 'field', 'disabled'=>'disabled')) !!} Dispose
                        {!! Form::text('ctpPlate_text',null, array('class' => 'form-control ', 'readonly'=>true)) !!}
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        {!! Form::checkbox('notAvailable2', 1, null, array('class' => 'field', 'disabled'=>'disabled')) !!} Not Available (N/A)
                          <br>
                        {!! Form::checkbox('dispose2', 1, null, array('class' => 'field', 'disabled'=>'disabled')) !!} Dispose
                        {!! Form::text('film_text', null, array( 'class' => 'form-control ', 'readonly'=>true)) !!}
                    </div>
                </div>
              </div>
              @endif

            @if (access()->hasPermissions(['sales-marketing', 'printing']))
                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('adviseBy', 'Advise By', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        {!! Form::text('adviseBy', null, array( 'class' => 'form-control ')) !!}
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

                <div class="col-md-12">
                  <div class="form-group row ">
                    {{ Form::label('images[]', 'Files(If any)', array('class' => 'control-label col-md-2')) }}
                    <div class="col-md-10">
                    <input multiple="multiple" class="btn btn-default btn-file " name="images[]" type="file" id="images[]">
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
                </div>
              @else
                <br>
                <input type="button" class="btn btn-success btn-block" value="BACK" onclick="history.go(-1)"></input>
              @endif
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
{{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> --}}
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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
