<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Salesforce
{

    public function auth() 
    {
        $login = Http::asForm()->post('https://login.salesforce.com/services/oauth2/token', [
            'grant_type' => 'password',
            'client_id' => env('SALESFORCE_CLIENT_ID'),
            'client_secret' => env('SALESFORCE_CLIENT_SECRET'),
            'password' => env('SALESFORCE_PASSWORD'),
            'username' => env('SALESFORCE_USERNAME'),
        ]);

        // Update config options with salesforce data
        if ( $login->ok() ) {
            $this->setEnvValue('SALESFORCE_ACCESS_TOKEN', $login['access_token']);
            $this->setEnvValue('SALESFORCE_INSTANCE_URL', $login['instance_url']);

            // set config for run time access when the method is being called again
            config(['salesforce.access_token' => $login['access_token'], 'salesforce.instance_url' => $login['instance_url']]);
        } else {
            throw new \ErrorException($login);
        }
    }

    public function leadGet($leadId) 
    {
        $response = Http::withToken( config('salesforce.access_token') )->get( config('salesforce.instance_url') .'/services/data/v51.0/sobjects/Lead/'. $leadId);

        // If failed.. authenticate and try again
        if ( $response->failed() ) {

            $this->auth();
            $response = Http::withToken( config('salesforce.access_token') )->get( config('salesforce.instance_url') .'/services/data/v51.0/sobjects/Lead/'. $leadId);

            if ( $response->failed() ) {
                throw new \ErrorException($response);
            }
        }

        return $response; 
    }

    public function leadCreate($data) 
    {
        $response = Http::withToken( config('salesforce.access_token') )->post( config('salesforce.instance_url') .'/services/data/v51.0/sobjects/Lead', $data);

        // If failed.. authenticate and try again
        if ( $response->failed() ) {
            
            $this->auth();
            $response = Http::withToken( config('salesforce.access_token') )->post( config('salesforce.instance_url') .'/services/data/v51.0/sobjects/Lead', $data);

            if ( $response->failed() ) {
                throw new \ErrorException($response);
            }
        }

        return $response['id']; 
    }

    public function leadUpdate($data, $leadId) 
    {
        $response = Http::withToken( config('salesforce.access_token') )->patch( config('salesforce.instance_url') .'/services/data/v51.0/sobjects/Lead/'.$leadId, $data);

        // If failed.. authenticate and try again
        if ( $response->failed() ) {
            
            $this->auth();
            $response = Http::withToken( config('salesforce.access_token') )->patch( config('salesforce.instance_url') .'/services/data/v51.0/sobjects/Lead/'.$leadId, $data);

            if ( $response->failed() ) {
                throw new \ErrorException($response);
            }
        }

        return $response;
    }


    public function setEnvValue($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }

}