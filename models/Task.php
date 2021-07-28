<?php
// namespace App\Models;

class Task implements IHydrate {
    private $id;
    private $title;
    private $cards;

    public function __construct(array $data) {
        $this->cards = [];
        $this->hydrate($data);
    }
    
    public function hydrate(array $data)
    {
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCard()
    {
        return $this->cards;
    }

    public function setId(int $id) : self
    {
        if (is_int($id)) {
            $this->id = $id;
        }
        return $this;
    }

    public function setTitle(string $title) : self
    {
        $this->title = $title;
        return $this;
    }

    public function addCard(Card $card): self
    {
        if(!in_array($card,$this->cards)) {
            array_push($this->cards,$card);
        }
        return $this;
    }
}