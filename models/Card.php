<?php
namespace App\Models;

class Card implements IHydrate {
    private $id;
    private $title;
    private $image;
    private $color;
    private $task;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            
        }
    }
    /**
     * @return  return the $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $id the $id to set
     */
    public function setId(int $id): self {
        if (is_int($id)) {
            $this->id = $id;
        }
        return $this;
    }

    /**
     * @return  return the $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param $title the $title to set
     */
    public function setTitle(string $title): self {
        $this.$title = $title;
        return $this;
    }

    /**
     * @return  return the $image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * @param $image the $image to set
     */
    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }

    /**
     * @return  return the $color
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * @param $color the $color to set
     */
    public function setColor(string $color): self {
        $this.$color = $color;
        return $this;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask(Task $task): self
    {
        $this->task = $task;
        $task->addCard($this);
        return $this;
    }
}