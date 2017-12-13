<?php

namespace App\Http\Controllers\Frontend\printing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Access\printing;
use App\Models\Access\sales;
use App\Models\Access\ctp;
use App\Models\Access\plan;
use App\Models\Access\item;
use App\Models\Access\Repeat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Yajra\Datatables\Facades\Datatables;


class PrintingController extends Controller
{
      protected $users;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sales=Sales::where('status','Printing Dept')->get();
      return view('frontend.printing.index')->with('sales',$sales);
    }

    public function edit($id)
    {
        // get the sales
        $sales = Sales::find($id);
        // show the edit form and pass the sales
        return view('frontend.printing.edit')
            ->with('sales', $sales);
    }

    public function update($id, Request $request)
    {
          // process the login
          $sales = Sales::find($id);
          $items = Item::find($sales->items->id);

          $remark4 =$request->input('remark4');
          $dom = new \DomDocument();
          $dom->loadHtml($remark4, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
          $sales->remark4 = $dom->saveHTML();

          $sales->confirmby4 = Input::get('confirmby4');
          $sales->status = 'Approved';
          $sales->save();

            // redirect
            return redirect()->route('frontend.printing.index')->withFlashSuccess('The remark is saved.');

    }

    public function anyData()
    {
      if (access()->hasPermissions(['planning']))
      {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.repeat','sales.created_at', 'sales.id']);


          return Datatables::of($sales)
            ->editColumn('id', function ($sales) {
                      return '<a href="'. route('frontend.printing.edit', $sales->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                      ';
                  })
                  ->editColumn('created_at', function ($date) {
                             return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                       })
                 ->order(function ($sales) {
                              $sales->orderBy('created_at', 'desc');
                        })
          ->escapeColumns([])
          ->where('status', '=', "Printing Dept")
          ->make();
        }
        else
        {
          $sales = Sales::leftJoin('items', 'items.sales_id', '=', 'sales.id' )
          ->select(['sales.salesline','sales.custName', 'items.partNo' , 'items.partDesc','sales.repeat','sales.created_at', 'sales.id']);


          return Datatables::of($sales)
            ->editColumn('id', function ($sales){
                    return '
                    ';
                })
                ->editColumn('created_at', function ($date) {
                           return $date->created_at ? with(new Carbon($date->created_at))->format('d/m/Y') : '';
                     })
               ->order(function ($sales) {
                            $sales->orderBy('created_at', 'desc');
                      })
        ->escapeColumns([])
        ->where('status', '=', "Printing Dept")
        ->make();
      }
    }

    public function repeatEdit($id)
    {
        // get the sales
        $repeat = Repeat::find($id);
        // show the edit form and pass the sales
        return view('frontend.printing.repeatEdit')
            ->with('repeat', $repeat);
    }

    public function repeatUpdate($id, Request $request)
    {
          // process the login
          $repeat = Repeat::find($id);
          $items = Item::find($repeat->items->id);
          $remark4 =$request->input('remark4');
          $dom = new \DomDocument();
          $dom->loadHtml($remark4, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
          $repeat->remark4 = $dom->saveHTML();
          $repeat->status = 'Approved(repeat)';
          $repeat->save();

            // redirect
            return redirect()->route('frontend.printing.index')->withFlashSuccess('The remark is saved.');

    }

    public function repeatData()
    {
      if (access()->hasPermissions(['planning']))
      {
          $repeat = Repeat::leftJoin('items', 'items.repeats_id', '=', 'repeats.id' )
          ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

          return Datatables::of($repeat)
            ->editColumn('id', function ($repeat) {
                      return '<a href="'. route('frontend.printing.repeatEdit', $repeat->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </a>
                      ';
                  })

          ->escapeColumns([])
          ->where('status', '=', "Printing Dept(repeat)")
          ->make();
        }
        else {
          $repeat = Repeat::leftJoin('items', 'items.repeats_id', '=', 'repeats.id' )
          ->select(['repeats.custName', 'items.partNo' , 'items.partDesc','repeats.status', 'repeats.id']);

          return Datatables::of($repeat)
            ->editColumn('id', function ($repeat)  {
                      return '
                      ';
                  })

          ->escapeColumns([])
          ->where('status', '=', "Printing Dept(repeat)")
          ->make();
        }
    }

    // public function destroy($id)
    // {
    //     $sales = Sales::findOrFail($id)->delete();
    //     // redirect
    //     return redirect()->route('frontend.printing.index')->withFlashSuccess('The data is already deleted.');
    // }
}
