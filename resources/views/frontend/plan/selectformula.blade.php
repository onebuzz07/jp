@extends('frontend.layouts.app')

@section('content')
    <h1>Planning Department</h1>

@include('frontend.plan.includes.nav')
  <h4>Formula Template</h4>
    @include('frontend.plan.includes.navplan')
    {!!Form::hidden('sales_id', $sales->id)!!}
    <div class="col-md-9 row">
        <div class="form-group row ">
          {!! Form::label('workorder', 'Work Order:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->workorder!!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('workorderid', 'ID:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->wid !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('batchbar', 'Batch:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->batchbar !!}</div>
        </div>
        <div class="form-group row ">
          {!! Form::label('partNo', 'Item Number:', array('class' => 'col-md-3')) !!}
          <div class="col-md-9">{!! $sales->items->partNo!!}</div>
        </div>

          <div class="form-group row ">
            {!! Form::label('partDesc', 'Description:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->items->partDesc !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('partDesc2', 'Description 2:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->items->partDesc2 !!}</div>
          </div>

          <div class="form-group row ">
            {!! Form::label('quantity', 'Quantity Ordered:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!!$sales->items->quantity !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('custName', 'Customer Name:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->custName !!}</div>
          </div>
          <div class="form-group row ">
            {!! Form::label('salesorder', 'Sales/Job:', array('class' => 'col-md-3')) !!}
            <div class="col-md-9">{!! $sales->salesorder !!}</div>
          </div>
          {{-- @foreach ($done as  $key => $d) --}}
            <div class="form-group row ">
              {!! Form::label('done', 'Type of formula done:', array('class' => 'col-md-3')) !!}
              <div class="col-md-9">{!!  implode(', ', $done) !!}</div>
            </div>
            {{-- @endforeach --}}
        </div>

      <div class="col-md-3">
          {!! Form::model($sales, array('route' => array('frontend.plan.selectformula', $sales->id), 'method' => 'GET', 'class' => 'form-horizontal')) !!}
              <fieldset>
                <!-- Form Name -->
                  <legend>Choose one of the formula:</legend>
                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <div class="col-md-12">
                          @if (!empty($softcover))
                            <div class="radio">
                                <label for="radio">
                                  <div  id="button"><a class="btn btn-xs btn-primary" href="{!!route('frontend.plan.softcoveredit', $softcover->id)!!}">Edit Soft Cover</a></div>
                                  <div  id="button"><a class="btn btn-xs btn-danger" href="{!!route('frontend.plan.deletes1', $softcover->id)!!}"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a></div>
                                </label>
                            </div>
                          @else
                            <div class="radio">
                                <label for="type">
                                  <input type="radio" name="type"  value="a">
                                    <strong>a.</strong> Soft Cover V1.5
                                </label>
                            </div>
                          @endif
                            @if (!empty($softcoverbw))
                              <div class="radio">
                                  <label for="radio">
                                    <div  id="button"><a class="btn btn-xs btn-primary" href="{!!route('frontend.plan.softcoverbwedit', $softcoverbw->id)!!}">Edit Soft Cover BW</a></div>
                                    <div  id="button"><a class="btn btn-xs btn-danger" href="{!!route('frontend.plan.deletes2', $softcoverbw->id)!!}"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a></div>
                                  </label>
                              </div>
                            @else
                              <div class="radio">
                                  <label for="radio">
                                    <input type="radio" name="type"  value="b">
                                      <strong>b.</strong> Soft Cover V1.5 (BW)
                                  </label>
                              </div>
                            @endif
                            @if (!empty($overseasfb))
                              <div class=" radio">
                                  <label for="radio">
                                    <div  id="button"><a class="btn btn-xs btn-primary" href="{!!route('frontend.plan.softcoveroverseafbedit', $overseasfb->id)!!}">Edit Soft Cover Overseas FB</a></div>
                                    <div  id="button"><a class="btn btn-xs btn-danger" href="{!!route('frontend.plan.deletes3', $overseasfb->id)!!}"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a></div>
                                  </label>
                              </div>
                            @else
                              <div class="radio">
                                  <label for="radio">
                                    <input type="radio" name="type" value="c">
                                      <strong>c.</strong> Soft Cover Overseas (F and B)
                                  </label>
                              </div>
                            @endif
                            @if (!empty($overseaswt))
                              <div class="radio">
                                  <label for="radio">
                                    <div  id="button"><a class="btn btn-xs btn-primary" href="{!!route('frontend.plan.softcoveroverseawtedit', $overseaswt->id)!!}">Edit Soft Cover Overseas WT</a></div>
                                    <div  id="button"><a class="btn btn-xs btn-danger" href="{!!route('frontend.plan.deletes4', $overseaswt->id)!!}"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a></div>
                                  </label>
                              </div>
                            @else
                              <div class="radio">
                                  <label for="radi0">
                                    <input type="radio" name="type"  value="d">
                                      <strong>d.</strong> Soft Cover Overseas (W and T)
                                  </label>
                              </div>
                            @endif
                            @if (!empty($boxes))
                              <div class="radio">
                                  <label for="radio">
                                    <div  id="button"><a class="btn btn-xs btn-primary" href="{!!route('frontend.plan.boxesedit', $boxes->id)!!}">Edit Boxes</a></div>
                                    <div  id="button"><a class="btn btn-xs btn-danger" href="{!!route('frontend.plan.deletes5', $boxes->id)!!}"></a></div>
                                  </label>
                              </div>
                            @else
                              <div class="radio">
                                  <label for="radios-1">
                                    <input type="radio" name="type" value="e">
                                      <strong>e.</strong> Boxes V1.3
                                  </label>
                              </div>
                            @endif
                            @if (!empty($planning))
                              <div class="col-md-12 radio">
                                  <label for="radio">
                                    <div  id="button"><a class="btn btn-xs btn-primary" href="{!!route('frontend.plan.planningedit', $planning->id)!!}">Edit Planning</a></div>
                                    <div  id="button"><a class="btn btn-xs btn-danger" href="{!!route('frontend.plan.deletes6', $planning->id)!!}"><i class="glyphicon glyphicon-remove" data-toggle="modal tooltip" title="delete" onclick=" return confirm(\'Are you sure you want to do this?\')"></i></a></div>
                                  </label>
                              </div>
                            @else
                            <div class="radio">
                                <label for="radios-1">
                                  <input type="radio" name="type" value="f">
                                    <strong>f.</strong> Planning V1.4
                                </label>
                            </div>
                          @endif
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">

                        <div class="col-md-4">
                        <button type="submit"  class="btn btn-primary">Continue</button>
                        </div>
                    </div>

                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@endsection
