<?php

class Canvas extends Eloquent {
	
	protected $connection = 'editor_mysql';

    /**
     * Get the canvas's owner.
     *
     * @return User
     */
    public function owner() {
        //return $this->belongsTo('EditorInformation', 'id');
        return $this->belongsTo('EditorInformation');
    }

    
    //========================================================================================
    
    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->date($this->updated_at);
    }
}
