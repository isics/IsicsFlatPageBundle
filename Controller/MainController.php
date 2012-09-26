<?php

namespace Isics\FlatPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Main Controller
 */
class MainController extends Controller
{
    /**
     * Show a page
     *
     * @param string $url Relative url
     */
    public function showAction($url = '/')
    {
        $page = $this->getDoctrine()
            ->getRepository('IsicsFlatPageBundle:FlatPage')
            ->findOneBuyUrl($url);

        if (null === $page) {
            throw new NotFoundHttpException();
        }

        return $this->render(
            sprintf(
                'IsicsFlatPageBundle:Main:%s.html.twig',
                $page->getTemplateName()
            ),
            array(
                'page' => $page,
            )
        );
    }
}
