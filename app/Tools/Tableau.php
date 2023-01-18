<?php
namespace App\Tools;


class Tableau
{
    public function get_trusted_url_tableau($userTableau, $serverTableau, $view_url)
    {
        try {
            $params = ':embed=yes&:toolbar=yes';
    
            $ticket = self::get_trusted_ticket_tableau($serverTableau, $userTableau, $_SERVER['REMOTE_ADDR'], $view_url);
            
            if ($ticket != '-1') {
                return "http://$serverTableau/trusted/$ticket/$view_url?$params";
            } 

            return 'tableau failed to load. ticket != -1.';
        } catch (\Exceprion $e) {
            report($e);
            \Log::error('ERROR get_trusted_url_tableau : ' . $e->getMessage());

            return 'tableau failed to load. ' . $e->getMessage();

        }
    }

    static function get_trusted_ticket_tableau($wgserver, $userTableau, $remote_addr,$view_url) {

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
        return self::do_post_request_tableau("http://$wgserver/trusted", $params);
    }


    static function do_post_request_tableau($url, $data, $optional_headers = [])
    {
        try {
            $client = new \GuzzleHttp\Client([
                'timeout' => 180,
                'headers' => $optional_headers
            ]);
            $response = $client->request('POST', $url, [
                'query' => http_build_query($data)
            ]);

            $resCode = $response->getStatusCode();
            $resBody = $response->getBody()->getContents();

            if ($resCode !== 200) {
                throw new \Exception("Problem with $url");
            }

            return $resBody;
        } catch (\Throwable $th) {
            throw new \Exception("Error $th");
        }
        // $params = array('http' => array(
        //     'header' => "Content-Type: application/x-www-form-urlencoded",
        //     'method' => 'POST',
        //     'content' => http_build_query($data)
        // ));
        // if ($optional_headers !== null) {
        //     $params['http']['header'] = $optional_headers;
        // }
        // $ctx = stream_context_create($params);
        // $fp = @fopen($url, 'rb', false, $ctx);
        // if (!$fp) {
        //     throw new Exception("Problem with $url");
        // // }
        // $response = @stream_get_contents($fp);
        // // if ($response === false) {
        // //     throw new Exception("Problem reading data from $url");
        // // }
        //  return $response;
    }

}