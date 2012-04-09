<?php

namespace UIT\DefaultBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use UIT\DefaultBundle\Entity\Page;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template("UITDefaultBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl(
    		'page', 
    		array('page_id' => 'main')
    	));
    }
    
    /**
     * @Route("/search/{query}", name="search", defaults={"query" = ""})
     * @Template("UITDefaultBundle:Default:search.html.twig")
     */
    public function searchAction (Request $request, $query)
    {
    	if (empty($query) && array_key_exists('query', $_POST)) {
    		$query = $_POST['query'];
    	}
    	
    	if (empty($query) || !preg_match('#^([a-z0-9_-]+)$#i', $query)) {
    		$pages = null;
    	} else {
    		// On lance la recherche
    		$qb = $this->get('doctrine')->getEntityManager()->getRepository('UIT\DefaultBundle\Entity\Page')
    			  ->createQueryBuilder('page');
    		$pages = $qb->select('p')->from('UIT\DefaultBundle\Entity\Page', 'p')
				  ->where(
				  	$qb->expr()->andx(
				  		$qb->expr()->like('upper(p.page_id)', $qb->expr()->literal('%' . strtoupper($query) . '%')),
				  		$qb->expr()->eq('p.state', $qb->expr()->literal(Page::STATE_VISIBLE))
				  	)
				  )
				  ->getQuery()
				  ->getResult();
    	}
    	
    	return array(
    		'query' => $query,
    		'pages' => $pages
    	);
    }
}
