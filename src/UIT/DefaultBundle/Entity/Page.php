<?php
namespace UIT\DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
{
	const STATE_HIDDEN = 0;
	const STATE_VISIBLE = 1;
	
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=150)
     * @Assert\Regex("/^([a-z0-9_-]+)$/i")
     */
    protected $page_id;
    
    /**
     * State of the page.
     * - 0: Unvisible
     * - 1: Visible
     * 
     * @ORM\Column(type="integer")
     */
    protected $state;
    
    /**
     * @ORM\ManyToMany(targetEntity="History")
     * @ORM\JoinTable(name="page_history",
     *      joinColumns={@ORM\JoinColumn(name="page_id", referencedColumnName="page_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="history_id", referencedColumnName="history_id")}
     * )
     */
    protected $histories;
    
    /**
     * @ORM\OneToOne(targetEntity="History")
     * @ORM\JoinColumn(name="current_history_id", referencedColumnName="history_id")
     */
    protected $current_history;
    
    /**
     * Get current content.
     * 
     */
    public function getCurrentContent ()
    {
    	$current_history = $this->getCurrentHistory();
    	if (!$current_history) {
    		return '';
    	} else {
    		return $current_history->getContent();
    	}
    }
    
    /**
     * Get an overview of page.
     * 
     */
    public function getOverview ()
    {
    	$content = $this->getCurrentContent();
    	if (strlen($content) > 100) {
    		$content = substr($content, 0, 100).'...';
    	}
    	
    	return $content;
    }
    
    /**
     * Render the page.
     * 
     * @return string
     */
    public function render ($em)
    {
    	return $this->getCurrentHistory()->render($em);
    }
}
