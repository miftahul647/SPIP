<?php
namespace App\Tools;

class Tableau
{
    public function get_trusted_url_tableau($userTableau, $serverTableau, $view_url)
    {
        $params = ':embed=y&:loadOrderID=0&:display_spinner=no&:showShareOptions=true&:display_count=no&:showVizHome=no&:toolbar=no&:tooltip=yes&:original_view=yes&:refresh=yes&:revert=all&:tabs=yes&:linktarget=_blank&:render=true';

        $ticket = $this->get_trusted_ticket_tableau($serverTableau, $userTableau, $_SERVER['REMOTE_ADDR'], $view_url);
        if ($ticket != '-1') {
            return "https://$serverTableau/trusted/$ticket/views/$view_url?$params";
        } else {
            return 0;
        }
    }

    static private function get_trusted_ticket_tableau($wgserver, $userTableau, $remote_addr,$view_url) {

        $site = explode("/", $view_url);

        if($site[0] == 't'){
            $site_id = $site[1];
        }else {
            $site_id = '';
        }
        $params = array(
            'username' => $userTableau,
            'client_ip' => $remote_addr,
            'target_site' => $site_id
        );
        return self::do_post_request_tableau("https://$wgserver/trusted", $params);
    }


    static private function do_post_request_tableau($url, $data, $optional_headers = null)
    {
        $params = array('http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded",
            'method' => 'POST',
            'content' => http_build_query($data)
        ));
        if ($optional_headers !== null) {
            $params['http']['header'] = $optional_headers;
        }
        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        // if (!$fp) {
        //     throw new Exception("Problem with $url, $php_errormsg");
        // }
        // $response = @stream_get_contents($fp);
        // if ($response === false) {
        //     throw new Exception("Problem reading data from $url, $php_errormsg");
        // }
        // return $response;
    }

}