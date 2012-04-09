<?php
namespace UIT\DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\DoctrineBundle\Registry;

/**
 * @ORM\Entity
 * @ORM\Table(name="history")
 */
class History
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $history_id;
    
    /**
     * Content of the page.
     * 
     * @ORM\Column(type="text")
     */
    protected $content;
    
    /**
     * User of history.
     * 
     * @ORM\Column(type="string", nullable=true)
     */
    protected $username;
    
    /**
     * Date of history.
     * 
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date;
    
    public function __construct ()
    {
    	$this->date = new \DateTime(); 
    }
    
    /**
     * Render the page.
     * 
     * @return string
     */
    public function render ($em)
    {
    	$content = $this->getContent();
    	
    	// On parse les retours à la ligne
    	$wiky = new Wiky;
    	$content = $wiky->parse(htmlentities($content, ENT_NOQUOTES, 'UTF-8'));
    	
		// Parse links
		$content = preg_replace_callback("/\[\[([a-z0-9_-]+)\]\]/i", function ($matches) use ($em) {
			$page = $em->getRepository('UIT\DefaultBundle\Entity\Page')->find($matches[1]);
			if (!$page || $page->getState() == Page::STATE_HIDDEN) {
				$class = "noexists";
			} else {
				$class = "exists";
			}
			
			return '<a href="/page/'.$matches[1].'" class="'.$class.'">'.$matches[1].'</a>';
		}, $content);
    	
    	return $content;
    }
}