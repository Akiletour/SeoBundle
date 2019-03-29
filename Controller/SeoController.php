<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 20/03/17
 * Time: 16:30
 */

namespace Lch\SeoBundle\Controller;


use Lch\SeoBundle\Service\Tools;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SeoController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function generateSlugAction(Request $request) {

        $response = new JsonResponse();
        if(!$request->isXmlHttpRequest()) {
            // TODO elaborate
            throw new Exception('Only AJAX calls');
        }

        // TODO Check all required fields are here, class exists...

        $slug = $this->get('lch.seo.tools')->generateSlug($request->request->get('entityClass'), $request->request->get('fields'));

        $response->setData([
            'success' => true,
            'slug' => $slug
        ]);

        return($response);
    }
}