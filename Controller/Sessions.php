<?php
namespace Wpgva\Controller;

use Wpgva\Exception;
use WP_REST_Response;
use WP_REST_Controller;
use WP_REST_Request;
use WP_Error;

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

class Sessions extends WP_REST_Controller
{
    public function register_routes()
    {
        register_rest_route('wpgva/v1', '/sessions/(?P<id>\d+)', array(
            array(
                'methods'             => array('GET'),
                'callback'            => array($this, 'get_item'),
                'permission_callback' => array($this, 'get_item_permissions_check')
            )
        ));
    }

    /**
     * Get one Session
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|WP_REST_Response
     * @throws Exception
     */
    public function get_item(WP_REST_Request $request)
    {
        $error  = false;
        $params = $request->get_params();
        $data   = array('id' => $params['id'], 'name' => 'MySession'); //fake datacreation should be done by an other class
        if ($error)
        {
            throw new Exception('Huston we have a problem', 500);
        }

        return new WP_REST_Response($data, 200);
    }

    /**
     * Check if a given request has access to get a specific item
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool
     */
    public function get_item_permissions_check(WP_REST_Request $request ) {
        return true; //Call a specific fontions like current_user_can()
    }
}
