<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test/{page}", requirements={"page"="[a-zA-Z]+\."})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function testRequirements(Request $request) {
        return $this->json([
            'success' => 'requirements'
        ]);
    }

    /**
     * @Route("/test/{page}", requirements={"page"="\d+"})
     * @param Request $request
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function testDefaultValue(Request $request, $page=1) {
        return $this->json([
            'success' => 'default value ' . $page
        ]);
    }

    /**
     * @Route("/test/generate", name="test-generate")
     */
    public function testGenerateUrl() {
        $url = $this->generateUrl(
            'test-generate',
            ['slug' => 'my-blog-post']
        );

        return $this->json([
            'url' => $url
        ]);
    }
}
