<?php

namespace AppBundle\Controller;

use AppBundle\Service\TestService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    public function __construct()
    {
    }

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
     * @param TestService $testService
     * @param int $page
     * @return Response
     */
    public function testDefaultValue(TestService $testService, $page=1) {

        return new Response("default " . $page . " " . $testService->getEmail());
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
