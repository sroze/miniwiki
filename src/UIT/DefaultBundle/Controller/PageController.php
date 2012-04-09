<?php

namespace UIT\DefaultBundle\Controller;

use UIT\DefaultBundle\Entity\Page;
use UIT\DefaultBundle\Entity\History;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Route("/page/{page_id}", requirements={"page_id" = "([a-zA-Z0-9_-]+)"}, name="page")
     * @Template("UITDefaultBundle:Page:view.html.twig")
     */
    public function viewAction ($page_id)
    {
    	$page = $this->get('doctrine')->getEntityManager()->getRepository('UIT\DefaultBundle\Entity\Page')->find($page_id);
    	
    	// Si la page n'existe pas, on redirige vers la page de création
    	if (!$page OR $page->getState() == Page::STATE_HIDDEN) {
		    $this->get('session')->setFlash('alert', 'Page doesn\'t exists! Create it.');
    		return $this->redirect($this->generateUrl(
    			'page_edit', 
    			array('page_id' => $page_id)
    		));
    	}
    	
    	// Sinon, on envoi le model à la vue
    	return array(
    		'page' => $page,
    		'rendered' => $page->render($this->get('doctrine')->getEntityManager())
    	);
    }
    
    /**
     * @Route("/page/{page_id}/edit", requirements={"page_id" = "([a-zA-Z0-9_-]+)"}, name="page_edit")
     * @Template("UITDefaultBundle:Page:edit.html.twig")
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function editAction (Request $request, $page_id)
    {
    	$page = $this->get('doctrine')->getEntityManager()->getRepository('UIT\DefaultBundle\Entity\Page')->find($page_id);
    	
		// Si la page n'existe pas, on la créé
	    if (!$page) {
    		// On créé la page en invisible
			$page = new Page();
			$page->setPageId($page_id);
			$page->setState(Page::STATE_HIDDEN);
            $em = $this->getDoctrine()->getEntityManager();
		    $em->persist($page);
		    $em->flush();
        }
        
        // On créé le formulaire
        $form = $this->getPageForm($page);
        
        // Analyse request        
     	if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            // Get form data if it's valid
            if ($form->isValid()) {
            	$data = $form->getData();
            	var_dump($data);
            	exit;
            }
        }
        
        return array(
        	'form' => $form->createView(),
        	'page' => $page
        );
    }
    
    protected function getPageForm (Page $page)
    {
    	// Créé le tableau des valeurs par défaut
		$default_data = array(
			'content' => $page->getCurrentContent()
		);
		
        // Create form model
        $form = $this->createFormBuilder($default_data)
	        ->add('content', 'textarea', array(
	        	'label' => 'Contenu',
	        	'required' => true
	        ))
	        ->getForm();
	        
	    return $form;
    }
    
    /**
     * @Route("/page/{page_id}/save", requirements={"page_id" = "([a-zA-Z0-9_-]+)"}, name="page_save")
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */
    public function saveAction (Request $request, Page $page)
    {
        // On créé le formulaire
        $form = $this->getPageForm($page);
        $user = $this->container->get('security.context')->getToken()->getUser();
        
    	// Analyse request
     	if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            // Get form data if it's valid
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	// On construit l'historique
            	$history = new History();
            	$history->setContent($data['content']);
            	$history->setUsername($user->getUsername());
            	$page->getHistories()->add($history);
            	$page->setState(Page::STATE_VISIBLE);
            	$page->setCurrentHistory($history);
	            $em = $this->getDoctrine()->getEntityManager();
			    $em->persist($history);
			    $em->persist($page);
			    $em->flush();
			    
			    // Redirect user
			    $this->get('session')->setFlash('success', 'Page edited!');
	    		return $this->redirect($this->generateUrl(
	    			'page', 
	    			array('page_id' => $page->getPageId())
	    		));
            } else {
			    // Redirect user
			    $this->get('session')->setFlash('success', 'Error! You the complete each field.');
	    		return $this->redirect($this->generateUrl(
	    			'page_edit', 
	    			array('page_id' => $page->getPageId())
	    		));
            }
        }
    }
	
	/**
     * @Route("/page/{page_id}/history", requirements={"page_id" = "([a-zA-Z0-9_-]+)"}, name="page_history")
     * @Template("UITDefaultBundle:Page:history.html.twig")
     */
    public function historyAction (Page $page)
    {
    	// Sinon, on envoi le model à la vue
    	return array(
    		'page' => $page,
    		'histories' => $page->getHistories()
    	);
    }
    
	/**
     * @Route("/page/{page_id}/history/{history_id}", requirements={"page_id" = "([a-zA-Z0-9_-]+)"}, name="page_history_view")
     * @Template("UITDefaultBundle:Page:historyview.html.twig")
     */
    public function historyviewAction (Page $page, History $history)
    {
    	return array(
    		'page' => $page,
    		'history' => $history,
    		'rendered' => $history->render($this->getDoctrine()->getEntityManager())
    	);
    }
}
