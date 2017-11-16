<?php

namespace App\Http\Controllers\Frontend\ctp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Access\plan;
use App\Models\Access\sales;
use App\Models\Access\ctp;
use App\Models\Access\Repeat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;

class CtpController extends Controller
{
  protected $users;
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
  public function index()
  {
    $sales=Sales::where('status','CTP Dept')->get();
    return view('frontend.ctp.index')->with('sales',$sales);
  }

  public function edit($id)
  {
      // get the sales
      $sales = Sales::find($id);
      //$sales=Sales::all();
      // show the edit form and pass the sales
      return view('frontend.ctp.edit')
          ->with('sales', $sales);
  }

  public function update($id, Request $request)
  {
          $sales = Sales::find($id);
          $remark3 =$request->input('remark3');
          $dom = new \DomDocument();
          $dom->loadHtml($remark3, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
          $images = $dom->getElementsByTagName('img');
          // foreach <img> in the submited message
          foreach($images as $img){
              $src = $img->getAttribute('src');

              // if the img source is 'data-url'
              if(preg_match('/data:image/', $src)){
                  // get the mimetype
                  preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                  $mimetype = $groups['mime'];
                  // Generating a random filename

                  $filename = uniqid();
                  $filepath = "/uploaded/$filename.$mimetype";
                  // @see http://image.intervention.io/api/
                  $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(public_path($filepath));
                  $new_src = asset($filepath);
                  $img->removeAttribute('src');
                  $img->setAttribute('src', $new_src);
              } // <!--endif
          } // <!-
          $sales->remark3 = $dom->saveHTML();
          $sales->status = 'Printing Dept';
          $sales->save();

          // redirect
          return redirect()->route('frontend.ctp.index')->withFlashSuccess('The remark is saved and ready for action from Printing dept. ');

  }

  public function anyData()
  {
    if (access()->hasPermissions(['planning']))
    {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.status', 'sales.id']);


        return Datatables::of($sales)
          ->editColumn('id', function ($sales) {
                    return '<a href="'. route('frontend.ctp.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
                    ';
                })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept")
        ->make();
      }
      else
      {
        $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
        ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.status', 'sales.id']);


        return Datatables::of($sales)
          ->editColumn('id', function ($sales) {
                    return '';
                })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept")
        ->make();
      }
  }



  public function repeatEdit($id)
  {
      // get the sales
      $repeat = Repeat::find($id);
      //$sales=Sales::all();
      // show the edit form and pass the sales
      return view('frontend.ctp.repeatEdit')
          ->with('repeat', $repeat);
  }

  public function repeatUpdate($id, Request $request)
  {
          $repeat = Repeat::find($id);
          $remark3 =$request->input('remark3');
          $dom = new \DomDocument();
          $dom->loadHtml($remark3, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
          $images = $dom->getElementsByTagName('img');
          // foreach <img> in the submited message
          foreach($images as $img){
              $src = $img->getAttribute('src');

              // if the img source is 'data-url'
              if(preg_match('/data:image/', $src)){
                  // get the mimetype
                  preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                  $mimetype = $groups['mime'];
                  // Generating a random filename

                  $filename = uniqid();
                  $filepath = "/uploaded/$filename.$mimetype";
                  // @see http://image.intervention.io/api/
                  $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(public_path($filepath));
                  $new_src = asset($filepath);
                  $img->removeAttribute('src');
                  $img->setAttribute('src', $new_src);
              } // <!--endif
          } // <!-
          $repeat->remark3 = $dom->saveHTML();
          $repeat->status = 'Printing Dept(repeat)';
          $repeat->save();

          // redirect
          return redirect()->route('frontend.ctp.index')->withFlashSuccess('The remark is saved and ready for action from Printing dept. ');

  }

  public function repeatData()
  {
    if (access()->hasPermissions(['planning']))
    {
        $repeat = Repeat::leftJoin('items', 'items.sales_id', '=', 'repeats.id' )
        ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

        return Datatables::of($repeat)
          ->editColumn('id', function ($repeat) {
                    return '<a href="'. route('frontend.ctp.repeatEdit', $repeat->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
                    ';
                })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept(repeat)")
        ->make();
      }
      else {
        $repeat = Repeat::leftJoin('items', 'items.sales_id', '=', 'repeats.id' )
        ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

        return Datatables::of($repeat)
          ->editColumn('id', function ($repeat){
                    return '';
                })

        ->escapeColumns([])
        ->where('status', '=', "CTP Dept(repeat)")
        ->make();
      }
  }

  // public function product($id)
  // {
  //   $product = Product::find($id);
  //
  //   $product->dispose1 =Input::get('dispose1');
  //   $product->ctpPlate_text =Input::get('ctpPlate_text');
  //   $product->notAvailable2 =Input::get('notAvailable2');
  //   $product->dispose2 =Input::get('dispose2');
  //   $product->film_text =Input::get('film_text');
  //   $product->save();
  // }
  //
  // public function destroy($id)
  // {
  //     $sales = Sales::findOrFail($id)->delete();
  //     // redirect
  //     return redirect()->route('frontend.ctp.index')->withFlashSuccess('The data is already deleted.');
  // }
}
