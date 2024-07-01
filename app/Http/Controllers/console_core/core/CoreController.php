<?php

namespace App\Http\Controllers\console_core\core;

use App\Models\Mainpage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use phpseclib3\Net\SFTP;
/*
 * \\\\\\\\\\\\\\\\\\\\\\\\
 * |CONSOLE: CORE         |
 * |VERSION: Pre-alfa test|
 * ////////////////////////
 *
 * Welcome! You are in the core.php file! Please, do not
 * change anything here! Or your MSAP console wont work
 * and you will not able to do some funny things!!!!!!!!
 * If we will make a long story shorter, good luck, bro!
 * -----------------------------------------------------
 * Support our project!
 * BTC: 14ikm9zXVS69a7MXTFzP9sj5X6ZupiFneF
 * ETH: 0xC7565d66dA6C88340bf044548ACF724BCE8D353E
 * XMR: 45Wu356NRVMHLermYSYSfQVf3GeDamz7sChMiFpM6cRvCHtQypW7Fey2P68EfxK2tZPbpbADpXNmwNoW6AiXtaf7U4Tg31E
 * -----------------------------------------------------
 * Creator: linkol13 ( aka creator of MSAP project )
 *
 */


class CoreController extends Controller
{


    public function index()
    {
        $stat = false;
        if ($stat !== false) {
            $data = File::get(storage_path('logs\laravel.log'));
            $all = explode("local.ERROR", $data, 100);
        } else {
            $all = ['NONE, BECAUSE ITS DISABLED IN CORECONTROLLER.php FILE!!!!!'];
        }
        if (file_exists(storage_path('logs\console.log'))) {
            $data = File::get(storage_path('logs\console.log'));
            $console_data = explode("[", $data, 0);
        } else {
            $console_data = dump('CREATE CONSOLE.LOG FILE IN storage\\logs\\!!!!!!!');
        }

        return view('maintable_console', compact('console_data'), compact('all'));
    }

    public function log(Request $request)
    {

        $result = $this->bind($request);
        $stat = $this->bind($request);
        $command = $request->get('command');
        $protection = false;

        if ($protection === false) {

            if ($stat === false) {
                exec('chcp 437 && ' . $command, $output, $return_var);
                $output = implode("\n", $output);
                Log::channel('console')->info('The command is --->> ' . $command . ' //// Output -->' . $output . ' //// The output code is ->' . $return_var);
            } else {
                Log::channel('console')->info('Result -> ' . $result);
            }

        }


        return redirect('/msap/console');
    }


    /*
     * \\\\\\\\\\\\\\\\\\\\\\\\
     * |CONSOLE: BIND         |
     * |VERSION: Pre-alfa test|
     * ////////////////////////
     * Wasssup! Here, you can add or delete bind
     * thats all.
     * yes.
     */


    public function bind(Request $request)
    {
        $prefix = '?';
        $target = $request->get('command');

        if (str_starts_with($target, $prefix)) {
            $target1 = substr($target, strlen($prefix));
            $target1 = explode(' ', $target1);
            $result = '';
            if ($target1[0] == 'help') {
                $result = 'Welcome, admin! Here are some commands and their syntax...';
            } /*
             * CLASS IN DEV
             * FOR: IN DEVELOPING
             * BY: LINKOL13 (discrod: linkol13#0)
             */
            elseif ($target1[0] == 'db') {
                $result = 'Result for db command';
            } elseif ($target1[0] == 'file') {
                $result = 'Result for file command';
            } elseif ($target1[0] == 'fun') {
                $result = 'Result for fun command';
            } elseif ($target1[0] == 'package') {
                $result = 'Result for package command';
            } /*
             * END OF THE IN DEV CLASS
             *
             * CLASS SERVER
             * FOR: SERVER WORK
             * BY: LINKOL13 (discord linkol13#0)
             *
             */

            elseif ($target1[0] == 'server') {

                if (count($target1) > 1) {

                    if ($target1[1] == '--help') {

                        $result = 'Welcome! Here you are....\n Use ' . $prefix . 'server --help for this text \n Use ' . $prefix . 'server --ftp for ftp help connection \n' . $prefix . 'server ';
                    } elseif ($target1[1] == '--ftp') {
                        if (count($target1) > 2) {
                            if ($target1[2] == '--help' or $target1[2] == '-h') {

                                $result = 'You are trying to connect to ftp server. Use ' . $prefix . 'server --ftp --help for more information.';

                            } elseif ($target1[2] == '--connect' or $target1[2] == '-cn') {

                                if (count($target1) > 3) {


                                    /*
                                     *
                                     * 2+ ARGUMENTS
                                     *
                                     */


                                    if ($target1[3] == '--host' or $target1[3] == '-H') {

                                        /*
                                         * CLASS SERVER CONNECTION!!!! HOST!!!!
                                         */

                                        $result = 'You are trying to connect to ftp server. Use ' . $prefix . 'server --ftp --help for more information.';

                                        if (count($target1) > 4) {
                                            $server = Mainpage::where('site', $target1[4])->first();
                                            $host = $server->site;
                                            $username = $server->user;
                                            $password = $server->root;
                                            $ftpService = new FTPService($host, $username, $password);

                                            $result = $ftpService->getConnectionStatus();


                                        } else {
                                            $result = 's';
                                        }
                                    } else {
                                        $result = 'Sorry, but use only server --connect/-cn --host/-H example.com!';
                                    }
                                } else {
                                    $result = 'Sorry, but use only host --host/-H example.com!';
                                }
                            } else {
                                $result = 'Use ' . $prefix . 'server --help for more information.';
                            }
                        } else {
                            $result = 'Use ' . $prefix . 'server --help for more information.';
                        }
                    } elseif ($target1[1] == '--add') {

                        //in dev....

                    } elseif ($target1[1] == '--change') {

                        //in dev....

                    } elseif ($target1[1] == '--delete') {

                        //in dev....

                    } elseif ($target1[1] == '--stat') {

                        //in dev....

                    }

                } else {
                    $result = 'Use ' . $prefix . 'server --help for more information.';
                }


            } /*
             * END OF THE CLASS SERVER
             *
             * CLASS NUKE
             * FOR: nuke ftp blud
             * BY: LINKOL13 (discord linkol13#0)
             */


            elseif ($target1[0] == 'nuke') {
                $result = 'Result for nuke command';
            } else {
                $text = 'Syntax error! We can\'t find this command in our system, please check command with ' . $prefix . 'help !';
            }
            if (empty($text)) {
                return $result;
            } else {
                return $text;
            }

        } else {
            return $stat = false;
        }
    }
}
class FTPService
{

    public function __construct($host, $username, $password)
    {
        $this->host = $host;
        $this->password = $password;
        $this->username = $username;
        $sftp = new SFTP($this->host);

        if (!$sftp->login($this->username, $this->password)) {
            $this->connectionStatus = 'Login Failed';
        } else {
            $this->connectionStatus = 'Successfully connected to FTP server!!!!';
        }
    }

    public function getConnectionStatus()
    {
        return $this->connectionStatus;
    }
}
