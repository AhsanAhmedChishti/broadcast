<?php

namespace App\Http\Controllers\Admin;

use Facebook\Facebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Generalsetting;

class GraphController extends Controller
{
    private $fb;
    public function __construct()
    {
        // session_start();
        $this->fb = new Facebook([
            'app_id'                => '429414504640552',
            'app_secret'            => '93803d3df913d3d140d034b1c0bad470',
            'default_graph_version' => 'v2.5',
        ]);
    }


    public function getLoginURL()
    {
        $settings = Generalsetting::findOrFail(1);
        $fbData = '';
        $fbsts = '';
        if ($settings->fb_token != '') {
            try {

                $res = $this->fb->get('/me/accounts', $settings->fb_token);
                $res = $res->getDecodedBody();

                foreach ($res['data'] as $page) {
                    $fbData .= "<strong>Page ID:</strong>" . $page['id'] . " <br> <strong>Page Name:</strong>" . $page['name'];
                }

                $fbsts = 'Connected';
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo $e->getMessage();
                exit;
            }
        } else {
            $helper = $this->fb->getRedirectLoginHelper();
            $permissions = ['email', 'user_posts', 'manage_pages', 'publish_pages'];
            $callback    = secure_url('/facebook-app');
            $loginUrl    = $helper->getLoginUrl($callback, $permissions);

            $fbData =  '<a href="' . $loginUrl . '" class="submit-btn">Connect To a Facebook Page!</a>';
        }

        return view('admin.socialsetting.fbconfigure', compact('fbData', 'fbsts'));
    }


    function longToken()
    {
        $tkn['fb_token'] = '';
        $helper = $this->fb->getRedirectLoginHelper();

        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }


        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            $cilent = $this->fb->getOAuth2Client();
            try {
                $accessToken = $cilent->getLongLivedAccessToken($accessToken);

                //return $accessToken;
                $gs = Generalsetting::findOrFail(1);
                $tkn['fb_token'] = $accessToken;
                $gs->update($tkn);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo $e->getMessage();
                exit;
            }


            return redirect(route('facebook.auth'))->with('success', 'Successfully connected to Facebook!');

            //$_SESSION['token'] = (string) $accessToken;
            // header('Location: index.php');


        } elseif ($helper->getError()) {

            return redirect(route('facebook.auth'))->with('unsuccess', 'Sorry, You cannot use the app without these permissions.');
            //echo "Sorry, You cannot use the app without these permissions. Go back to <a href = 'index.php'>home</a>.";
            // exit;
        }
    }


    public function postAuto()
    {
        $settings = Generalsetting::findOrFail(1);
        $pstd['is_posted'] = '';
        if ($settings->fb_token != '') {
            $id = $settings->fb_page_id;
            $message = 'this is test';

            if (Auction::where('status', '1')->where('is_posted', '0')->count()) {

                $auctions = Auction::where('status', '1')->where('is_posted', '0')->inRandomOrder()->first();

                $urlLink = url('details/' . $auctions->slug);
                $data = array(
                    'message' => $auctions->title,
                    'link' => $urlLink
                );

                $res = $this->fb->get('/me/accounts', $settings->fb_token);
                $res = $res->getDecodedBody();

                foreach ($res['data'] as $page) {
                    if ($page['id'] == $id) {
                        $accesstoken = $page['access_token'];
                    }
                }

                $res = $this->fb->post($id . '/feed/', $data, $accesstoken);

                $pstd['is_posted'] = 1;
                $pstd['fbpost_time'] = date('Y-m-d H:i:s');
                $auctions->update($pstd);
            }

            //header('Location: index.php');

            return 'Posted!';
        }
    }


    // Genereal Settings All post requests will be done in this method
    public function pageId(Request $request)
    {

        $input = $request->all();
        $data = Generalsetting::findOrFail(1);
        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }
}