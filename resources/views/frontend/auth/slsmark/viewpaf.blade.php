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
              {!! Form::hidden('paf_number', $product->paf_number) !!}
            <div class="col-md-12">
              <div class="col-md-6 ">
                <div class="form-group row">
                  {!! Form::label('rev', 'Rev', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('rev', $product->rev, array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group row">
                  {!! Form::label('datetime', 'Date', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('datetime', date('d/m/Y', strtotime($product->datetime)), array('readonly'=>true ,'id'=>'datepicker2' , 'class' => 'form-control ', 'readonly'=> true)) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('oldpartno', 'Old Part #', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('oldpartno', $product->oldpartno , array( 'class' => 'form-control ', 'readonly'=> true)) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('partNo', 'Part #', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partNo', $sales->items->partNo , array('readonly'=>true , 'class' => 'form-control ', 'readonly'=> true)) !!}</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  {!! Form::label('custName', 'Customer', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('custName', $sales->custName, array('readonly'=>true , 'class' => 'form-control ', 'readonly'=> true)) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('partDesc', 'Description', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partDesc', $sales->items->partDesc, array('readonly'=>true ,'class' => 'form-control ', 'readonly'=> true)) !!}</div>
                </div>
                <div class="form-group row">
                  {!! Form::label('partDesc2', 'Description 2', ['class' => 'col-md-2']) !!}
                  <div class="col-md-10">{!! Form::text('partDesc2', $sales->items->partDesc2, array('readonly'=>true ,'class' => 'form-control ', 'readonly'=> true)) !!}</div>
                </div>
              </div>
            </div>

              <div class="col-md-12 ">
                <div class="form-group row">
                  {!! Form::label('amendment', 'Amendment Details', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                      <div class="col-md-4">
                        @if($prodedit->material == 1)
                          {!! Form::checkbox('material', 1, $product->material, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Material
                        @else
                            {!! Form::checkbox('material', 1, $product->material, ['class' => 'field', 'disabled'=>'disabled']) !!} Material
                        @endif
                        <br>
                        @if($prodedit->data == 1)
                          {!! Form::checkbox('data', 1, $product->data, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Data
                        @else
                          {!! Form::checkbox('data', 1, $product->data, ['class' => 'field', 'disabled'=>'disabled']) !!} Data
                        @endif
                      </div>
                      <div class="col-md-4">
                        @if($prodedit->artwork == 1)
                          {!! Form::checkbox('artwork', 1, $product->artwork, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Artwork
                        @else
                          {!! Form::checkbox('artwork', 1, $product->artwork, ['class' => 'field', 'disabled'=>'disabled']) !!} Artwork
                        @endif
                        <br>
                        @if($prodedit->diecut == 1)
                          {!! Form::checkbox('diecut', 1, $product->diecut, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Die-cut out line
                        @else
                          {!! Form::checkbox('diecut', 1, $product->diecut, ['class' => 'field', 'disabled'=>'disabled']) !!} Die-cut out line
                        @endif
                      </div>
                      <div class="col-md-4">
                        @if($prodedit->attachment == 1)
                          {!! Form::checkbox('attachment', 1, $product->attachment, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Refer to attachment (if use attachment section)
                        @else
                          {!! Form::checkbox('attachment', 1, $product->attachment, ['class' => 'field', 'disabled'=>'disabled']) !!} Refer to attachment (if use attachment section)</div>
                        @endif
                    </div>
                </div>
              </div>

              <div class="col-md-12" >
                <div class="form-group row">
                  {!! Form::label('revNo', 'Rev no:', array('class' => 'col-md-2')) !!}
                    <div class="col-md-9">{!! Form::text('revNo', $product->revNo , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      {{-- <p> To Pre Print:</p> --}}
                      @if($prodedit->lot1 == 1)
                        {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="lot" type="text" value="{!!$product->lot1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('lot', 'Lot No:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('lot', $product->lot1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('lotcheck', 1, $product->lotcheck1,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->mfgdate1 == 1)
                        {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="mfgdate" type="text" value="{!!$product->mfgdate1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('mfgDate', 'MFG Date:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('mfgDate', $product->mfgDate1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('mfgcheck', 1, $product->mfgcheck1,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->expiryDate1 == 1)
                        {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="expiryDate" type="text" value="{!!$product->expiryDate1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('expiryDate', 'Expiry Date:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('expiryDate', $product->expiryDate1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('expcheck', 1, $product->expcheck1,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->dateFacNo1 == 1)
                        {!! Form::label('dateFacNo', 'Date & Fac No:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="dateFacNo" type="text" value="{!!$product->dateFacNo1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('dateFacNo', 'Date & Fac No:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('dateFacNo', $product->dateFacNo1 , array( 'class' => 'form-control')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('datecheck', 1, $product->datecheck1,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->packerID1 == 1)
                        {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="packerID" type="text" value="{!!$product->packerID1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('packerID', 'Packer\'s ID:', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('packerID', $product->packerID1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('packcheck', 1, $product->packcheck1,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->rawMaterial1 == 1)
                        {!! Form::label('rawMaterial', 'Using(Raw):', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="rawMaterial" type="text" value="{!!$product->rawMaterial1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('rawMaterial', 'Using(Raw):', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('rawMaterial', $product->rawMaterial1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('rawcheck', 1, $product->rawcheck1,  array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->batchbar1 == 1)
                        {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="batchbar" type="text" value="{!!$product->batchbar1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('batchbar', 'Batch/Bar :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('batchbar', $product->batchbar1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                      @if($prodedit->material == 1)
                        {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                      @else
                        <div class="col-md-1">{!! Form::checkbox('batchcheck', 1, $product->batchcheck1,   array('class' => 'field', 'disabled'=>'disabled')) !!} N/A</div>
                      @endif

                      @if($prodedit->size1 == 1)
                        {!! Form::label('size', 'Size :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="size" type="text" value="{!!$product->size1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('size', 'Size :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('size', $product->size1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif

                      @if($prodedit->noPages1 == 1)
                        {!! Form::label('noPages', 'No of Pages :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="noPages" type="text" value="{!!$product->noPages1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('noPages', 'No of Pages :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('noPages', $product->noPages1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif

                      @if($prodedit->colour1 == 1)
                        {!! Form::label('colour', 'Colour :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="colour" type="text" value="{!!$product->colour1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('colour', 'Colour :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('colour', $product->colour1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif

                      @if($prodedit->finishing1 == 1)
                        {!! Form::label('finishing', 'Finishing :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9"><input style="color:red;" name="finishing" type="text" value="{!!$product->finishing1!!}" class="form-control" disabled></div>
                      @else
                        {!! Form::label('finishing', 'Finishing :', array('class' => 'col-md-2')) !!}
                        <div class="col-md-9">{!! Form::text('finishing', $product->finishing1 , array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                      @endif

                  </div>
                    <div class="form-group row ">
                      {!! Form::label('remarkbig', 'Remarks ', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">{!! $product->remarkbig !!}</div>
                    </div>
                </div>

                <div class="col-md-12 ">
                  <div class="form-group row">
                    {!! Form::label('custDoc', 'Customers Document Provided', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                        <div class="col-md-4">
                          @if($prodedit->newArtwork == 1)
                            {!! Form::checkbox('newArtwork', 1, $product->newArtwork, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} New Artwork
                          @else
                            {!! Form::checkbox('newArtwork', 1, $product->newArtwork, ['class' => 'field', 'disabled'=>'disabled' ]) !!} New Artwork
                          @endif
                            <br>
                            @if($prodedit->films == 1)
                              {!! Form::checkbox('films', 1, $product->films, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Films
                            @else
                              {!! Form::checkbox('films', 1, $product->films, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Films
                            @endif
                            <br>
                            @if($prodedit->technicalDrawing == 1)
                              {!! Form::checkbox('technicalDrawing', 1, $product->technicalDrawing, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Technical Drawing
                            @else
                              {!! Form::checkbox('technicalDrawing', 1, $product->technicalDrawing, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Technical Drawing
                            @endif
                            <br>
                            @if($prodedit->digitalProofing == 1)
                              {!! Form::checkbox('digitalProofing', 1, $product->digitalProofing, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Digital Proofing
                            @else
                              {!! Form::checkbox('digitalProofing', 1, $product->digitalProofing, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Digital Proofing
                            @endif
                            <br>
                            @if($prodedit->artworkDrawing == 1)
                              {!! Form::checkbox('artworkDrawing', 1, $product->artworkDrawing, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Artwork Drawing
                            @else
                              {!! Form::checkbox('artworkDrawing', 1, $product->artworkDrawing, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Artwork Drawing
                            @endif
                        </div>
                        <div class="col-md-4">
                          @if($prodedit->colorLimit == 1)
                            {!! Form::checkbox('colorLimit', 1, $product->colorLimit, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Color Limit Sample
                          @else
                            {!! Form::checkbox('colorLimit', 1, $product->colorLimit, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Color Limit Sample
                          @endif
                            <br>
                            @if($prodedit->bluePrint == 1)
                              {!! Form::checkbox('bluePrint', 1, $product->bluePrint, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Blue Print
                            @else
                              {!! Form::checkbox('bluePrint', 1, $product->bluePrint, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Blue Print
                            @endif
                            <br>
                            @if($prodedit->pmrf == 1)
                              {!! Form::checkbox('pmrf', 1, $product->pmrf, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} PMRF
                            @else
                              {!! Form::checkbox('pmrf', 1, $product->pmrf, ['class' => 'field', 'disabled'=>'disabled' ]) !!} PMRF
                            @endif
                        </div>
                        <div class="col-md-4">
                          @if($prodedit->other == 1)
                            {!! Form::checkbox('other', 1, $product->other, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Others(Please specify)
                          @else
                            {!! Form::checkbox('other', 1, $product->other, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Others(Please specify)
                          @endif
                          @if($prodedit->other_text == 1)
                            {!! Form::textarea('other_text', $product->other_text, ['class'=>'form-control', 'disabled'=>'disabled', 'placeholder'=>'Please specify (if any)','cols'=>25, 'rows'=>3] ) !!}
                          @else
                            {!! Form::textarea('other_text', $product->other_text, ['class'=>'form-control', 'disabled'=>'disabled', 'placeholder'=>'Please specify (if any)','cols'=>25, 'rows'=>3] ) !!}
                          @endif
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                    <fieldset>
                    <div class="form-group row">
                      {!! Form::label('sampleSubReq', 'Sample Submission Request', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                        @if($prodedit->yes == 1)
                          {!! Form::checkbox('yes', 1, $product->yes, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Yes &nbsp
                        @else
                          {!! Form::checkbox('yes', 1, $product->yes, ['class' => 'field', 'disabled'=>'disabled' ]) !!} Yes &nbsp
                        @endif
                        @if($prodedit->no == 1)
                          {!! Form::checkbox('no', 1, $product->no, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                        @else
                          {!! Form::checkbox('no', 1, $product->no, ['class' => 'field', 'disabled'=>'disabled' ]) !!} No
                        @endif
                      </div>
                    </div>
                  </fieldset>


                  <div class="col-md-12">
                    @if($prodedit->customer == 1)
                      <div class="col-md-6">{!! Form::checkbox('customer', 1, $product->customer, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Customer/Advance </div>
                    @else
                      <div class="col-md-6">{!! Form::checkbox('customer',1, $product->customer, ['class' => 'field', 'disabled'=>'disabled']) !!} Customer/Advance </div>
                    @endif
                    <div class="col-md-6">
                      {!! Form::label('customer', 'QTY: ', array('class' => 'col-md-2')) !!}
                      @if($prodedit->customer_text == 1)
                        <div class="col-md-10"><input style="color:red;" name="customer_text" type="text" value={!!$product->customer_text!!} class="form-control" disabled></div>
                      @else
                        <div class="col-md-10"> {!! Form::text('customer_text', $product->customer_text, array('placeholder'=>'pcs', 'class' => 'form-control  ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                    </div>
                    <br>
                    @if($prodedit->qa == 1)
                      <div class="col-md-6">{!! Form::checkbox('qa', 1, $product->qa, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} QA </div>
                    @else
                      <div class="col-md-6">{!! Form::checkbox('qa', 1, $product->qa, ['class' => 'field', 'disabled'=>'disabled']) !!} QA </div>
                    @endif
                    <div class="col-md-6">
                      {!! Form::label('qa', 'QTY: ', array('class' => 'col-md-2')) !!}
                      @if($prodedit->qa_text == 1)
                        <div class="col-md-10"><input style="color:red;" name="qa_text" type="text" value={!!$product->qa_text!!} class="form-control" disabled></div>
                      @else
                        <div class="col-md-10"> {!! Form::text('qa_text', $product->qa_text, array('placeholder'=>'pcs', 'class' => 'form-control  ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                    </div>
                    <br>
                    @if($prodedit->production == 1)
                      <div class="col-md-6">{!! Form::checkbox('production', 1, $product->production, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Production </div>
                    @else
                      <div class="col-md-6">{!! Form::checkbox('production', 1, $product->production, ['class' => 'field', 'disabled'=>'disabled']) !!} Production </div>
                    @endif
                    <div class="col-md-6">
                      {!! Form::label('production', 'QTY: ', array('class' => 'col-md-2')) !!}
                      @if($prodedit->production_text == 1)
                        <div class="col-md-10"><input style="color:red;" name="production_text" type="text" value={!!$product->production_text!!} class="form-control" disabled></div>
                      @else
                        <div class="col-md-10"> {!! Form::text('production_text', $product->production_text, array('placeholder'=>'pcs', 'class' => 'form-control  ', 'disabled'=>'disabled')) !!}</div>
                      @endif
                    </div>
                    <br>

                    <div class="col-md-12 ">
                      {!! Form::label('qtyOnHand', 'Quantity on Hand', ['class' => 'col-md-5']) !!}
                        @if($prodedit->qtyOnHand == 1)
                          <div class="col-md-7"><input style="color:red;" name="qtyOnHand" type="text" value="{!!$product->qtyOnHand!!}" class="form-control" disabled></div>
                        @else
                          <div class="col-md-7">{!! Form::text('qtyOnHand', $product->qtyOnHand, array('placeholder'=>'pcs' , 'class' => 'form-control ', 'disabled'=>'disabled')) !!}</div>
                        @endif
                    </div>
                    <br>

                    <div class="col-md-12">
                      {!! Form::label('requiredDate', 'Date required', ['class' => 'col-md-5']) !!}
                        <div class="col-md-7">{!! Form::text('requiredDate', date('d/m/Y', strtotime($product->requiredDate)), array( 'id'=>'datepicker','class' => 'form-control', 'disabled'=>'disabled')) !!}</div>
                    </div>

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('sampleSubPro', 'Sample Submission Process :', array('class' => 'col-md-5')) !!}
                    <br>
                    <div class="col-md-10">
                      @if($prodedit->productionProcess == 1)
                        {!! Form::checkbox('productionProcess', 1, $product->productionProcess, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                      @else
                        {!! Form::checkbox('productionProcess', 1, $product->productionProcess, ['class' => 'field', 'disabled'=>'disabled']) !!} Production Process  &nbsp &nbsp &nbsp &nbsp
                      @endif
                      @if($prodedit->handCutSubmission == 1)
                        {!! Form::checkbox('handCutSubmission', 1, $product->handCutSubmission, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Hand Cut Submission
                      @else
                        {!! Form::checkbox('handCutSubmission', 1, $product->handCutSubmission, ['class' => 'field', 'disabled'=>'disabled']) !!} Hand Cut Submission
                      @endif
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('adviseStock', 'Advise on stock :', array('class' => 'col-md-2')) !!}
                      <div class="col-md-10">
                        @if($prodedit->yes1 == 1)
                          {!! Form::checkbox('yes1', 1, $product->yes1, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Yes &nbsp
                        @else
                          {!! Form::checkbox('yes1', 1, $product->yes1, ['class' => 'field', 'disabled'=>'disabled']) !!} Yes &nbsp
                        @endif
                        @if($prodedit->no1 == 1)
                          {!! Form::checkbox('no1', 1, $product->no1, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} No
                        @else
                          {!! Form::checkbox('no1', 1, $product->no1, ['class' => 'field', 'disabled'=>'disabled']) !!} No
                        @endif

                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    {!! Form::label('balanceStock', 'Balance stock :', array('class' => 'col-md-2')) !!}
                    <div class="col-md-10">
                      <div class="col-md-4">
                        @if($prodedit->wip == 1)
                          {!! Form::checkbox('wip', 1, $product->wip, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} WIP
                        @else
                          {!! Form::checkbox('wip', 1, $product->wip, ['class' => 'field', 'disabled'=>'disabled']) !!} WIP
                        @endif
                        <br><br>
                        @if($prodedit->fg == 1)
                          {!! Form::checkbox('fg', 1, $product->fg, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} FG
                        @else
                          {!! Form::checkbox('fg', 1, $product->fg, ['class' => 'field', 'disabled'=>'disabled']) !!} FG
                        @endif

                      </div>
                      <div class="col-md-4">
                        @if($prodedit->disposeBalance == 1)
                          {!! Form::checkbox('disposeBalance', 1, $product->disposeBalance, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Dispose
                        @else
                          {!! Form::checkbox('disposeBalance', 1, $product->disposeBalance, ['class' => 'field', 'disabled'=>'disabled']) !!} Dispose
                        @endif
                        <br>
                        @if($prodedit->rcp == 1)
                          {!! Form::checkbox('rcp', 1, $product->rcp, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Running Charge Part (RCP)
                        @else
                          {!! Form::checkbox('rcp', 1, $product->rcp, ['class' => 'field', 'disabled'=>'disabled']) !!} Running Charge Part (RCP)
                        @endif
                        <br>
                        @if($prodedit->cutoff == 1)
                          {!! Form::checkbox('cutoff', 1, $product->cutoff, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Cut-off lot
                        @else
                          {!! Form::checkbox('cutoff', 1, $product->cutoff, ['class' => 'field', 'disabled'=>'disabled']) !!} Cut-off lot
                        @endif
                        <br>
                        @if($prodedit->kiv == 1)
                          {!! Form::checkbox('kiv', 1, $product->kiv, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                        @else
                          {!! Form::checkbox('kiv', 1, $product->kiv, ['class' => 'field', 'disabled'=>'disabled']) !!} Keep in view (Please advise on disposition of KIV part at remarks column)
                        @endif
                      </div>
                      <div class="col-md-4">
                        {!! Form::label('workOrderID', 'Last Work Order ID # :', array('class' => 'col-md-12')) !!}
                        @if($prodedit->material == 1)
                          <div class="col-md-12">{!! Form::text('workOrderID',$product->workOrderID, array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control', 'disabled'=>'disabled' ,'style'=> 'color:red;')) !!}</div>
                        @else
                          <div class="col-md-12">{!! Form::text('workOrderID',$product->workOrderID, array('placeholder'=>'Refer to Work Order ID #', 'class' => 'form-control', 'disabled'=>'disabled')) !!}</div>
                        @endif
                      </div>

                        </div>
                    </div>
                  </div>

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
                            @if($prodedit->notAvailable1 == 1)
                              {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Not Available (N/A)
                            @else
                              {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, ['class' => 'field', 'disabled'=>'disabled']) !!} Not Available (N/A)
                            @endif
                            <br>
                            @if($prodedit->dispose1 == 1)
                              {!! Form::checkbox('dispose1', 1, $product->dispose1, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Dispose
                            @else
                              {!! Form::checkbox('dispose1', 1, $product->dispose1, ['class' => 'field', 'disabled'=>'disabled']) !!} Dispose
                            @endif
                            @if($prodedit->ctpPlate_text == 1)
                              <input style="color:red;" name="ctpPlate_text" type="text" value={!!$product->ctpPlate_text!!} class="form-control" disabled >
                            @else
                              {!! Form::text('ctpPlate_text', $product->ctpPlate_text, array('class' => 'form-control ', 'disabled'=>'disabled')) !!}
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                          <div class="col-md-10">
                            @if($prodedit->notAvailable2 == 1)
                              {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Not Available (N/A)
                            @else
                              {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, ['class' => 'field', 'disabled'=>'disabled']) !!} Not Available (N/A)
                            @endif
                            <br>
                            @if($prodedit->dispose2 == 1)
                              {!! Form::checkbox('dispose2', 1, $product->dispose2, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Dispose
                            @else
                              {!! Form::checkbox('dispose2', 1, $product->dispose2, ['class' => 'field', 'disabled'=>'disabled']) !!} Dispose
                            @endif
                            @if($prodedit->film_text == 1)
                              <input style="color:red;" name="film_text" type="text" value={!!$product->film_textfilm_text!!} class="form-control" disabled >
                            @else
                              {!! Form::text('film_text',$product->film_text,array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                            @endif
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
                          @if($prodedit->notAvailable1 == 1)
                            {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Not Available (N/A)
                          @else
                            {!! Form::checkbox('notAvailable1', 1, $product->notAvailable1, ['class' => 'field', 'disabled'=>'disabled']) !!} Not Available (N/A)
                          @endif
                          <br>
                          @if($prodedit->dispose1 == 1)
                            {!! Form::checkbox('dispose1', 1, $product->dispose1, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Dispose
                          @else
                            {!! Form::checkbox('dispose1', 1, $product->dispose1, ['class' => 'field', 'disabled'=>'disabled']) !!} Dispose
                          @endif
                          @if($prodedit->ctpPlate_text == 1)
                            <input style="color:red;" name="ctpPlate_text" type="text" value={!!$product->ctpPlate_text!!} class="form-control" disabled >
                          @else
                            {!! Form::text('ctpPlate_text', $product->ctpPlate_text, array('class' => 'form-control ', 'disabled'=>'disabled')) !!}
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('film', 'Film / File', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                          @if($prodedit->notAvailable2 == 1)
                            {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Not Available (N/A)
                          @else
                            {!! Form::checkbox('notAvailable2', 1, $product->notAvailable2, ['class' => 'field', 'disabled'=>'disabled']) !!} Not Available (N/A)
                          @endif
                          <br>
                          @if($prodedit->dispose2 == 1)
                            {!! Form::checkbox('dispose2', 1, $product->dispose2, ['style'=> 'outline: 1px solid #ff5733', 'disabled'=>'disabled']) !!} Dispose
                          @else
                            {!! Form::checkbox('dispose2', 1, $product->dispose2, ['class' => 'field', 'disabled'=>'disabled']) !!} Dispose
                          @endif
                          @if($prodedit->film_text == 1)
                            <input style="color:red;" name="film_text" type="text" value={!!$product->film_textfilm_text!!} class="form-control" disabled >
                          @else
                            {!! Form::text('film_text',$product->film_text,array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                          @endif
                        </div>
                    </div>
                  </div>
                  @endif

                @if (access()->hasPermissions(['sales-marketing']))
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
                            {!! Form::text('issueBy', Auth::user()->first_name.' '.Auth::user()->last_name, array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                      
                          {!! Form::label('images', 'Files uploaded', array('class' => 'control-label col-md-2')) !!}
                          <div class="col-md-10">
                            @foreach($sales->fileupload as $file)
                              <a href="{!! "/uploaded/$file->filename" !!}" download="{!! $file->filename !!}">{!! $file->filename !!}</a>
                                  {!! '&nbsp;'!!}
                            @endforeach
                          </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12 row">
                      <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)"> </input>
                        <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
                    </div>
                  @elseif (access()->hasPermissions(['ctp']))
                    <div class="col-md-12">
                      <div class="form-group row">
                        {!! Form::label('ctp_issue', 'Issue By(CTP)', array('class' => 'col-md-2')) !!}
                        <div class="col-md-10">
                            {!! Form::text('ctp_issue', Auth::user()->first_name.' '.Auth::user()->last_name, array( 'class' => 'form-control ', 'disabled'=>'disabled')) !!}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <input type="button" class="btn btn-warning" value="BACK" onclick="history.go(-1)"> </input>
                        <button type="submit" class="btn btn-success" value="SAVE"> SAVE </button>
                    </div>
                  @endif
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
       });
</script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

@endsection
