<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mainpage;

class MainTableController extends Controller
{
    public function DATA()
    {
        $mainpage2 = Mainpage::all();
        $allData = [];
        foreach ($mainpage2 as $main) {
            $sTime = microtime(true);
            $fp = @fsockopen($main->site, 80, $errno, $errstr, 1);

            if ($fp) {
                $eTime = microtime(true);
                $ping = round(($eTime - $sTime) * 1000, 2);
                fclose($fp);
                $stat = 'ONLINE';
            } else {
                $ping = 'N/A';
                $stat = 'OFFLINE';
            }

            $data = [
                'ID' => $main->id,
                'Site' => $main->site,
                'Ping' => $ping,
                'Status' => $stat,
                'Added_at' => $main->created_at
            ];
            $allData[] = $data;
        }

        return $allData;
    }

    public function index()
    {
        $allData = $this->DATA();
        return view('maintable', compact(array('allData')));

    }

    public function add(Request $request)
    {
        $site = $request->input('site');
        $root = $request->input('root');
        $user = $request->input('user');
        $time = now();

        if (Mainpage::where('site', $site)->exists()) {
            return redirect('/msap/mainpage')->with('error', 'Error! You can\'t add this site because it already exists in our database.');
        } else {
            Mainpage::insert([
                'site' => $site,
                'root' => $root,
                'user' => $user,
                'created_at' => $time,
                'updated_at' => $time     
            ]);
            return redirect('/msap/new_table_view');
        }
    }

    public function change_server()
    {
        $mainpage = Mainpage::all();
        $allData = [];
        foreach ($mainpage as $main) {
            $data = [
                'ID' => $main->id,
                'Site' => $main->site,
                'user' => $main->user,
                'root' => $main->root,
                'Added_at' => $main->created_at
            ];
            $allData[] = $data;
        }

        return view('maintable_form_change', compact(array('allData')));
    }

    public function change_server_cc(Request $request)
    {
        $id = $request->get('ID');

         return redirect('msap/change?ID='.$id);
    }
    public function s(Request $request)
    {

        $id = $request->get('ID');
        $id2 = $request->input('id');
        $site = $request->input('site');
        $root = $request->input('root');
        $user = $request->input('user');
        $time = now();
        if ($id2 !== null && $site !== null && $root !== null && $user !== null) {
            $target = Mainpage::where('id',$id2)->first();
            $target->site = $site;
            $target->root = $root;
            $target->user = $user;
            $target->updated_at = $time;
            $target->save();
             return redirect('/msap/mainpage');
        }
        return view('maintable_form_change_view', compact('id'));
    }

    public function delete_view()
    {
        $mainpage = Mainpage::all();
        $allData = [];
        foreach ($mainpage as $main) {
            $data = [
                'ID' => $main->id,
                'Site' => $main->site,
                'user' => $main->user,
                'root' => $main->root,
                'Added_at' => $main->created_at
            ];
            $allData[] = $data;
        }
        return view('maintable_form_delete', compact(array('allData')));
    }

    public function delete(Request $request)
    {
        foreach ($request->get('selected') as $id) {
            Mainpage::destroy('ID', $id);
        }
        return redirect('/msap/mainpage');
    }


    public function new_table_view()
    {
        $allData = $this->DATA($mainpage = Mainpage::all());
        return view('maintable_form_add_newtableview', compact(array('allData')));
    }

}
