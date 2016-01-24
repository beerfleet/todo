<?php

namespace TodoBundle\Entity;

/**
 * TodoItem
 */
class TodoItem {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var \DateTime
     */
    private $todoDate;
    
    /**
     * @var integer
     */
    private $finished;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TodoItem
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TodoItem
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return TodoItem
     */
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate() {
        return $this->creationDate;
    }

    /**
     * Set todoDate
     *
     * @param \DateTime $todoDate
     *
     * @return TodoItem
     */
    public function setTodoDate($todoDate) {
        $this->todoDate = $todoDate;

        return $this;
    }

    /**
     * Get todoDate
     *
     * @return \DateTime
     */
    public function getTodoDate() {
        return $this->todoDate;
    }
    
    /**
     * Get finished
     * 
     * @return integer
     */
    public function getFinished() {
        return $this->finished;
    }
    
    /**
     * Set finished
     * 
     */
    public function setFinished($finished) {
        $this->finished = $finished;
    }

}
