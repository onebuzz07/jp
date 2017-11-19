<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    public function odbctest()
    {
        $sql="SELECT xxgk2d_invnbr FROM PUB.xxgk2d_det";

        $dsn = "jp";

        if ($conn_id=odbc_connect("jp","pub","public", SQL_CUR_USE_ODBC)){

            echo "connected to DSN: $dsn <br>";

            if($result=odbc_do($conn_id, $sql)) {
                echo "executing '$sql' <br>";
        		echo " Results: ";
        		odbc_result_all($result, "BGCOLOR='#AAFFAA' border=3 width=30% bordercolordark='#FF0000'");

        		echo "freeing result <br>";

        		odbc_free_result($result);
        	}else{

                echo "can not execute '$sql' ";
            }

        	echo " closing connection $conn_id <br>";
        	odbc_close($conn_id);
        }else{

            echo " can not connect to DSN: $dsn ";
        }
    }
}
