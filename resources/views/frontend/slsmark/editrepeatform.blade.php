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
              {!! Form::model($repeat, array('route' => array('frontend.slsmark.storeform', $repeat->id), 'method' => 'POST', 'files'=>true)) !!}

              {!! Form::hidden('paf_number', $product->paf_number , array('class' => 'form-control')) !!}

              <div class="form-group row ">
                {!! Form::label('remarkbig', 'Remarks ', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::textarea('remarkbig', $product->remarkbig , array('class' => 'form-control', 'id' => 'summernote')) !!}</div>
              </div>

              <div class="form-group row ">
                {!! Form::label('approval', 'Customer Approval? ', array('class' => 'col-md-2')) !!}
                <div class="col-md-10">{!! Form::checkbox('approval', 1, $repeat->approval, ['class' => 'field']) !!}</div>
              </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('datetime', \Carbon\carbon::now()->format('d/m/Y'), array('id'=>'datepicker2' , 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="form-group row">
                    {!! Form::label('partDesc', 'Description', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('partDesc', $repeat->items->partDesc, array('readonly'=>true , 'class' => 'form-control ')) !!}</div>
                  </div>
                  <div class="form-group row">
                    {!! Form::label('partNo', 'Part Number', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('partNo', $repeat->items->partNo , array('readonly'=>true , 'class' => 'form-control ')) !!}</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    {!! Form::label('custName', 'Customer', ['class' => 'col-md-2']) !!}
                    <div class="col-md-10">{!! Form::text('custName', $repeat->custName, array('readonly'=>true , 'class' => 'form-control ')) !!}</div>
                  </div>
                </div>

                @if (access()->hasPermissions(['sales-marketing']))

                    <div class="col-md-12 ">
                        <div class="form-group row">
                            {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                            <div class="col-md-10">
                                <div class="col-md-4">{!! Form::checkbox('material', 1, $product->material, ['class' => 'field']) !!} Material
                                  <br>
                                {!! Form::checkbox('data', 1, $product->data, ['class' => 'field']) !!} Data
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('artwork', 1, $product->artwork, ['class' => 'field']) !!} Artwork
                                  <br>
                                {!! Form::checkbox('diecut', 1, $product->diecut, ['class' => 'field']) !!} Die-cut out line
                              </div>
                                <div class="col-md-4">{!! Form::checkbox('attachment', 1, $product->attachment, ['class' => 'field']) !!} Refer to attachment (if use attachment section)</div>
                            </div>
                        </div>
                      </div>

                @else
                  <div class="col-md-12 ">
                      <div class="form-group row">
                          {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              <div class="col-md-4">{!! Form::checkbox('material', 1, $product->material, ['class' => 'field', 'readonly'=>true]) !!} Material
                                <br>
                              {!! Form::checkbox('data', 1, $product->data, ['class' => 'field', 'readonly'=>true]) !!} Data
                            </div>
                              <div class="col-md-4">{!! Form::checkbox('artwork', 1, $product->artwork, ['class' => 'field', 'readonly'=>true]) !!} Artwork
                                <br>
                              {!! Form::checkbox('diecut', 1, $product->diecut, ['class' => 'field', 'readonly'=>true]) !!} Die-cut out line
                            </div>
                              <div class="col-md-4">{!! Form::checkbox('attachment', 1, $product->attachment, ['class' => 'field', 'readonly'=>true]) !!} Refer to attachment (if use attachment section)</div>
                          </div>
                      </div>
                    </div>

              @endif

              @if (access()->hasPermissions(['sales-marketing']))
                <div class="col-md-12" >
                    <div class="form-group row">
                      {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('revNo', $product->revNo , array( 'class' => 'form-control ')) !!}</div>
                      {{-- <p> To Pre Print:</p> --}}
                      {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('lot', $repeat->lot , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, $repeat->lotcheck, ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('mfgDate', $repeat->mfgDate , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, $repeat->mfgcheck, ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('expiryDate', $repeat->expiryDate , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('expcheck', 1, $repeat->expcheck, ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('dateFacNo', 'Date & Fact No:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('dateFacNo', $repeat->dateFacNo , array( 'class' => 'form-control')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('datecheck', 1, $repeat->datecheck, ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('packerID', $repeat->packerID , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('packcheck', 1, $repeat->packcheck, ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('rawMaterial', 'Using:', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('rawMaterial', $repeat->items->rawMaterial , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('rawcheck', 1, $repeat->items->rawcheck, ['class' => 'field']) !!} N/A</div>

                      {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-9">{!! Form::text('batchbar', $repeat->batchbar , array( 'class' => 'form-control ')) !!}</div>
                      <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, $repeat->batchcheck,  array( 'class' => 'field ')) !!} N/A</div>

                      </div>
                    </div>
              @else
                <div class="col-md-12" >
                  <div class="form-group row">
                    {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('sco_number', $repeat->sco_number , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    {{-- <p> To Pre Print:</p> --}}
                    {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('lot', $repeat->lot , array( 'class' => 'form-control', 'readonly'=>true,)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, $repeat->lotcheck,  array( 'class' => 'field','readonly'=>true)) !!} N/A</div>

                    {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('mfgDate', $repeat->mfgDate , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, $repeat->mfgcheck, array( 'class' => 'field ','readonly'=>true)) !!} N/A</div>

                    {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('expiryDate', $repeat->expiryDate , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('expcheck', 1, $repeat->expcheck,  array( 'class' => 'field ','readonly'=>true)) !!} N/A</div>

                    {!! Form::label('dateFacNo', 'Date & Fact No:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('dateFacNo', $repeat->dateFacNo , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('datecheck', 1, $repeat->datecheck,  array( 'class' => 'field ','readonly'=>true)) !!} N/A</div>

                    {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('packerID', $repeat->packerID , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('packcheck', 1, $repeat->packcheck,  array( 'class' => 'field ','readonly'=>true)) !!} N/A</div>

                    {!! Form::label('rawMaterial', 'Using:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('rawMaterial', $repeat->items->rawMaterial , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('rawcheck', 1,$repeat->items->rawcheck,  array( 'class' => 'field ','readonly'=>true)) !!} N/A</div>

                    {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('batchbar', $repeat->batchbar , array( 'class' => 'form-control ','readonly'=>true)) !!}</div>
                    <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, $repeat->batchcheck,  array( 'class' => 'field ','readonly'=>true)) !!} N/A</div>

                    </div>
                </div>
              @endif

              @if (access()->hasPermissions(['sales-marketing']))
                <div class="col-md-12 ">
                  <div class="form-group row">
                    {!! Form::label('custDoc', 'Customers Document Provided', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        <div class="col-md-4">
                          {!! Form::checkbox('newArtwork', 1, $product->newArtwork, ['class' => 'field']) !!} New Artwork
                            <br>
                          {!! Form::checkbox('films', 1, $product->films, ['class' => 'field']) !!} Films
                            <br>
                          {!! Form::checkbox('technicalDrawing', 1, $product->technicalDrawing, ['class' => 'field']) !!} Technical Drawing
                            <br>
                          {!! Form::checkbox('digitalProofing', 1, $product->digitalProofing, ['class' => 'field']) !!} Digital Proofing
                            <br>
                          {!! Form::checkbox('artworkDrawing', 1, $product->artworkDrawing, ['class' => 'field']) !!} Artwork Drawing
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('colorLimit',1, $product->colorLimit, ['class' => 'field']) !!} Color Limit Sample
                            <br>
                          {!! Form::checkbox('bluePrint', 1, $product->bluePrint, ['class' => 'field']) !!} Blue Print
                            <br>
                          {!! Form::checkbox('pmrf', 1, $product->pmrf, ['class' => 'field']) !!} PMRF
                        </div>
                        <div class="col-md-4">
                          {!! Form::checkbox('other', 1,$product->other, ['class' => 'field']) !!}  Others(Please specify)
                          {!! Form::textarea('other_text', $product->other_text, array('class'=>'form-control', 'placeholder'=>'Please specify (if any)')) !!}
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

                      <div class="col-md-6">{!! Form::checkbox('customer',1, $product->customer, ['class' => 'field']) !!} Customer/Advance </div>
                        <div class="col-md-6">
                          {!! Form::label('customer', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('customer_text', $product->customer_text, array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('qa', 1, $product->qa, ['class' => 'field']) !!} QA </div>
                        <div class="col-md-6">
                          {!! Form::label('qa', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('qa_text', $product->qa_text, array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                          <br>
                        <div class="col-md-6">{!! Form::checkbox('production', 1, $product->production, ['class' => 'field']) !!} Production </div>
                        <div class="col-md-6">
                          {!! Form::label('production', 'QTY: ', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10"> {!! Form::text('production_text', $product->production_text, array('placeholder'=>'pcs', 'class' => 'form-control  ')) !!}</div>
                        </div>
                      <br>
                        <div class="col-md-12 ">
                          {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-5']) !!}
                          <div class="col-md-7">{!! Form::text('qtyOnHand', $product->qtyOnHand, array('placeholder'=>'pcs' , 'class' => 'form-control ')) !!}</div>
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
                            {!! Form::checkbox('productionProcess', 1, $product->productionProcess, ['class' => 'field']) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                            {!! Form::checkbox('handCutSubmission', 1, $product->handCutSubmission, ['class' => 'field']) !!} Hand Cut Submission

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::checkbox('yes1', 1, $product->yes1, ['class' => 'field']) !!} Yes &nbsp
                            {!! Form::checkbox('no1', 1, $product->no1, ['class' => 'field']) !!} No

                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                          <div class="col-md-4">
                            {!! Form::checkbox('wip', 1, $product->wip, ['class' => 'field']) !!} WIP
                              <br><br>
                            {!! Form::checkbox('fg', 1, $product->fg, ['class' => 'field']) !!} FG
                          </div>
                          <div class="col-md-4">
                            {!! Form::checkbox('disposeBalance', 1, $product->disposeBalance, ['class' => 'field']) !!} Dispose
                              <br>
                            {!! Form::checkbox('rcp', 1, $product->rcp, ['class' => 'field']) !!} Running Charge Part (RCP)
                            <br>
                            {!! Form::checkbox('cutoff', 1, $product->cutoff, ['class' => 'field']) !!} Cut-off lot
                              <br>
                            {!! Form::checkbox('kiv', 1, $product->kiv, ['class' => 'field']) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                          </div>
                          <div class="col-md-4">
                            {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                            <div class="col-md-12">{!! Form::text('workOrderID',$product->workOrderID, array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control')) !!}</div>
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
                              {!! Form::checkbox('newArtwork', 1, $product->newArtwork, array('class' => 'field', 'readonly'=>true)) !!} New Artwork
                                <br>
                              {!! Form::checkbox('films', 1, $product->films, array('class' => 'field', 'readonly'=>true)) !!} Films
                                <br>
                              {!! Form::checkbox('technicalDrawing', 1, $product->technicalDrawing, array('class' => 'field', 'readonly'=>true)) !!} Technical Drawing
                                <br>
                              {!! Form::checkbox('digitalProofing', 1, $product->digitalProofing, array('class' => 'field', 'readonly'=>true)) !!} Digital Proofing
                                <br>
                              {!! Form::checkbox('artworkDrawing', 1, $product->artworkDrawing, array('class' => 'field', 'readonly'=>true)) !!} Artwork Drawing
                            </div>
                            <div class="col-md-4">
                              {!! Form::checkbox('colorLimit',1, $product->colorLimit, array('class' => 'field', 'readonly'=>true)) !!} Color Limit Sample
                                <br>
                              {!! Form::checkbox('bluePrint', 1, $product->bluePrint, array('class' => 'field', 'readonly'=>true)) !!} Blue Print
                                <br>
                              {!! Form::checkbox('pmrf', 1, $product->pmrf, array('class' => 'field', 'readonly'=>true)) !!} PMRF
                            </div>
                            <div class="col-md-4">
                              {!! Form::checkbox('other', 1, $product->other, ['class' => 'field']) !!}  Others(Please specify)
                              {!! Form::textarea('other_text', $product->other_text, array('class'=>'form-control', 'placeholder'=>'Please specify (if any)', 'readonly'=>true)) !!}
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
                                {!! Form::checkbox('productionProcess', 1, $product->productionProcess, array('class' => 'field', 'readonly'=>true)) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                                {!! Form::checkbox('handCutSubmission', 1, $product->handCutSubmission, array('class' => 'field', 'readonly'=>true)) !!} Hand Cut Submission

                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group row">
                            {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                            <div class="col-md-10">
                                {!! Form::checkbox('yes1', 1, $product->yes1, array('class' => 'field', 'readonly'=>true)) !!} Yes &nbsp
                                {!! Form::checkbox('no1', 1, $product->no1, array('class' => 'field', 'readonly'=>true)) !!} No

                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group row">
                            {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                            <div class="col-md-10">
                              <div class="col-md-4">
                                {!! Form::checkbox('wip', 1, $product->wip, array('class' => 'field', 'readonly'=>true)) !!} WIP
                                  <br><br>
                                {!! Form::checkbox('fg', 1, $product->fg, array('class' => 'field', 'readonly'=>true))!!} FG
                              </div>
                              <div class="col-md-4">
                                {!! Form::checkbox('disposeBalance', 1, $product->disposeBalance, array('class' => 'field', 'readonly'=>true)) !!} Dispose
                                  <br>
                                {!! Form::checkbox('rcp', 1, $product->rcp, array('class' => 'field', 'readonly'=>true)) !!} Running Charge Part (RCP)
                                <br>
                                {!! Form::checkbox('cutoff', 1, $product->cutoff, array('class' => 'field', 'readonly'=>true))!!} Cut-off lot
                                  <br>
                                {!! Form::checkbox('kiv', 1, $product->kiv, array('class' => 'field', 'readonly'=>true)) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                              </div>
                              <div class="col-md-4">
                                {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                                <div class="col-md-12">{!! Form::text('workOrderID',$product->workOrderID, array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control', 'readonly'=>true)) !!}</div>
                              </div>

                            </div>
                        </div>
                      </div>
                    @endif

                    @if (access()->hasPermissions(['printing', 'ctp']))
                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('advisePlate', 'Advise Plate/Film (by CTP)', array('class' => 'col-md-12')) !!}
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('ctpPlate', 'Plate', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, ['class' => 'field']) !!} Not Available (N/A)
                                <br>
                              {!! Form::checkbox('dispose1', 1, $product->dispose1, ['class' => 'field']) !!} Dispose
                              {!! Form::text('ctpPlate_text', $product->ctpPlate_text, array('class' => 'form-control ')) !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                              {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, ['class' => 'field']) !!} Not Available (N/A)
                                <br>
                              {!! Form::checkbox('dispose2', 1, $product->dispose2, ['class' => 'field']) !!} Dispose
                              {!! Form::text('film_text',$product->film_text,array( 'class' => 'form-control ')) !!}
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
                            {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, array('class' => 'field', 'readonly'=>true)) !!} Not Available (N/A)
                              <br>
                            {!! Form::checkbox('dispose1', 1, $product->dispose1, array('class' => 'field', 'readonly'=>true)) !!} Dispose
                            {!! Form::text('ctpPlate_text',$product->ctpPlate_text, array('class' => 'form-control ', 'readonly'=>true)) !!}
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, array('class' => 'field', 'readonly'=>true)) !!} Not Available (N/A)
                              <br>
                            {!! Form::checkbox('dispose2', 1, $product->dispose2, array('class' => 'field', 'readonly'=>true)) !!} Dispose
                            {!! Form::text('film_text', $product->film_text, array( 'class' => 'form-control ', 'readonly'=>true)) !!}
                        </div>
                    </div>
                  </div>
                  @endif

                @if (access()->hasPermissions(['sales-marketing']))
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseBy', 'Advise By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('adviseBy', $product->adviseBy, array( 'class' => 'form-control ')) !!}
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
                      <div class="form-group row">
                                {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                              <div class="col-md-10">
                                @foreach($product->fileupload as $file)
                                    <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                                    {!! '&nbsp;'!!}
                                @endforeach
                              </div>
                      </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
                    </div>
                  @elseif (access()->hasPermissions(['ctp']))
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseBy', 'Advise By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('adviseBy', $product->adviseBy, array( 'class' => 'form-control ', 'readonly'=>true)) !!}
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
                      <div class="form-group row">
                                {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                              <div class="col-md-10">
                                @foreach($product->fileupload as $file)
                                    <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                                    {!! '&nbsp;'!!}
                                @endforeach
                              </div>
                      </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-block" value="SAVE"> SAVE </button>
                    </div>
                  @else
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('adviseBy', 'Advise By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('adviseBy', $product->adviseBy,array( 'class' => 'form-control ', 'readonly'=>true)) !!}
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('issueBy', 'Issue By', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('issueBy', Auth::user()->first_name.' '.Auth::user()->last_name, array( 'class' => 'form-control ', 'readonly'=>true)) !!}
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                                {!! Form::label('images', 'Files', array('class' => 'control-label col-md-2')) !!}
                              <div class="col-md-10">
                                @foreach($product->fileupload as $file)
                                    <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                                    {!! '&nbsp;'!!}
                                @endforeach
                              </div>
                      </div>
                    </div>

                  @endif
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
