<?php

namespace Album\Model;

class Album
{
    public int $id;
    public string $artist;

    public string $title;

    /**
     * This method copies the data from the provided array to our entity's properties
     *  Has to have a filter to ensure the values injected are valid
     *
     * @param array $array
     * @return void
     */
    public function exchangeArray(array $array): void
    {
        $this->id     = ! empty($array['id']) ? $array['id'] : null;
        $this->artist = ! empty($array['artist']) ? $array['artist'] : null;
        $this->title  = ! empty($array['title']) ? $array['title'] : null;
    }
}
